@component('mail::message')

@php
    $productOrderID = [];
    $productOrder = [];

    foreach ($order->products as $product) {
        $productOrderID[] = $product->id;
    }

    foreach ($order->products as $product) {
        if(!in_array($product, $productOrder)){
            $productOrder[] = $product;
        }
    }
    
    $countQuantities = array_count_values($productOrderID);

@endphp

Gentile {{$order->customer_name}},

ti confermiamo che il tuo ordine è stato inoltrato al ristorante!

**Ecco i dettagli del tuo ordine:**

Numero ordine: {{$order->id}}

Prodotti acquistati:

@foreach ($productOrder as $product)
        {{$product->name}} x {{$countQuantities[$product->id]}}

@endforeach

Totale: {{$order->amount}} €

Buona giornata da Deliveboo!
@endcomponent
