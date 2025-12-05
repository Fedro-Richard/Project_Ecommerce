<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Data Dummy (Simulasi Database)
    private $products = [
        1 => [
            'name' => 'Chocolate Chunk Classic',
            'description' => 'The timeless favorite, packed with rich chocolate chunks.',
            'price' => 3.50,
            'image' => 'https://via.placeholder.com/300/2c2c2c/ffffff?text=Choco'
        ],
        2 => [
            'name' => 'Oatmeal Raisin Spice',
            'description' => 'A warm and comforting classic with a hint of cinnamon.',
            'price' => 3.50,
            'image' => 'https://via.placeholder.com/300/a0522d/ffffff?text=Oatmeal'
        ],
        3 => [
            'name' => 'White Chocolate Macadamia',
            'description' => 'Creamy white chocolate meets crunchy macadamia nuts.',
            'price' => 3.75,
            'image' => 'https://via.placeholder.com/300/dddddd/333333?text=White'
        ],
        4 => [
            'name' => 'Double Fudge Brownie',
            'description' => 'For the ultimate chocolate lover, dense and decadent.',
            'price' => 3.75,
            'image' => 'https://via.placeholder.com/300/3e2723/ffffff?text=Fudge'
        ]
    ];

    // Menampilkan Halaman Toko
    public function index()
    {
        return view('shop', ['products' => $this->products]);
    }

    // Menampilkan Halaman Keranjang
    public function cart()
    {
        return view('cart');
    }

    // CREATE: Tambah Item (Redirect kembali ke halaman toko)
    public function addToCart($id)
    {
        $product = $this->products[$id];
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product['name'],
                "quantity" => 1,
                "price" => $product['price'],
                "image" => $product['image']
            ];
        }

        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // UPDATE: Ubah Jumlah (Respon JSON untuk AJAX)
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            
            // Update quantity di session
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            
            // Hitung Subtotal Item ini (Harga x Qty baru)
            $itemSubtotal = $cart[$request->id]["quantity"] * $cart[$request->id]["price"];
            
            // Hitung Total Belanja Keseluruhan
            $total = 0;
            foreach($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Kirim data JSON balik ke cart.js
            return response()->json([
                'success' => true,
                'itemSubtotal' => number_format($itemSubtotal, 2),
                'total' => number_format($total, 2)
            ]);
        }
    }

    // DELETE: Hapus Item (Respon JSON untuk AJAX)
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            
            // Hitung Total Belanja Keseluruhan setelah dihapus
            $total = 0;
            foreach($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            return response()->json([
                'success' => true,
                'total' => number_format($total, 2)
            ]);
        }
    }
}