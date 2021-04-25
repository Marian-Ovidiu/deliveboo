<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Business;
use App\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB as DB;

class DashboardController extends Controller
{
    public function index() {
        $businesses = Business::where('user_id', Auth::user()->id)->get();
        return view('admin.business.dashnew', compact('businesses'));
    }

    public function chartjs(Request $request) {
        $loggedUser = Auth::user()->id;

        $record = Order::select(
            DB::raw("SUM(amount) as count"),
            DB::raw("YEAR(created_at) as year"),
            DB::raw("MONTHNAME(created_at) as month")
        )
        // ->join('order_product', 'orders.id', '=', 'order_id')
        // ->join('products', 'products.id', '=', 'order_product.product_id')
        // ->join('businesses', 'products.business_id', '=', $loggedUser)
        ->where('created_at', '>', Carbon::today()->subDay(4))
        ->groupBy('year','month')
        ->orderBy('created_at', 'asc')
        ->get();

        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->month;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);
        return view('admin.business.dashnew', $data);

        // $userId = $request->user()->id;
        // $businessId = User::find($userId)->businessId;
        // $orders = Order::all()->where('business_id', $businessId);

        // foreach ($orders as $item) {
        //     $item->order = $item->order;
        // }

        // return view('admin.business.dashnew', compact('orders'));
    }
}
