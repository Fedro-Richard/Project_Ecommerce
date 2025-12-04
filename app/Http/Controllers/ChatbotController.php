<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message');
        $msgLower = strtolower($userMessage); 
        
        // 1. DATA USER LOGIN
        $user = Auth::user(); 
        $userName = $user ? $user->name : 'Pelanggan';

        // 2. AMBIL SESSION
        $orderState = Session::get('order_state', 'idle');
        $cart = Session::get('cart', []);
        $chatHistory = Session::get('chat_history', []);

        // --- 0. FITUR PEMBATALAN (GLOBAL CANCEL) ---
        // Ini ditaruh paling atas agar bisa dieksekusi kapan saja
        $cancelKeywords = ['batal', 'cancel', 'gak jadi', 'engga jadi', 'stop', 'exit', 'ulang'];
        
        if (in_array($msgLower, $cancelKeywords)) {
            // Hapus semua ingatan sementara
            Session::forget(['order_state', 'cart', 'chat_history']);
            
            return response()->json(['reply' => "Oke kak, pesanan dibatalkan. 👌\n\nSilakan chat lagi kalau mau pesan cookies ya! (Choco Chip / Matcha / Red Velvet)"]);
        }

        // --- SKENARIO 1: PEMILIHAN PRODUK ---
        if ($orderState == 'idle') {
            
            $historyText = "";
            foreach ($chatHistory as $chat) {
                $historyText .= "{$chat['role']}: {$chat['text']}\n";
            }

            $prompt = "
                Kamu CS toko 'Delicious Cookies'. User: $userName.
                Menu: Choco Chip (15k), Matcha (18k), Red Velvet (17k).
                
                History Chat:
                $historyText
                
                User Input: $userMessage
                
                Tugas:
                1. Jawab ramah.
                2. Identifikasi Nama Produk dan Jumlah.
                3. Jika sudah jelas, akhiri dengan JSON:
                [START_ORDER]
                {\"item\": \"nama_produk\", \"qty\": jumlah_angka, \"price_per_item\": harga_satuan}
                [/START_ORDER]
            ";
            
            $botReply = $this->askGemini($prompt);
            $this->updateHistory($userMessage, str_replace('[START_ORDER]', '', $botReply));

            if (str_contains($botReply, '[START_ORDER]')) {
                preg_match('/\[START_ORDER\](.*?)\[\/START_ORDER\]/s', $botReply, $matches);
                $orderData = json_decode($matches[1], true);
                
                $cart = $orderData;
                $cleanReply = str_replace($matches[0], '', $botReply);
                $total = $cart['qty'] * $cart['price_per_item'];

                Session::put('cart', $cart);
                Session::put('order_state', 'asking_payment_method'); 
                Session::forget('chat_history'); 

                return response()->json(['reply' => $cleanReply . "\n\nTotal: **Rp " . number_format($total) . "**. \n\nMau bayar via **COD** atau **Transfer**? \n*(Ketik 'batal' jika ingin cancel)*"]);
            }
            
            return response()->json(['reply' => $botReply]);
        }

        // --- SKENARIO 2: MEMILIH METODE PEMBAYARAN ---
        if ($orderState == 'asking_payment_method') {
            $total = $cart['qty'] * $cart['price_per_item'];

            if (str_contains($msgLower, 'cod')) {
                // JALUR COD
                $cart['payment_method'] = 'COD';
                Session::put('cart', $cart);
                Session::put('order_state', 'asking_shipping_details'); 
                
                if ($user && $user->address) {
                    return response()->json(['reply' => "Oke COD. Data kakak: \nNama: $user->name \nAlamat: $user->address \nHP: $user->phone_number \n\nPakai data ini? (Jawab **Ya** / **Tidak**)"]);
                } else {
                    return response()->json(['reply' => "Siap COD. Mohon ketik **Nama Penerima**, **Alamat Lengkap**, dan **Nomor HP** ya."]);
                }

            } elseif (str_contains($msgLower, 'transfer')) {
                // JALUR TRANSFER
                $cart['payment_method'] = 'TRANSFER';
                Session::put('cart', $cart);
                Session::put('order_state', 'waiting_transfer_proof'); 
                
                $bankInfo = "BCA 123-456-789 a.n Delicious Cookies";
                return response()->json(['reply' => "Siap Transfer. Total **Rp " . number_format($total) . "**.\nSilakan ke: **$bankInfo**.\n\n📸 **Mohon upload foto bukti transfer di sini!**\n*(Ketik 'batal' jika tidak jadi)*"]);
            
            } else {
                return response()->json(['reply' => "Pilih **COD** atau **Transfer** ya kak.\nAtau ketik **'batal'**."]);
            }
        }

        // --- SKENARIO 3: VALIDASI BUKTI TRANSFER (KETAT) ---
        if ($orderState == 'waiting_transfer_proof') {
            
            if ($request->hasFile('payment_proof')) {
               
                $file = $request->file('payment_proof');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/proof'), $filename);
                
                $cart['payment_proof'] = $filename;
                Session::put('cart', $cart);
                Session::put('order_state', 'asking_shipping_details'); 

                if ($user && $user->address) {
                    return response()->json(['reply' => "Bukti diterima! Data kakak: \nNama: $user->name \nAlamat: $user->address \nHP: $user->phone_number \n\nPakai data ini? (Jawab **Ya** / **Tidak**)"]);
                } else {
                    return response()->json(['reply' => "Bukti diterima! Terima kasih. \n\nSekarang mohon ketik **Nama Penerima**, **Alamat Lengkap**, dan **Nomor HP** ya."]);
                }

            } else {
                // TIDAK ADA GAMBAR -> TOLAK
                return response()->json(['reply' => "Maaf kak, sistem kami **wajib menerima Foto Bukti Transfer** sebelum lanjut. 🛑\n\nMohon klik ikon klip 📎 dan upload fotonya.\n\n*(Ketik **'batal'** jika ingin membatalkan pesanan)*"]);
            }
        }

        // --- SKENARIO 4: DATA PENGIRIMAN ---
        if ($orderState == 'asking_shipping_details') {
            
            // A. User Login & Konfirmasi Data
            if ($user && $user->address && (str_contains($msgLower, 'ya') || str_contains($msgLower, 'boleh'))) {
                $this->saveTransaction($cart, $user->name, $user->address, $user->phone_number);
                Session::forget(['order_state', 'cart']);
                return response()->json(['reply' => "Siap! Pesanan via akun kakak sudah diproses. Ditunggu ya! 🍪"]);
            }

            // B. Input Manual (Tamu)
            $prompt = "
                Ekstrak Nama, Alamat, dan Nomor HP dari teks ini: '$userMessage'.
                Format JSON: 
                [DATA_SHIP]
                {\"name\": \"...\", \"address\": \"...\", \"phone\": \"...\"}
                [/DATA_SHIP]
                Isi 'address' harus alamat lengkap.
            ";
            $aiResponse = $this->askGemini($prompt);

            if (str_contains($aiResponse, '[DATA_SHIP]')) {
                preg_match('/\[DATA_SHIP\](.*?)\[\/DATA_SHIP\]/s', $aiResponse, $matches);
                $shipData = json_decode($matches[1], true);

                if ($shipData['name'] && $shipData['address']) {
                    $this->saveTransaction(
                        $cart, 
                        $shipData['name'], 
                        $shipData['address'], 
                        $shipData['phone'] ?? '-'
                    );
                    Session::forget(['order_state', 'cart']);
                    return response()->json(['reply' => "Oke kak {$shipData['name']}, data lengkap! Pesanan segera dikirim ke {$shipData['address']}. Terima kasih! 🚀"]);
                } else {
                    return response()->json(['reply' => "Datanya kurang lengkap kak. Mohon tulis **Nama**, **Alamat**, dan **No HP** ya.\n(Ketik 'batal' untuk stop)"]);
                }
            } else {
                return response()->json(['reply' => "Maaf, alamatnya kurang jelas. Bisa tulis ulang **Nama, Alamat, No HP**?"]);
            }
        }
    }

    // --- HELPER FUNCTIONS ---
    private function askGemini($prompt) {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) return "Error API Key";
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post($url, ['contents' => [['parts' => [['text' => $prompt]]]]]);
        return $response['candidates'][0]['content']['parts'][0]['text'] ?? 'Error.';
    }

    private function updateHistory($userMsg, $botMsg) {
        $history = Session::get('chat_history', []);
        $history[] = ['role' => 'User', 'text' => $userMsg];
        $history[] = ['role' => 'Bot', 'text' => $botMsg];
        if (count($history) > 6) $history = array_slice($history, -6);
        Session::put('chat_history', $history);
    }

    private function saveTransaction($cart, $name, $address, $phone) {
        $user = Auth::user();
        $status = ($cart['payment_method'] == 'COD') ? 'pending' : 'paid_waiting_verification';
        $proof = $cart['payment_proof'] ?? null;

        DB::table('transactions')->insert([
            'user_id' => $user ? $user->id : null,
            'item_name' => $cart['item'],
            'qty' => $cart['qty'],
            'total_price' => $cart['qty'] * $cart['price_per_item'],
            'customer_name' => $name,
            'customer_address' => $address,
            'customer_phone' => $phone,
            'payment_method' => $cart['payment_method'],
            'payment_proof' => $proof,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}