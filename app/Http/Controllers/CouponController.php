<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    function addcouponview()
    {
      return view('coupon/view');
    }
    function couponinsert(Request $request)
    {
      $request->validate([
        'coupon_name' => 'required|unique:coupons,coupon_name',
        'valid_till' => 'required',
        'coupon_amount' => 'required|max:2',
      ]);
      Coupon::insert([
        'coupon_name' => $request->coupon_name,
        'valid_till' => $request->valid_till,
        'coupon_amount' => $request->coupon_amount,
        'created_at' => Carbon::now(),
      ]);
      return back();
    }
}
