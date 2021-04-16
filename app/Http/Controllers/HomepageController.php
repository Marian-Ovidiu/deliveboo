<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Business;
use App\Type;

class HomepageController extends Controller
{
    public function index()
    {
        $users = User::all();
        $businesses = Business::all();
        $types = Type::all();
        return view('home', compact('businesses', 'types', 'users'));
    }
}
