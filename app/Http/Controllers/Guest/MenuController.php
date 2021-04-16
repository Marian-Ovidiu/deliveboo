<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;

class MenuController extends Controller
{
    public function singleProduct(Request $request) {
        $business = Business::all();
        $products = Product::find();
        return view('businesses.create', compact('types'));
    }

    public function productsList(Business $business) {
        $products = Product::where('business_id', $business->id)->get();
    }
}
