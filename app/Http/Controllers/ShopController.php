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
        ]
    ];

    /**
     * Getter supaya controller lain bisa pakai data products yang sama
     */
    public function getProducts()
    {
        return $this->products;
    }

    // Menampilkan Halaman Toko
    public function index()
    {
        return view('shop', ['products' => $this->products]);
    }

    // Menampilkan Halaman Keranjang (lama, sekarang praktis tidak dipakai)
    public function cart()
    {
        return view('cart');
    }

    // CREATE: Tambah Item (versi lama, via ShopController)
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

    // UPDATE & REMOVE lama (boleh tetap ada, tapi sekarang update/remove dipakai dari CartController)
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            
            $itemSubtotal = $cart[$request->id]["quantity"] * $cart[$request->id]["price"];
            
            $total = 0;
            foreach($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            return response()->json([
                'success' => true,
                'itemSubtotal' => number_format($itemSubtotal, 2),
                'total' => number_format($total, 2)
            ]);
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            
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
