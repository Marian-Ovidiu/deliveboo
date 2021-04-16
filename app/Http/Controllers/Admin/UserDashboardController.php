<!--
QUESTO E' IL CONTROLLER USER-DASHBOARD DELL'AREA PRIVATA
*NON CRUD
 -->
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index(){
      /*
      Da qui vedremo la dashboard dell'utente, che conterrà:
      tutti suoi dati ed la lista ristoranti associati.
      */
        return view('admin.userdashboard');
    }
}
