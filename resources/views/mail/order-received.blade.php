@component('mail::message')

@php
    $productOrderID = [];
    $productOrder = [];

    foreach ($order->products as $product) {
        $productOrderID[] = $product->id;
        if(!in_array($product, $productOrder)){
            $productOrder[] = $product;
        }
    }

    $countQuantities = array_count_values($productOrderID);

@endphp

Gentile {{$order->customer_name}},

il tuo ordine è in preparazione!

**Dettagli ordine:**

Order ID: {{$order->id}}

Prodotti acquistati:

@foreach ($productOrder as $product)
* {{$product->name}} - Quantità: {{$countQuantities[$product->id]}}

@endforeach

Totale: {{$order->amount}} €

Grazie per aver scelto Deliveboo!
@endcomponent
