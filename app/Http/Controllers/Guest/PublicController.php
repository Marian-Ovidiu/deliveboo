<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;
use App\Order;

class PublicController extends Controller
{
  public function index()
    {
      $businesses = Business::all();
      return view('guest.businesses', compact('businesses'));
    }

    public function show($id)
    {
      $business = Business::find($id);
      return view('guest.business', compact('business'));
    }

    public function orderCreate(Request $request)
    {
      $cart = $request->all();
      return view('guest.order', compact('cart'));
    }
}
