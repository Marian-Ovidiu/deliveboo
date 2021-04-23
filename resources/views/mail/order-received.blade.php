@component('mail::message')
Hai ricevuto un nuovo pagamento da un cliente Deliveboo!

ID ordine: {{$order->id}}

Incasso ordine: {{$order->amount}} €

Buona giornata da Deliveboo!
@endcomponent
