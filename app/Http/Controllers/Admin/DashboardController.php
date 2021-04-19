<?php

namespace App\Http\Controllers\Admin\ChartController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Business;

class DashboardController extends Controller
{
  public function index()
  {
    $businesses = Business::where('user_id', Auth::user()->id)->get();
    return view('admin.dashboard', compact('businesses'));
  }
}
