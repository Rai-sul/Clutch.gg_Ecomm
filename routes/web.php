<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


route::get('/', [AdminController::class, 'user'])->name('user');
route::get('/home', [AdminController::class, 'index'])->name('index')->middleware('auth', 'verified');


route::get('view_category', [HomeController::class, 'view_category'])->name('view_category');
route::post('add_category', [HomeController::class, 'add_category'])->name('add_category');
route::get('delete_category/{id}', [HomeController::class, 'delete_category'])->name('delete_category');
route::get('edit_category/{id}', [HomeController::class, 'edit_category'])->name('edit_category');
route::post('update_category/{id}', [HomeController::class, 'update_category'])->name('update_category');
route::get('add_product', [HomeController::class, 'add_product'])->name('add_product');
route::post('upload_product', [HomeController::class, 'upload_product'])->name('upload_product');
route::get('view_products', [HomeController::class, 'view_products'])->name('view_products');
route::get('delete_product/{id}', [HomeController::class, 'delete_product'])->name('delete_product');
route::get('edit_product/{id}', [HomeController::class, 'edit_product'])->name('edit_product');
route::post('update_product/{id}', [HomeController::class, 'update_product'])->name('update_product');
route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart')->middleware('auth', 'verified');
