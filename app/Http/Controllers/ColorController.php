<?php

namespace App\Http\Controllers;
use App\Color;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function addcolorview(){
      $color = Color::all();
      $deleted_color = Color::onlyTrashed()->get();
      return view('color/view', compact('color', 'deleted_color'));
    }
    public function addcolorinsert(Request $request){
      $request->validate([
        'color_name' => 'required | unique:colors,color_name',
        'color_code' => 'required',
      ]);
      Color::insert([
        'color_name' => $request->color_name,
        'color_code' => $request->color_code,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('status', 'Color Inserted Successfully!');
    }
    function colordelete($color_id){
      Color::findOrFail($color_id)->delete();
      return back()->with('delete_status', 'Color Deleted Successfully!');
    }
    function colorrestore($color_id){
      Color::withTrashed()->findOrFail($color_id)->restore();
      return back()->with('restore_status', 'Color Restored Successfully!');
    }
    function coloredit($color_id){
      $edit_color = Color::findOrFail($color_id);
      return view('color\edit', compact('edit_color'));
    }
    function editcolorinsert(Request $request){
      $color_id = Color::findOrFail($request->color_id)->update([
          'color_name' => $request->color_name,
          'color_code' => $request->color_code,
        ]);
        return back()->with('product_edited', 'Color Edited Successfully!');
    }
}
