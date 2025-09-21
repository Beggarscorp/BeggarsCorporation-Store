<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;
use App\Livewire\Shop;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\AllProducts;
use App\Livewire\Admin\UpdateProduct;
use App\Livewire\Admin\Categories;
use App\Livewire\Admin\AddCategories;
use App\Livewire\Admin\Admin;
use App\Livewire\Admin\UpdateCategory;
use App\Livewire\Admin\AddColors;

Route::get('/', Index::class)->name('home');
Route::get('/shop', Shop::class)->name('shop');

Route::get('/admin', Admin::class)->name('admin');
Route::prefix('admin')->group(function () {
    // Additional admin routes can be added here
    Route::get('/add-product', AddProduct::class)->name('admin.addproduct');
    Route::get('/all-products', AllProducts::class)->name('admin.allproducts');
    Route::get('/update-product/{id}', UpdateProduct::class)->name('admin.update-product');
    Route::get('/categories', Categories::class)->name('admin.categories');
    Route::get('/add-categories', AddCategories::class)->name('admin.addcategories');
    Route::get('/update-category/{id}', UpdateCategory::class)->name('admin.update-category');
    Route::get('/add-color', AddColors::class)->name('admin.addcolors');
});