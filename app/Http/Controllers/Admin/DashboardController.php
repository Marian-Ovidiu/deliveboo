<!--
QUESTO E' IL CONTROLLER DASHBOARD DEI RISTORANTI UTENTE
*NON CRUD
 -->
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
      //Da qui vedremo la dashboard principale "index"
        return view('admin.dashboard');
    }
}
