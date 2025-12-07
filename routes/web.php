<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

// --- 1. Halaman Statis & Umum ---
Route::get('/', function () {
    return view('about'); // Halaman landing page (About Us)
})->name('about');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/home', function () {
    return view('home');
})->name('home');

// --- 4. Halaman Admin Dashboard ---
Route::get('/admin/dashboard', function () {
    return view('dashboard');   // resources/views/dashboard.blade.php
})->name('admin.dashboard');


// Chatbot
Route::post('/chatbot/send', [ChatbotController::class, 'chat'])->name('chatbot.send');

// --- 2. Halaman Shop ---
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// --- 3. Fitur Cart (hanya pakai CartController) ---

// Halaman keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Tambah item ke cart (dipanggil dari halaman shop)
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Update jumlah item (dipanggil via fetch dari tombol + / -)
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Hapus item dari cart (dipanggil via fetch dari tombol delete)
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
