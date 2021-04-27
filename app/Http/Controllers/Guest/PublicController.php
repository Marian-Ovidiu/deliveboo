<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;
use App\Order;
use Carbon\Carbon;

class PublicController extends Controller
{

  // Homepage
  public function index()
  {
    $businesses = Business::all();
    return view('guest.home', compact('businesses'));
  }
  // Pagina ristorante
  public function show_business(Business $business)
  {
    return view('guest.business', compact('business'));
  }


  // Test Carrello - Lista ristoranti
  public function cart_businesses_list()
  {
    $businesses = Business::all();
    return view('guest.cart-businesses', compact('businesses'));
  }
  // Test Carrello - Menu ristorante
  public function cart_business_menu($id)
  {
    $business = Business::find($id);
    return view('guest.cart-business', compact('business'));
  }
}
