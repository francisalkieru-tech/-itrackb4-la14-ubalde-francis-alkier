<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products/featured', function(){
    return redirect()->route('products.show', 5);
}) -> name('products.featured');

Route::get('/products/filter/{category?}', function ($category = null) {
    return redirect()->route('products.index', $category ? ['category' => $category] : []);
});

Route::resource('products', ProductController::class)
->middlewareFor(['create', 'store', 'edit', 'update', 'destroy'], 'auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
