<?php

namespace App\Http\Controllers\Admin;
// QUESTO E' IL CONTROLLER USER-DASHBOARD DELL'AREA PRIVATA
// NON CRUD

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
      /*
      Da qui vedremo la dashboard dell'utente, che conterrà:
      tutti suoi dati ed la lista ristoranti associati.
      */
        return view('admin.userdashboard');
    }
}
