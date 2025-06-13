<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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


    public function edit_category($id){

        $data = category :: find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id){

        $data = category :: find($id);
        $data->category_name = $request->category;
        $data->save();

        notyf()->success('Category Updated Successfully.');

        return redirect()->route('view_category');
    }

    public function add_product()
    {
        $category = category::all();
        return view('admin.add_product',compact('category'));
    }


    public function upload_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->qty;
        $product->save();


//================================= For Images //=================================
        // ✅ Handle image upload
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $firstImagePath = null;

            foreach ($images as $index => $file) {
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('product_images'), $imageName);
                $imagePath = 'product_images/' . $imageName;

                // Save each image in ProductImages table
                ProductImages::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);

                // Save first image to Product table
                if ($index === 0) {
                    $firstImagePath = asset($imagePath);
                }
            }

            if ($firstImagePath) {
                $product->image = $firstImagePath;
                $product->save();
            }
        }

        notyf()->success('Product added successfully.');
        return redirect()->back();
    }

//================================= For Images //=================================


    public function product_details($id)
    {
            // $product_img = ProductImages::find($id);
        
            $images = ProductImages::where('product_id', $id)->get();
            $data = Product::find($id);
            if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = 0; // If not authenticated, set count to 0
        }
            if($images)
            {
                return view('home.product_details', compact( 'images', 'count', 'data'));
            }
            else
            {
                notyf()->error('No images found for this product.');
                return redirect()->back();
            }
            
        
    }


    public function view_products()
    {
        $products = Product::paginate(10);
        return view('admin.view_products', compact('products'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            $image_path = public_path($product->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            notyf()->warning('Product Deleted Successfully.');
        } else {
            notyf()->error('Product Not Found.');
        }
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = category::all();

        return view('admin.edit_product', compact('product', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->title = $request->title;
            $product->description = $request->description;
            // Image upload
            if ($request->hasFile('image')) {
                // Delete Previous Image
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('product'), $imageName);
                $product->image = 'product/' . $imageName;
            }
            $product->price = $request->price;
            $product->category = $request->category;
            $product->quantity = $request->qty;

            $product->save();

            notyf()->success('Product Updated Successfully.');
        } else {
            notyf()->error('Product Not Found.');
        }

        return redirect()->route('view_products');
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        notyf()->success('Product Added To Cart Successfully.');
        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $cart = Cart::where('user_id', $userid)->get();
            $count = Cart::where('user_id', $userid)->count();
            return view('home.mycart', compact('cart', 'count'));
        } else {
            notyf()->error('You need to login first.');
            return redirect()->route('user');
        }
    }
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            notyf()->warning('Product Removed From your Cart.');
        } else {
            notyf()->error('Cart Item Not Found.');
        }
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name= $request->name;
        $phone= $request->phone;
        $address= $request->address;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $item) {
            $order = new Order;
            $order->name = $name;
            $order->phone = $phone;
            $order->rec_address = $address;
            $order->user_id = $userid;
            $order->product_id = $item->product_id;
            $order->status = 'in progress';
            $order->save();
        }
        $remove_cart = Cart::where('user_id', $userid)->get();
        foreach ($remove_cart as $item) {
            $data = Cart::find($item->id);
            $data->delete();
        }
        notyf()->success('Order Confirmed Successfully.');
        notyf()->warning('Thanks For Purchasing MY LOVEE!');
        return redirect()->back();
    }

    public function view_order()
    {
        $data= Order::all();
        return view('admin.view_order', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();
        notyf()->success('Order Status Updated to On the way.');
        return redirect('view_order');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        notyf()->success('Order Status Updated to Delivered.');
        return redirect('view_order');
    }

    public function myorder()
    {
        $userid = Auth::user()->id;
        $orders = Order::where('user_id', $userid)->get();
        $count = Cart::where('user_id', $userid)->get()->count();
        return view('home.myorder', compact('orders','count'));   
    }

}