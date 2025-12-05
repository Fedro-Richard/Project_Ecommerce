<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ShopController;

// --- 1. Halaman Statis & Umum ---
Route::get('/', function () {
    return view('about'); // Halaman landing page (About Us)
})->name('about');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/chatbot/send', [ChatbotController::class, 'chat'])->name('chatbot.send');

// --- 3. Fitur Toko & Keranjang (Shopping Cart) ---
// Note: Route '/shop' yang menggunakan function() { return view('shop'); } SAYA HAPUS
// karena kita harus menggunakan yang via Controller agar data produk muncul.

// Halaman Katalog Produk
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// Halaman Keranjang Belanja
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');

// [CREATE] Tambah ke Keranjang
Route::post('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('cart.add');

// [UPDATE] Update Jumlah Barang (AJAX)
Route::patch('/update-cart', [ShopController::class, 'update'])->name('cart.update');

// [DELETE] Hapus Barang (AJAX)
Route::delete('/remove-from-cart', [ShopController::class, 'remove'])->name('cart.remove');