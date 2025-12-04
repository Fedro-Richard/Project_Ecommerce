<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Http;

Route::post('/chatbot/send', [ChatbotController::class, 'chat'])->name('chatbot.send');
Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/productdetail', function () {
    return view('productdetail');
});

Route::get('/shop', function () {
    return view('shop');
});


Route::get('/bot', function () {
    return view('bot');
});

Route::get('/bot', function () {
    return view('chatbot_page');
});

