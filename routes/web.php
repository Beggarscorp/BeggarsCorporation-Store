<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\Admin;

Route::get('/', Index::class)->name('home');
Route::get('/admin/add-product', AddProduct::class)->name('admin.addproduct');
Route::get('/admin', Admin::class)->name('admin.panel');