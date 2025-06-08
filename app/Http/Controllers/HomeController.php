<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\ProductImages;

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

        // ✅ Handle image upload based on number of files
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            // If only 1 image uploaded, save to product table
            if (count($images) === 1) {
                $image = $images[0];
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('product'), $imageName);
                $product->image =asset('product/' .$imageName);
                $product->save(); // Update product with main image
            } 
            // If more than 1 image uploaded, save all to product_images table
            else {
                foreach ($images as $file) {
                    $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('product_images'), $imageName);

                    ProductImages::create([
                        'product_id' => $product->id,
                        'image_path' => 'product_images/' . $imageName,
                    ]);
                }
            }
        }

        notyf()->success('Product added successfully.');
        return redirect()->back();
    }

    public function p_image($id)
    {
            // $product_img = ProductImages::find($id);
        
            $images = ProductImages::where('product_id', $id)->get();
            if($images)
            {
                return view('home.pic_image', compact( 'images'));
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

}

