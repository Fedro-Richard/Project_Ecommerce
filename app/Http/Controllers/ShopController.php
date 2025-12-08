<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Data Dummy (Simulasi Database)
    private $products = [
        1 => [
            'name' => 'Tim ORIGINAL – Si Klasik Elegan',
            'description' => 'Varian Original memadukan almond, biji bunga matahari, biji labu, serta wijen hitam & putih. Rasanya renyah, gurih, dan manis ringan, dengan karamel lembut yang menyatukan semuanya. Camilan sehat yang ringan dan kaya rasa.
Tersedia 4 pcs dalam setiap pack',
            'price' => 15000,
            'image' => 'https://via.placeholder.com/300/2c2c2c/ffffff?text=Choco'
        ],
        2 => [
            'name' => 'Tim COKLAT – Si Manis Menggoda',
            'description' => 'Varian Coklat menggabungkan kacang dan biji-bijian premium dengan lelehan coklat. Rasa manis-bitter coklat berpadu dengan karamel dan kerenyahan bahan, menghasilkan sensasi indulgent yang menggoda.
Tersedia 4 pcs dalam setiap pack',
            'price' => 15000,
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
                'itemSubtotal' => number_format($itemSubtotal, 0, ',', '.'),
                'total' => number_format($total, 0, ',', '.')
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
                'total' => number_format($total, 0, ',', '.')
            ]);
        }
    }
}
