<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
                return view('dashboard');
            } else {
                return redirect()->back();
            }
        }
    }

    public function user()
    {
        return view('home.index');
    }
}