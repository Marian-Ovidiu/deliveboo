<?php

namespace App\Http\Controllers\Guest;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Order;

class OrderController extends Controller
{
    public function checkout(Business $business)
    {

        $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'nyfdp2wz77gqqj29',
        'publicKey' => '8bdc65hxyy4pg56f',
        'privateKey' => 'e16fd716976555b304d8b2d18ad5ce55'
        ]);

        $token = $gateway->ClientToken()->generate();
        return view('guest.checkout', compact('business', 'token', 'gateway'));
    }

    public function store(Request $request)
    {

      $data = $request->all();

      $products= [];

      foreach ($data['products'] as $id => $product) {
        for ($i=0; $i < $data['quantities'][$id] ; $i++) {
          $products[] = $product;
        }
      }


      $order = new Order();
      $order->fill($data);
      $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'nyfdp2wz77gqqj29',
        'publicKey' => '8bdc65hxyy4pg56f',
        'privateKey' => 'e16fd716976555b304d8b2d18ad5ce55'
        ]);
      $order->save();
      $order->products()->attach($products);

        $nonce = true;

        $result = $gateway->transaction()->sale([
        'amount' => $order->amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
            ]
        ]);
        dd($result);
        if ($result->success) {
            $transaction = $result->transaction;
            return redirect()->route('purchase-made', ['transaction'=>$transaction,'order'=>$order]);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
        }

      return view('guest.success');
    }
}
