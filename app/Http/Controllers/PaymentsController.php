<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Braintree\Transaction as Braintree_Transaction;

class PaymentsController extends Controller
{
    public function make(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $status = Braintree_Transaction::sale([
            'amount' => '30.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                    'submitForSettlement' => True
                    ]
                ]);
        return response()->json($status);
    }

    /* public function process(Request $request)
    {
        $totalOrder = 0;
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        foreach ($cookieCart as $cookie) {
            $dishid = $cookie->id;
            $dish = Dish::where('id', $dishid)->first();
            $totalOrder += $dish->price * $cookie->quantity;
        }

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Braintree\Transaction::sale([
        'amount' => $totalOrder,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => True
        ]
        ]);

        return response()->json($status);
    }*/

}
