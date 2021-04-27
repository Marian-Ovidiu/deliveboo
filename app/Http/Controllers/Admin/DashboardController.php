<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Business;
use App\User;
use App\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB as DB;

class DashboardController extends Controller
{
  public function index()
  {
    $businesses = Business::where('user_id', Auth::user()->id)->get();
    return view('admin.dashboard', compact('businesses'));
  }

}
