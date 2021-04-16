<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Business;
use App\Product;

class ProductController extends Controller
{
  // Gestione della VISUALIZZAZIONE DI TUTTI PIATTI relativi al Ristorante
    public function index()
    {
      $business = Business::where('user_id', Auth::user()->id)->get();
      $products = Product::where('business_id', $business->id)->get();
      return view('admin.business.products.index', compact('products'));
    }

    // Gestione della VISUALIZZAZIONE DI UN SINGOLO PIATTO relativo al Ristorante
    public function show(Product $product)
    {
        return view('admin.business.products.show',compact('product'));
    }

    // Gestione della CREAZIONE DI UN PIATTO relativo al Ristorante
    public function create()
    {
      return view('admin.business.products.create');
    }

    // Gestione dell'INSERIMENTO DEL PIATTO CREATO nel Database
    public function store(Request $request)
    {
        $this->isValid($request);

        $data = $request->all();
        $product = new Product();
        $product->fill($data);
        $product->save();
        return redirect()->route('BOOOOOOH');
    }

    // Gestione della MODIFICA DI UN PIATTO relativo al Ristorante
    public function edit(Product $product)
    {
     return view('admin.business.products.edit',compact('product'));
    }

    // Gestione dell'INSERIMENTO DEL PIATTO MODIFICATO nel Database
    public function update(Request $request, Product $product)
    {
        $this->isValid($request);

        $data = $request->all();
        $product->update($data);

        return redirect()->route('BOOOOH');

    }

    // Gestione dell'ELIMINAZIONE DI UN PIATTO dal Database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('BOOOOH');
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
