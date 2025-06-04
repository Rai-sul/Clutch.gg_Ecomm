<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new category;
        $category->category_name = $request->category;
        $category->save();

        

        notyf()->success('Category Added Successfully.');

        return redirect()->back();

    }

    public function delete_category($id){

        $data = category :: find($id);
        $data->delete();

        notyf()->warning('Category Deleted Successfully.');

        return redirect()->back();
    }
}

