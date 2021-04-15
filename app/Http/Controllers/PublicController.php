<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $businesses = Business::all();
      return view('businesses.index', compact('businesses'));
    }

    public function show($id)
    {
        $business = Business::find($id);
        return view('businesses.show', compact('business'));
    }
}
