<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Tampilkan halaman cart
     */
    public function index()
    {
        // Ambil isi cart dari session
        $cart = session('cart', []);

        // Hitung subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Shipping free
        $shipping = 0;

        // Total akhir = subtotal + shipping (0)
        $total = $subtotal + $shipping;

        return view('cart', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    /**
     * Tambah item ke cart dari halaman home / shop
     */
    public function add(Request $request, $id)
    {
        // Ambil data produk dari ShopController (sama persis dengan yang dipakai di halaman shop)
        $shop      = new ShopController();
        $products  = $shop->getProducts();

        // Validasi ID produk
        if (!isset($products[$id])) {
            return back()->with('error', 'Product not found');
        }

        $product = $products[$id];

        // Ambil cart dari session
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Kalau produk sudah ada di cart, tambah quantity
            $cart[$id]['quantity'] += 1;
        } else {
            // Kalau belum ada, buat entri baru
            $cart[$id] = [
                'name'     => $product['name'],
                'price'    => $product['price'],
                'image'    => $product['image'] ?? '',
                'quantity' => 1,
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return back()->with('success', 'Item added to cart successfully!');
    }

    /**
     * Update quantity item (dipanggil via fetch dari tombol + / - di cart.blade.php)
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        // amankan quantity minimal 1
        $qty = (int) $request->input('quantity', 1);
        if ($qty < 1) {
            $qty = 1;
        }

        // update qty item di session
        $cart[$id]['quantity'] = $qty;
        session()->put('cart', $cart);

        // hitung ulang subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // shipping free
        $shipping = 0;
        $total = $subtotal + $shipping;

        // balikan JSON dengan key yang dipakai di JS cart.blade.php
        return response()->json([
            'item_total'  => number_format($cart[$id]['price'] * $cart[$id]['quantity'], 2),
            'subtotal'    => number_format($subtotal, 2),
            'grand_total' => number_format($total, 2),
        ]);
    }

    /**
     * Hapus item dari cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }
}
