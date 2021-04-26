<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProductController extends Controller
{
  // Gestione della VISUALIZZAZIONE DI TUTTI PIATTI relativi al Ristorante
  public function index()
  {
    return redirect()->route('dashboard');
  }

  // Gestione della VISUALIZZAZIONE DI UN SINGOLO PIATTO relativo al Ristorante
  public function show(Product $product)
  {
    return view('admin.business.product',compact('product'));
  }

  // Gestione della CREAZIONE DI UN PIATTO relativo al Ristorante
  public function create()
  {
    return view('admin.business.product.create');
  }

  // Gestione della CREAZIONE DI UN PIATTO relativo al Ristorante
  public function add($id)
  {
    return view('admin.business.product.create', [ 'business_id' => $id ]);
  }

  // Gestione dell'INSERIMENTO DEL PIATTO CREATO nel Database
  public function store(Request $request)
  {
    $this->isValid($request);

    $data = $request->all();
    $path = $request->file('img')->store('stored-imgs');

    $product = new Product();
    $product->fill($data);
    $product->img = $path;
    $business = $product->business_id;
    $product->save();

    return redirect()->route('business.show', compact('business'));
  }

  // Gestione della MODIFICA DI UN PIATTO relativo al Ristorante
  public function edit(Product $product)
  {
    return view('admin.business.product.edit',compact('product'));
  }

  // Gestione dell'INSERIMENTO DEL PIATTO MODIFICATO nel Database
  public function update(Request $request, Product $product)
  {

    $business = $product->business_id;

    $this->isValid($request);

    if ($request->hasFile('img')) {
      $path = $request->file('img')->store('stored-imgs');
      $product->img = $path;
    }

    $data = $request->all();
    $product->update($data);

    return redirect()->route('business.show', compact('business'));
  }

  // Gestione dell'ELIMINAZIONE DI UN PIATTO dal Database
  public function destroy(Product $product)
  {
    $business = $product->business_id;
    $product->delete();
    return redirect()->route('business.show', compact('business'));
  }

  // Gestione VALIDAZIONE campi
  protected function isValid($data)
  {
    $data->validate([
    'name' => 'required|max:255',
    'ingredients' => 'required|max:512',
    'description' => 'required|max:1024',
    'price' => 'required',
    'visible' => 'required',
    ]);
  }

}
