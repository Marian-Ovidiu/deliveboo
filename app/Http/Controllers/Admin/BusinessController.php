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
        $businesses = Business::where('user_id', Auth::id())->get();
        return redirect()->route('dashboard', compact('businesses'));
    }

    // Gestione della VISUALIZZAZIONE DI UN SINGOLO RISTORANTE relativo all'user
    public function show(Business $business)
    {

        // $business = Business::where('user_id', Auth::user()->id)->get();
        // $products = Product::where('business_id', Auth::user()->id)->get();
        // $record = Order::select(
        //     DB::raw("COUNT(success) as count"),
        //     DB::raw("MONTHNAME(created_at) as month_name"),
        //     DB::raw("MONTH(created_at) as month")
        // )
        // ->where('created_at', '>', Carbon::today()->subDay(6))
        // ->groupBy('month_name','month')
        // ->orderBy('month')
        // ->get();
        // $data = [];
        // foreach($record as $row) {
        //     $data['label'][] = $row->month_name;
        //     $data['data'][] = (int) $row->count;
        // }
        // $data['chart_data'] = json_encode($data);

        // $businesses = Business::where('user_id', Auth::id())->get();
        // dd($businesses[0]->id);

        // foreach ($businesses as $business) {
        //     $userId = $business->user_id;
        // }
        // dd($userId);

        // $products = Product::where('business_id', $business->id)->get();

        // $orders = DB::table('order_product')
        // ->join('products', 'order_product.product_id' ,'=', 'products.id')
        // ->where('business_id', $business->id)->get();

        // $orders = Order::select(
        //     DB::raw("COUNT(success) as count"),
        //     DB::raw("MONTHNAME(created_at) as month_name"),
        //     DB::raw("MONTH(created_at) as month")
        // )
        // ->join('products', 'order_product.product_id' ,'=', 'products.id')
        // ->where('business_id', $business->id)->get();

        // $graphicsOrder = array_fill(1, 12, 0);

        // foreach($orders as $order) {
        //     $orderWithDate = Order::where('id', $order->order_id)->first();
        //     $currentDate = new \DateTime($orderWithDate->created_at);
        //     $currentMonth = intval(date_format($currentDate, "m"));
        //     $graphicsOrder[$currentMonth - 1] += $order->price * $order->quantity;
        // }



        // $userId = Auth::id();
        // $businesses = Business::where('user_id', Auth::id())->get();
        $products = Product::where('business_id', $business->id)->get();
        $businessId = $business->id;

        $orders = json_encode(Order::with(['products'])->whereHas('products', function($query) use($businessId) {
            $query->where('business_id', $businessId);
        })->get());
        // dd(gettype($orders));
        // return view('user.statistics',compact('orders'));

        return view('admin.business.show', compact('orders', 'business'));

        // $orders = Order::select(
        //     DB::raw("COUNT(*) as count"),
        //     DB::raw("SUM(products.price) as fatturato_mensile"),
        //     DB::raw("MONTHNAME(created_at) as month_name"),
        //     DB::raw("MONTH(created_at) as month")
        // )
        // ->join("order_product", "product_id", "=", "products.id")
        // ->join("orders", "id", "=", "order_id")
        // ->where("products.business_id", "=", $business->id)
        // ->where("orders.success", "=", 1)
        // ->orderBy('fatturato_mensile')
        // ->orderBy('month')
        // ->groupBy("month_name, month")
        // ->orderBy('month')
        // ->get();

        // $data = [];
        // foreach($orders as $order) {
        //     $data['label'][] = $order->month_name;
        //     $data['data'][] = (int) $order->count;
            // $data['data'][] += (int) 100;
        // }
        // $data['chart_data'] = json_encode($data);

        // return view('admin.business.show', compact('business', 'products', 'orders', $data));
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
