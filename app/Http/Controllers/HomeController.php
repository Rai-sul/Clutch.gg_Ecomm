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

use App\Mail\OrderConfirmedAdmin;
use App\Mail\OrderConfirmedCustomer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
{
    // Create category first (without image)
    $category = new Category;
    $category->category_name = $request->category;
    $category->save();  // Save first to get ID

    // Check if files exist
    if ($request->hasFile('images')) {
        $images = $request->file('images');
        $firstImagePath = null;

        foreach ($images as $index => $file) {
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('category_images'), $imageName);
            $imagePath = 'category_images/' . $imageName;


            // First image path
            if ($index === 0) {
                $firstImagePath = $imagePath;
            }
        }

        // Save first image path to category table
        if ($firstImagePath) {
            $category->image = $firstImagePath;
            $category->save(); // update after first image path is ready
        }
    }

    notyf()->success('Category Added Successfully.');
    return redirect()->back();
    }


    public function delete_category($id)
    {
        $data = category::find($id);
        if ($data) {
            $data->delete();
            $image_path = public_path($data->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            notyf()->warning('Category Deleted Successfully.');
        } else {
            notyf()->error('Category Not Found.');
        }
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = category::find($id);
        $data->category_name = $request->category;
        $data->save();

        notyf()->success('Category Updated Successfully.');

        return redirect()->route('view_category');
    }

    public function add_product()
    {
        $category = category::all();
        return view('admin.add_product', compact('category'));
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

    public function product_details($id)
    {
        // $product_img = ProductImages::find($id);
    
        $images = ProductImages::where('product_id', $id)->get();
        $data = Product::find($id);
        $count = Cart::where('sessionId', session()->getId())->count();
        
        // If not authenticated, set count to 0
    
        if ($images) {
            return view('home.product_details', compact('images', 'count', 'data'));
        } else {
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

    public function order_delete($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
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
//================================= For Images //=================================
            // ✅ Handle image upload
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $firstImagePath = null;

                // ✅ Step 1: Delete all old product images from file system
                $existingImages = ProductImages::where('product_id', $product->id)->get();
                foreach ($existingImages as $img) {
                    if (file_exists(public_path($img->image_path))) {
                        unlink(public_path($img->image_path));
                    }
                }

                // ✅ Step 2: Delete old entries from database
                ProductImages::where('product_id', $product->id)->delete();

                // ✅ Step 3: Delete old main image (from product table)
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }

                // ✅ Step 4: Upload and save new images
                foreach ($images as $index => $file) {
                    $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('product_images'), $imageName);
                    $imagePath = 'product_images/' . $imageName;

                    ProductImages::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                    ]);

                    if ($index === 0) {
                        $firstImagePath = $imagePath;
                    }
                }

                if ($firstImagePath) {
                    $product->image = $firstImagePath;
                }
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

    // ====================================================================================


    public function add_cart(Request $request)
    {
        $product_id = $request->product_id;
        $ses_id=$request->s_id;

        $product = Product::find($product_id);

        $cart_prod = Cart::Where('product_id',$product_id)->where('sessionId',$ses_id)->exists();
        if($cart_prod){
            return response()->json(['status' => 'error', 'message' => 'Already Added to Cart']);
        }


        if (!$product || $product->quantity <= 0) {
            return response()->json(['status' => 'error', 'message' => 'Out of stock.']);
        }

        // Reduce stock
        $product->quantity -= 1;
        $product->save();

        // Add to cart
        $sessionId = session()->getId();

        $data = new Cart;
        $data->sessionId = $sessionId;
        $data->product_id = $product_id;
        $data->quantity = 1;
        $data->save();

        return response()->json(['status' => 'success', 'message' => 'Product Added To Cart Successfully.']);
    }

    public function cart_count()
    {
        $sessionId = session()->getId();
        $cartCount = Cart::where('sessionId', $sessionId)->count();
        return response()->json(['count' => $cartCount]);
    }




    // ====================================================================================
    public function mycart()
    {
        $sessionId = session()->getId();

        $cart = Cart::where('sessionId', $sessionId)->get();
        $count = Cart::where('sessionId', $sessionId)->count();

        return view('home.mycart', compact('cart', 'count'));
    }

    public function confirm_order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $sessionId = session()->getId();
        $cart = Cart::where('sessionId', $sessionId)->get();

        if ($cart->isEmpty()) {
            notyf()->error('Your cart is empty.');
            return redirect()->back();
        }

        $orders = [];
        foreach ($cart as $item) {
            $order = new Order;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->rec_address = $request->address;
            $order->product_id = $item->product_id;
            $order->total_price = $request->input('val');
            $order->status = 'In Progress';
            $order->save();
            
            $orders[] = $order;
        }

        Cart::where('sessionId', $sessionId)->delete();

        // Create a collection with all order information and related products
        $orderCollection = collect($orders)->map(function($order) {
            $order->product = Product::find($order->product_id);
            return $order;
        });
        
        // Get the first order for email template compatibility
        $firstOrder = $orders[0];
        $firstOrder->items = $orderCollection;
        $firstOrder->total = $request->input('val');

        notyf()->success('Order Confirmed Successfully.');
        notyf()->warning('Thanks For Purchasing');
        Mail::to('raisul.mahi.islam@gmail.com')->send(new OrderConfirmedAdmin($firstOrder));
        Mail::to($order->email)->send(new OrderConfirmedCustomer($firstOrder));
        
        // Check if route exists
        if (Route::has('order.success')) {
            return redirect()->route('order.success');
        } else {
            return redirect()->route('user');
        }
    }

    public function view_order()
    {
        $data = Order::all();
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

    // ====================================================================================
    public function verify_order(Request $request)
    {
        

        $userPhone = $request->phone;
        $userEmail = $request->email;

        // Make sure both phone and email match for same order
        $orders = Order::where('phone', $userPhone)->where('email', $userEmail)->get();
        if ($orders->isEmpty()) {
            $count = Cart::where('sessionId', session()->getId())->count();
            notyf()->error('No Order Found.');
            return view('home.myorder_verfy', compact('count'));
        }

        // ✅ Store into session after success
        session([
            'user_phone' => $userPhone,
            'user_email' => $userEmail
        ]);

        $count = Cart::where('sessionId', session()->getId())->count();
        return view('home.myorder', compact('count', 'orders'));
    }

    // ✅ Always check session when accessing myorder

    // ====================================================================================
    public function myorder_verfy()
    {
        $count = Cart::where('sessionId', session()->getId())->count();
        return view('home.myorder_verfy', compact('count'));
    }

    public function show_products(){
        $products=Product::all();
        $count=Product::all()->count();
        return view('home.show_products',compact('products','count'));
    }

    public function increment(Request $request)
    {
        $product = Product::find($request->product_id);
        $cart = Cart::find($request->cart_id);

        if (!$product || $product->quantity <= 0) {
            return response()->json(['status' => 'error', 'message' => 'Not in stock.']);
        }

        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found.']);
        }

        $product->quantity -= 1;
        $product->save();

        $cart->quantity += 1;
        $cart->save();

        return response()->json(['status' => 'success', 'stock' => $product->quantity]);
    }
    public function decrement(Request $request)
    {
        $product = Product::find($request->product_id);
        $cart = Cart::find($request->cart_id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Invalid product.']);
        }

        if (!$cart || $cart->quantity <= 1) {
            return response()->json(['status' => 'error', 'message' => 'Minimum quantity is 1.']);
        }

        $product->quantity += 1;
        $product->save();

        $cart->quantity -= 1;
        $cart->save();

        return response()->json(['status' => 'success', 'stock' => $product->quantity]);
    }

    public function search(Request $request)
    {
        $query = $request->q;

        $products = Product::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get(['id', 'title', 'image', 'price']); // Limit fields for performance

        // Optional: Attach image (assumes you have one image per product)
        

        return response()->json($products);
    }
    
    public function orderSuccess()
    {
        $count = Cart::where('sessionId', session()->getId())->count();
        return view('home.order_success', compact('count'));
    }
    
    public function removeCartAjax(Request $request)
    {
        $id = $request->cart_id;
        $sessionId = session()->getId();

        $cart = Cart::where('id', $id)->where('sessionId', $sessionId)->first();

        if (!$cart) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Cart item not found'
            ]);
        }

        $product = Product::find($cart->product_id);
        $qty = $cart->quantity;

        if ($product) {
            $product->quantity += $qty;
            $product->save();
        }

        $cart->delete();

        // Get updated cart count
        $cartCount = Cart::where('sessionId', $sessionId)->count();
        
        // Calculate new total
        $total = 0;
        $cartItems = Cart::where('sessionId', $sessionId)->get();
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product removed from cart',
            'count' => $cartCount,
            'total' => $total
        ]);
    }
}