<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Type;

class HomeController extends Controller
{
    public function index()
    {
      $businesses = Business::all();
      $types = Type::all();
      return view('guest.home', compact('businesses', 'types'));
    }

    public function businessList(Request $request)
    {
        $data = $request->all();
        dd($data);

        // if(empty($data["name"])){
        //     $businesses = Business::all();
        // }
        // if(!empty($data["name"])){
        //     $businesses = Business::where("name", "=", $data["name"])->get();
        // }

        return view('guest.home', compact('businesses'));
    }
}
