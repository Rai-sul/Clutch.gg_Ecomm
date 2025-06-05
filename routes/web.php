<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


route::get('/', [AdminController::class, 'user'])->name('user');
route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('view_category', [HomeController::class, 'view_category'])->name('view_category');
route::post('add_category', [HomeController::class, 'add_category'])->name('add_category');
route::get('delete_category/{id}', [HomeController::class, 'delete_category'])->name('delete_category');
route::get('edit_category/{id}', [HomeController::class, 'edit_category'])->name('edit_category');
route::post('update_category/{id}', [HomeController::class, 'update_category'])->name('update_category');