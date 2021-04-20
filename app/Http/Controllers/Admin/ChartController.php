<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Chart;
use DB;

class ChartController extends Controller
{
public function index()
    {
// Get users grouped by age
$groups = DB::table('orders')
                  ->select('id', DB::raw('count(*) as total'))
                  ->groupBy('id')
                  ->pluck('total', 'id')->all();
// Generate random colours for the groups
for ($i=0; $i<=count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
// Prepare the data for returning with the view
$chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
return view('chart', compact('chart'));
    }

}
