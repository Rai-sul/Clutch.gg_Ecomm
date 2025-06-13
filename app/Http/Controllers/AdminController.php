<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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
            if ($usertype == 'admin') {
                return view('admin.index',compact('user_count','product_count','order_count', 'delivery_count'));
            } else {
                // Redirect to user home if the user is logged in
                $products = Product::all();
                if (Auth::id()){
                    $user = Auth::user();
                    $userid = $user->id;
                    $count = Cart::where('user_id',$userid)->count();
                } else {
                    $count = 0; // If not authenticated, set count to 0     
                }
                return view('home.index', compact('products', 'count'));
            }
        }
        
    }

    public function user()
    {
        $products = Product::all();
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = 0; // If not authenticated, set count to 0
        }
        return view('home.index', compact('products', 'count'));
    }
}