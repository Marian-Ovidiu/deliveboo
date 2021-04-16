<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Business;

class BusinessController extends Controller
{
  // Gestione della VISUALIZZAZIONE DI TUTTI RISTORANTI relativi all'user
    public function index()
    {
      $businesses = Business::where('user_id', Auth::user()->id)->get();
      return view('admin.businesses.index', compact('businesses'));
    }

    // Gestione della VISUALIZZAZIONE DI UN SINGOLO RISTORANTE relativo all'user
    public function show(Business $business)
    {
        return view('admin.businesses.show',compact('business'));
    }

    // Gestione della CREAZIONE DI UN RISTORANTE relativo all'user
    public function create()
    {
      return view('admin.businesses.create');
    }

    // Gestione dell'INSERIMENTO DEL RISTORANTE CREATO nel Database
    public function store(Request $request)
    {
        $this->isValid($request);

        $data = $request->all();
        $business = new Business();
        $business->fill($data);
        $business->save();
        return redirect()->route('BOOOOOOH');
    }

    // Gestione della MODIFICA DI UN RISTORANTE relativo all'user
    public function edit(Business $business)
    {
     return view('admin.businesses.edit',compact('business'));
    }

    // Gestione dell'INSERIMENTO DEL RISTORANTE MODIFICATO nel Database
    public function update(Request $request, Business $business)
    {
        $this->isValid($request);

        $data = $request->all();
        $business->update($data);

        return redirect()->route('BOOOOH');

    }

    // Gestione dell'ELIMINAZIONE DI UN RISTORANTE dal Database
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('BOOOOH');
    }

    //Da qui vedremo la pagina statistiche relative al ristorante
    public function statistics(){
        return view('admin.business.statistics');
    }

    //Da qui vedremo la pagina ordini relativi al ristorante
    public function orders(){
        return view('admin.business.orders');
    }

    // Gestione VALIDAZIONE campi
    protected function isValid($data)
    {
      $data->validate([
        'name'=>'required'
        // DA FARE
      ]);
    }

}
