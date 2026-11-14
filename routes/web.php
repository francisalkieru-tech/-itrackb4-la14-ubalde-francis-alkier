<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products/featured', function(){
    return redirect()->route('products.show', 5);
}) -> name('products.featured');

Route::get('/products/filter/{category?}', function ($category = null) {
    return redirect()->route('products.index', $category ? ['category' => $category] : []);
});

Route::resource('products', ProductController::class);


