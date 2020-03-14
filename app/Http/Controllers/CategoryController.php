<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Color;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function addcategoryview(){
      $categories = Category::all();
      $deleted_categories = Category::onlyTrashed()->get();
      return view('category/view', compact('categories','deleted_categories'));
    }
    function addcategoryinsert(Request $request){
      $request->validate([
        'category_name' => 'required | unique:categories,category_name',
      ]);
      Category::insert([
        'category_name' => $request->category_name,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('status', 'Category Inserted Successfully!');
    }
    function categorydelete($category_id){
      Category::findOrFail($category_id)->delete();
      return back()->with('delete_status', 'Category Deleted Successfully!');
    }
    function categoryrestore($category_id){
      Category::withTrashed()->findOrFail($category_id)->restore();
      return back()->with('restore_status', 'Category Restored Successfully!');
    }
    function categoryedit($category_id){
      $category_edit = Category::findOrFail($category_id);
      return view('category/edit', compact('category_edit'));
    }
    function editcategoryinsert(Request $request){
      $category_id = Category::findOrFail($request->category_id)->update([
          'category_name' => $request->category_name,
        ]);
        return back()->with('product_edited', 'Category Edited Successfully!');
    }
}
