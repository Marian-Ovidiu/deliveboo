<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;
use App\Order;

class PublicController extends Controller
{

  // Homepage
  public function index()
  {
    return view('guest.home');
  }
  // Pagina ristorante
  public function show_business ()
  {
    return view('guest.business');
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
