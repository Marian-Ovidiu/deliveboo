<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Business;
use App\Product;
use App\Type;

use App\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB as DB;

class BusinessController extends Controller
{
  // Gestione della VISUALIZZAZIONE DI TUTTI RISTORANTI relativi all'user
    public function index()
    {
      return redirect()->route('dashboard');
    }

    // Gestione della VISUALIZZAZIONE DI UN SINGOLO RISTORANTE relativo all'user
    public function show(Business $business)
    {
        $businesses = Business::where('user_id', Auth::user()->id)->get();
        $products = Product::where('business_id', $business->id)->get();

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
        return view('admin.business.show', $data, compact('business'));
    }

    // Gestione della CREAZIONE DI UN RISTORANTE relativo all'user
    public function create()
    {
      $types = Type::all();
      return view('admin.business.create', compact('types'));
    }

    // Gestione dell'INSERIMENTO DEL RISTORANTE CREATO nel Database
    public function store(Request $request)
    {
        $this->isValid($request);

        $data = $request->all();
        $path = $request->file('logo')->store('stored-imgs');

        $business = new Business();
        $business->fill($data);
        $business->logo = $path;
        $business->save();
        $business->types()->attach($data['type']);

        return redirect()->route('dashboard');
    }

    // Gestione della MODIFICA DI UN RISTORANTE relativo all'user
    public function edit(Business $business)
    {
      $types = Type::all();
      return view('admin.business.edit', compact('business', 'types'));
    }

    // Gestione dell'INSERIMENTO DEL RISTORANTE MODIFICATO nel Database
    public function update(Request $request, Business $business)
    {
        $this->isValid($request);

        if ($request->hasFile('logo')) {
          $path = $request->file('logo')->store('stored-imgs');
          $business->logo = $path;
        }

        $data = $request->all();
        $business->update($data);
        $business->types()->sync($data['type']);
        return redirect()->route('dashboard');
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
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'description' => 'required|max:1024',
        'type' => 'required',
        'email' => 'required',
        'telephone' => 'required|min:10|max:10',
      ]);
    }

}
