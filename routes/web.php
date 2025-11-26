<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/transaction', function () {
    return view('transaction');
});


