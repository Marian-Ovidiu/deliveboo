<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Business;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB as DB;

class DashboardController extends Controller
{
    public function index() {
        $businesses = Business::where('user_id', Auth::user()->id)->get();
        return view('admin.business.dashnew', compact('businesses'));
    }

    public function chartjs() {
        $record = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();

        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);
        return view('admin.business.dashnew', $data);
    }
}
