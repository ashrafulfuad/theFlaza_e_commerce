<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Image;
use App\Color;

class ProductController extends Controller
{
    function addproductview()
    {
      $categories = Category::all();
      $products = Product::paginate(5);
      $colors = Color::all();
      $deleted_products = Product::onlyTrashed()->get();
      return view('product/view', compact('products', 'deleted_products', 'categories', 'colors'));
    }

    function addproductinsert(Request $request)
    {
      $request->validate([
        'product_name' => 'required | unique:products,product_name',
        'product_description' => 'required',
        'product_price' => 'required | integer',
        'product_quantity' => 'required | integer',
        'alert_quantity' => 'required | integer',
      ]);
      $color_collection = collect([]);
      foreach ($request->color_id as $key => $value_of_color) {
        $color_collection->put('color_id'.$key, $value_of_color);
      }
      $product_id = Product::insertGetId([
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity,
        'available_colors' =>  $color_collection,
        'created_at' => Carbon::now(),
      ]);
          if($request->hasFile('product_photo')){
        $product_photo = $request->file('product_photo');
        $filename = time() . '.' . $product_photo->getClientOriginalExtension();
        Image::make($product_photo)->resize(394, 451)->save( base_path('public/uploads/product_photos/' . $filename ),60 );
        Product::find($product_id)->update([
          'product_photo' => $filename,
        ]);
      }
       return back()->with('status', 'Product Inserted Successfully!');
    }

    function productdelete($product_id)
    {
      Product::findOrFail($product_id)->delete();
      return back()->with('delete_status', 'Product Deleted Successfully!');
    }
    function productrestore($product_id)
    {
      Product::withTrashed()->findOrFail($product_id)->restore();
      return back()->with('restore_status', 'Product Restored Successfully!');
    }
    function productedit($product_id)
    {
      $edit_products = Product::findOrFail($product_id);
      return view('product\edit', compact('edit_products'));
    }
    function editproductinsert(Request $request)
    {
    $product_id = Product::findOrFail($request->product_id)->update([
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity,
      ]);
        if($request->hasFile('product_photo')){
      $product_photo = $request->file('product_photo');
      $filename = time() . '.' . $product_photo->getClientOriginalExtension();
      Image::make($product_photo)->resize(394, 451)->save( base_path('public/uploads/product_photos/' . $filename ),60 );
      Product::find($product_id)->update([
        'product_photo' => $filename,
      ]);
    }
      return back()->with('product_edited', 'Product Edited Successfully!');
    }
}
