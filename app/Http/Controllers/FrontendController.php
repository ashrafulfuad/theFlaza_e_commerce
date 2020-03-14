<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;
use App\Category;
use App\Cart;
use Carbon\Carbon;



class FrontendController extends Controller
{
    function index()
    {
      $categories = Category::all();
      $products = Product::all();
      $sliders = Slider::all();
      // $sliders = Slider::limit(2)->get();    To make limitation
      return view('frontend/index', compact('products', 'sliders', 'categories'));
    }
    function contact()
    {
      return view('frontend/contact');
    }
    function productdetails($product_id)
    {
      $product_info = Product::findOrFail($product_id);
      $this_cat = $product_info->category_id;
      $cats_products = Product::all()->where('category_id', $this_cat);
      return view('product/details', compact('product_info', 'cats_products'));
    }
    function addtocart(Request $request)
    {
      $customer_ip = $_SERVER['REMOTE_ADDR'];
      if (Cart::where('customer_ip', $customer_ip)->where('product_id', $request->product_id)->where('color_id', $request->cs)->exists()) {
        (Cart::where('customer_ip', $customer_ip)->where('product_id', $request->product_id)->where('color_id', $request->cs)->increment('product_quantity'));
      }
      else {
      Cart::insert([
      'customer_ip' => $customer_ip,
      'product_id' => $request->product_id,
      'color_id' => $request->cs,
      'created_at' => Carbon::now(),
    ]);
    }
      return back();
    }
    function cartview()
    {
      $customer_ip = $_SERVER['REMOTE_ADDR'];
      $cart_items = Cart::where('customer_ip', $customer_ip)->get();
      return view('frontend/cart', compact('cart_items'));
    }
    function deletefromcart($cart_id)
    {
      Cart::findOrFail($cart_id)->delete();
      return back();
    }
}
