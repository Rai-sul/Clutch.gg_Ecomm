<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            $user_count =  User::where('usertype', 'user')->get()->count();
            $product_count = Product::all()->count();
            $order_count = Order::all()->count();
            $delivery_count = Order::where('status', 'delivered')->get()->count();
            $revenue = Order::where('status', 'delivered')->get();
            if ($usertype == 'admin') {
                return view('admin.index',compact('user_count','product_count','order_count', 'delivery_count','revenue'));
            } else {
                // Redirect to user home if the user is logged in
                $products = Product::all();
                
                $count = Cart::all()->count();
                return view('home.index', compact('products', 'count'));
            }
        }
        
    }

    public function user()
    {
        $products = Product::all();
        $categories = category::all();
        $cart_info= cart::all();
        $count = Cart::where('sessionId', session()->getId())->count();
         
        return view('home.index', compact('products', 'categories', 'count','cart_info'));
    }

    public function category_product($category_name)
    {
        $products = Product::where('category', $category_name)->get();
        $count = Cart::where('sessionId', session()->getId())->count();

        return view('home.category_product', compact('products', 'count'));
 
    }
}