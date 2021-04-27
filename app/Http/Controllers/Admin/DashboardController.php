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

    $record = Order::select(
        DB::raw("COUNT(success) as count"),
        DB::raw("MONTHNAME(created_at) as month_name"),
        DB::raw("MONTH(created_at) as month")
    )
    ->where('created_at', '>', Carbon::today()->subDay(6))
    ->groupBy('month_name','month')
    ->orderBy('month')
    ->get();

    $data = [];

    foreach($record as $row) {
        $data['label'][] = $row->month_name;
        $data['data'][] = (int) $row->count;
    }

    $data['chart_data'] = json_encode($data);
    return view('admin.business.show', $data, compact('businesses'));
  }

}
