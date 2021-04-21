<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Product;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $business = Business::where('slug', $request->slug)->first();
        return view('cart.index', compact('restaurant'));
    }

    public function store(Request $request, Faker $faker){
        $dishesList = [];
        $quantityList = [];
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        $business_id = $cookieCart[0]->restaurant_id;
        $request["restaurant_id"] = $business_id;
        $request["exp_date"] = $faker->dateTimeInInterval($startDate = 'now', $endDate = '+ 1 hour');
        foreach ($cookieCart as $cook) {
            array_push ($dishesList , $cook->id);
            array_push ($quantityList , $cook->quantity);
        }


        $validateData = $request->validate([
            'special_requests' => 'nullable',
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'restaurant_id' => 'required|exists:restaurants,id',
            'dishes' => 'exists:dishes,id',
            'exp_date' => '',
            'quantity' => '',
        ]);

        Order::create($validateData);

        $new_order = Order::orderBy("id", "desc")->first();

        foreach ($cookieCart as $cook) {
            $new_order->dishes()->attach([$cook->id => ['quantity' => $cook->quantity]]);
        }


        $to = $new_order->email;
        Mail::to($to)->send(new Email);

        return redirect()->route('guests.success', compact('new_order'));
    }

    public function success(Order $order)
    {
        $order = Order::orderBy("id", "desc")->first();
        return view('guests.success', compact('order'));
    }
}
