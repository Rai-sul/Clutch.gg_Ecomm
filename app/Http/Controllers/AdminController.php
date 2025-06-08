<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'admin') {
                return view('admin.index');
            } else if ($usertype == 'user') {
                // Redirect to user home if the user is logged in
                $products = Product::all(); // Fetch products with pagination
                return view('home.index', compact('products'));

                // return view('home.index');
            } else {
                return redirect()->back();
            }
        }
        return redirect('login');
    }

    public function user()
    {
        if(!Auth::check())
        {
            return redirect('login');
        }
        $products = Product::all();
        return view('home.index', compact('products'));
        
    }
}