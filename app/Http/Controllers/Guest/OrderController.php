<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;

class OrderController extends Controller
{
    public function checkout(Business $business)
    {
        $products = Product::where('business_id', $business->id)->get();
        return view('guest.checkout', compact('business'));
    }

    public function store(Request $request)
    {
        dd($request);
        return view('guest.checkout', compact('business'));
    }
}
