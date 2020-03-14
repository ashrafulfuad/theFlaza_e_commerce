<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    function addsliderview()
    {
      $sliders = Slider::paginate(10);
      $deleted_sliders = Slider::onlyTrashed()->get();
      return view('slider/slider_view', compact('sliders', 'deleted_sliders'));
    }
    function addsliderinsert(Request $request)
    {
      $request->validate([
        'starting_price' => 'required|numeric',
        'collection_year' => 'required|numeric',
        'collection_name' => 'required',
        'button_name' => 'required',
        'button_link' => 'required',
        'slider_photo' => 'required',
      ]);
      $slider_id = Slider::insertGetId([
        'starting_price' => $request->starting_price,
        'collection_year' => $request->collection_year,
        'collection_name' => $request->collection_name,
        'button_name' => $request->button_name,
        'button_link' => $request->button_link,
        'created_at' => Carbon::now(),
      ]);
///////////////////////////////Photo upload Code//////////////////////////////
          if($request->hasFile('slider_photo')){
        $slider_photo = $request->file('slider_photo');
        $filename = time() . '.' . $slider_photo->getClientOriginalExtension();
        Image::make($slider_photo)->resize(1036, 846)->save( base_path('public/uploads/slider_photos/' . $filename ),60 );
        Slider::find($slider_id)->update([
          'slider_photo' => $filename,
        ]);
      }
///////////////////////////////Photo upload Code//////////////////////////////
       return back()->with('status', 'Slider Inserted Successfully!');
    }
    function sliderdelete($slider_id)
    {
      Slider::findOrFail($slider_id)->delete();
      return back()->with('delete_status', 'Product Deleted Successfully!');
    }
    function sliderrestore($slider_id)
    {
      Slider::withTrashed()->findOrFail($slider_id)->restore();
      return back()->with('restore_status', 'Product Restored Successfully!');
    }
    function slideredit($slider_id)
    {
      $edit_sliders = Slider::findOrFail($slider_id);
      return view('slider\slider_edit', compact('edit_sliders'));
    }
    function editsliderinsert(Request $request)
    {
      $request->validate([
        'starting_price' => 'required|numeric',
        'collection_year' => 'required|numeric',
        'collection_name' => 'required',
        'button_name' => 'required',
        'button_link' => 'required',
      ]);
      $slider_id = Slider::findOrFail($request->slider_id)->update([
        'starting_price' => $request->starting_price,
        'collection_year' => $request->collection_year,
        'collection_name' => $request->collection_name,
        'button_name' => $request->button_name,
        'button_link' => $request->button_link,
      ]);
///////////////////////////////Photo upload Code//////////////////////////////
      if($request->hasFile('slider_photo')){
        $slider_photo = $request->file('slider_photo');
        $filename = time() . '.' . $slider_photo->getClientOriginalExtension();
        Image::make($slider_photo)->resize(1036, 846)->save( base_path('public/uploads/slider_photos/' . $filename ),60 );
        Slider::find($slider_id)->update([
        'slider_photo' => $filename,
        ]);
      }
///////////////////////////////Photo upload Code/////////////////////////////
      return back()->with('product_edited', 'Slider Edited Successfully!');
    }
}
