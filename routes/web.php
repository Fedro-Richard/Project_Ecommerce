<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

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

// --- Auth Routes ---
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- 4. Halaman Admin Dashboard ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('admin.dashboard');
    
    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::patch('/admin/transactions/{transaction}', [TransactionController::class, 'update'])->name('admin.transactions.update');
    Route::delete('/admin/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('admin.transactions.destroy');
});


// Chatbot
Route::post('/chatbot/send', [ChatbotController::class, 'chat'])->name('chatbot.send');

// --- 2. Halaman Shop ---
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// --- 2.5 Halaman Checkout ---
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');


// --- 3. Fitur Cart (hanya pakai CartController) ---
// Halaman keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Tambah item ke cart (dipanggil dari halaman shop)
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Update jumlah item (dipanggil via fetch dari tombol + / -)
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Hapus item dari cart (dipanggil via fetch dari tombol delete)
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
