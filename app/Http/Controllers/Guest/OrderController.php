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
    $order->fill($data);y
    $order->save();
    $order->products()->attach($products);

    $gateway = new Gateway([
    'environment' => 'sandbox',
    'merchantId' => 'nyfdp2wz77gqqj29',
    'publicKey' => '8bdc65hxyy4pg56f',
    'privateKey' => 'e16fd716976555b304d8b2d18ad5ce55'
    ]);
    $result = $gateway->transaction()->sale([
    'amount' => $order->amount,
    'paymentMethodNonce' => 'fake-valid-nonce',
    'options' => [
    'submitForSettlement' => true
    ]
    ]);

    dd($result);

    if ($result->success || !is_null($result->transaction)) {
      $transaction = $result->transaction;
      //redirect da qualche parte;
    } else {
      $errors = [];
      foreach($result->errors->deepAll() as $error) {
        $errors[$error->code] = $error->message;
      }
      Router::redirect(SITE_URL . 'payment/?' . http_build_query($errors));
    }

    return view('guest.success');
  }
}
