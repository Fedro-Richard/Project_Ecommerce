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
            
            return response()->json(['reply' => "Oke kak, pesanan dibatalkan. 👌\n\nSilakan chat lagi kalau mau pesan cookies ya! (Tim ORIGINAL / Tim COKLAT)"]);
        }

        // --- 0.5 FITUR BANTUAN ADMIN (GLOBAL) ---
        $adminKeywords = ['admin', 'cs', 'help', 'tolong', 'bantuan', 'error', 'masalah', 'kendala', 'rusak', 'kontak', 'hubungi'];
        
        if (in_array($msgLower, $adminKeywords) || str_contains($msgLower, 'admin') || str_contains($msgLower, 'error')) {
            $contactMsg = "Maaf jika ada kendala atau bot kurang menjawab atau ada yang ingin ditanyakan lebih detail. 🙏\n\nKakak bisa langsung hubungi Admin kami di:\n\n📞 **WhatsApp**: wa.me/081289738158\n📸 **Instagram**: [@florenoriaa](https://www.instagram.com/florenoriaa/)\n\nKami siap membantu!";
            return response()->json(['reply' => $contactMsg]);
        }

        // --- SKENARIO 1: PEMILIHAN PRODUK ---
        if ($orderState == 'idle') {
            
            $historyText = "";
            foreach ($chatHistory as $chat) {
                $historyText .= "{$chat['role']}: {$chat['text']}\n";
            }

            $prompt = "
                Kamu CS toko 'Florenoria'. User: $userName.
                Menu: 
                1. Tim ORIGINAL (3.50) - Varian Original dengan kacang & biji-bijian.
                2. Tim COKLAT (3.50) - Varian Coklat dengan lelehan coklat & karamel.
                
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

                return response()->json(['reply' => $cleanReply . "\n\nTotal: **$" . number_format($total, 2) . "**. \n\nMau bayar via **COD** atau **QRIS**? \n*(Ketik 'batal' jika ingin cancel)*"]);
            }
            
            return response()->json(['reply' => $botReply]);
        }

        // --- SKENARIO 2: MEMILIH METODE PEMBAYARAN ---
        if ($orderState == 'asking_payment_method') {
            $total = $cart['qty'] * $cart['price_per_item'];

            if (str_contains($msgLower, 'cod') || str_contains($msgLower, 'qris')) {
                // Set Payment Method
                $method = str_contains($msgLower, 'cod') ? 'COD' : 'QRIS';
                $cart['payment_method'] = $method;
                Session::put('cart', $cart);

                // Langsung minta Alamat (untuk keduanya: COD & QRIS)
                Session::put('order_state', 'asking_shipping_details');
                
                // Cek Login
                if ($user && $user->address) {
                    return response()->json(['reply' => "Oke via $method. Data kakak: \nNama: $user->name \nAlamat: $user->address \nHP: $user->phone_number \n\nPakai data ini? (Jawab **Ya** / **Tidak**)"]);
                } else {
                    return response()->json(['reply' => "Oke via $method. Mohon ketik **Nama Penerima**, **Alamat Lengkap**, dan **Nomor HP** ya."]);
                }
            
            } else {
                return response()->json(['reply' => "Pilih **COD** atau **QRIS** ya kak.\nAtau ketik **'batal'**."]);
            }
        }

        // --- SKENARIO 3: DATA PENGIRIMAN (Digabung COD & QRIS) ---
        if ($orderState == 'asking_shipping_details') {
            
            $validData = null; // Simpan data di sini jika valid

            // A. User Login & Konfirmasi Data
            if ($user && $user->address && (str_contains($msgLower, 'ya') || str_contains($msgLower, 'boleh'))) {
                $validData = [
                    'name' => $user->name,
                    'address' => $user->address,
                    'phone' => $user->phone_number
                ];
            } 
            // B. Input Manual (Tamu) atau User Login yg ketik manual
            else {
                // Cek apakah user malah jawab "Tidak"
                if (str_contains($msgLower, 'tidak') || str_contains($msgLower, 'bukan')) {
                    return response()->json(['reply' => "Oke, silakan ketik **Nama, Alamat, dan Nomor HP** yang benar ya."]);
                }

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
                        $validData = $shipData;
                    }
                }
            }

            // JIKA DATA PENGIRIMAN VALID:
            if ($validData) {
                // Simpan data pengiriman ke Cart sementara
                $cart['shipping_name'] = $validData['name'];
                $cart['shipping_address'] = $validData['address'];
                $cart['shipping_phone'] = $validData['phone'] ?? '-';
                Session::put('cart', $cart);

                // CABANG LOGIKA BERDASARKAN PEMBAYARAN
                if ($cart['payment_method'] == 'COD') {
                    // SELESAI
                    $this->saveTransaction($cart, $validData['name'], $validData['address'], $validData['phone'] ?? '-');
                    Session::forget(['order_state', 'cart']);
                    return response()->json(['reply' => "Siap kak {$validData['name']}, pesanan COD sudah diproses! Ditunggu ya! 🍪🚀"]);
                } 
                elseif ($cart['payment_method'] == 'QRIS') {
                    // LANJUT KE PEMBAYARAN
                    Session::put('order_state', 'waiting_transfer_proof');
                    $total = $cart['qty'] * $cart['price_per_item'];
                    $qrisImage = "images/WhatsApp Image 2025-12-04 at 15.00.41_f394179e.jpg";

                    return response()->json(['reply' => "Data tercatat! Total **$" . number_format($total, 2) . "**.\nSilakan scan QRIS di bawah ini:\n\n<img src='$qrisImage' alt='QRIS Code' style='max-width:100%; border-radius:10px; margin: 10px 0;'>\n\n� **Silakan upload bukti bayar di sini ya!**"]);
                }
            } else {
                return response()->json(['reply' => "Maaf, data alamatnya kurang lengkap/jelas. Bisa tulis ulang **Nama, Alamat, No HP**?"]);
            }
        }

        // --- SKENARIO 4: VALIDASI BUKTI TRANSFER (FINAL UNTUK QRIS) ---
        if ($orderState == 'waiting_transfer_proof') {
            
            if ($request->hasFile('payment_proof')) {
               
                $file = $request->file('payment_proof');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/proof'), $filename);
                
                $cart['payment_proof'] = $filename;
                
                // Ambil data shipping yg sudah disimpan sebelumnya
                $sName = $cart['shipping_name'] ?? ($user->name ?? 'Tamu');
                $sAddr = $cart['shipping_address'] ?? '-';
                $sPhone = $cart['shipping_phone'] ?? '-';

                $this->saveTransaction($cart, $sName, $sAddr, $sPhone);
                
                Session::forget(['order_state', 'cart']);
                return response()->json(['reply' => "Bukti diterima! Terima kasih kak $sName. Pesanan QRIS sudah kami proses & segera dikirim! 🍪✨"]);

            } else {
                // TIDAK ADA GAMBAR -> TOLAK
                return response()->json(['reply' => "Maaf kak, sistem kami **wajib menerima Foto Bukti Transfer** sebelum lanjut. 🛑\n\nMohon klik ikon klip 📎 dan upload fotonya.\n\n*(Ketik **'batal'** jika ingin membatalkan pesanan)*"]);
            }
        }
    }

    // --- HELPER FUNCTIONS ---
    private function askGemini($prompt) {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) return "Error API Key";
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";
        
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->post($url, ['contents' => [['parts' => [['text' => $prompt]]]]]);
            
            if ($response->successful()) {
                return $response['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya sedang pusing. 😵 Silakan hubungi Admin WA: wa.me/081289738158.';
            } else {
                return "Maaf, sistem sedang sibuk. Silakan hubungi Admin WA: wa.me/081289738158\n📸 **Instagram**: [@florenoriaa](https://www.instagram.com/florenoriaa/)";
            }
        } catch (\Exception $e) {
            return "Koneksi bermasalah. 🔌 Silakan hubungi Admin WA: wa.me/081289738158\n📸 **Instagram**: [@florenoriaa](https://www.instagram.com/florenoriaa/).";
        }
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