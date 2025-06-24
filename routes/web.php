<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;



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

Route::post('add_cart', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('cart_count', [HomeController::class, 'cart_count'])->name('cart_count');

route::get('mycart', [HomeController::class, 'mycart'])->name('mycart');
route::post('confirm_order', [HomeController::class, 'confirm_order'])->name('confirm_order');
route::get('view_order', [HomeController::class, 'view_order'])->name('view_order')->middleware('auth', 'verified');
route::get('on_the_way/{id}', [HomeController::class, 'on_the_way'])->name('on_the_way');
route::get('delivered/{id}', [HomeController::class, 'delivered'])->name('delivered');
route::get('myorder', [HomeController::class, 'myorder'])->name('myorder');
route::post('confirm_detail', [HomeController::class, 'confirm_detail'])->name('confirm_detail');
route::get('myorder_verfy', [HomeController::class, 'myorder_verfy'])->name('myorder_verfy');
route::post('verify_order', [HomeController::class, 'verify_order'])->name('verify_order');
route::get('category_product/{category_name}', [AdminController::class, 'category_product'])->name('category_product');
route::get('show_products', [HomeController::class, 'show_products'])->name('show_products');
Route::post('/cart/increment', [HomeController::class, 'increment'])->name('cart.increment');
Route::post('/cart/decrement', [HomeController::class, 'decrement'])->name('cart.decrement');
Route::post('/cart/remove', [HomeController::class, 'removeCartAjax'])->name('cart.remove');
Route::get('/search-products', [HomeController::class, 'search']);
route::get('order_delete/{id}', [HomeController::class, 'order_delete'])->name('order_delete');
Route::get('/order/success', [HomeController::class, 'orderSuccess'])->name('order.success');




Route::get('/test-mail', function () {
    Mail::raw('✅ This is a test email from Clutch.gg (Laravel)', function ($message) {
        $message->to('your-own-email@gmail.com') // <-- Replace with your real email
                ->subject('Test Email from Clutch.gg');
    });

    return '📧 Test email sent!';
});
