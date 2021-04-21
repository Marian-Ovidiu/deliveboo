<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;
use App\Order;

class OrderController extends Controller
{
    public function checkout(Business $business)
    {
        return view('guest.checkout', compact('business'));
    }

    public function store(Request $request, Product $products)
    {
      $data = $request->all();

      $products= [];

      foreach ($data['products'] as $product_id) {
        $products[] = Product::where('id', $product_id)->get();
      }

      $order = new Order();
      $order->fill($data);
      $order->save();
      $order->products()->attach($products);

      dd($order);

        return view('guest.checkout');
    }
}
