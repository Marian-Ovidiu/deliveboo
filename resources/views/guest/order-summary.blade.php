@extends('layouts.base')
@section('title', 'Il tuo ordine')
@section('content')

<div id="app">
    <div class="container-row row">
        <div class="col-7 inner-container">
            {{-- Form --}}
            <form class="row" id="payment-form" action="{{ route('order-payment') }}" method="post">
                @csrf
                @method( 'POST' )
                <div class="offset-1"></div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            {{-- row: name --}}
                            <div class="form-group">
                                <label for="customer_name" style="color:white"><b>Nome</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" id="customer_name" name="customer_name" placeholder="Nome">
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_name') }}
                                </div>
                            </div>
                            {{-- / row: name --}}
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            {{-- row: last name --}}
                            <div class="form-group">
                                <label for="customer_last_name" style="color:white"><b>Cognome</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_last_name') ? 'is-invalid' : '' }}" id="customer_last_name" name="customer_last_name" placeholder="Cognome">
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_last_name') }}
                                </div>
                            </div>
                            {{-- / row: last name --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            {{-- row: city --}}
                            <div class="form-group">
                                <label for="city" style="color:white"><b>Città</b></label>
                                <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" id="city" name="city" placeholder="Città">
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            </div>
                            {{-- / row: city --}}
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            {{-- row: postal_code --}}
                            <div class="form-group">
                                <label for="postal_code" style="color:white"><b>Cap</b></label>
                                <input type="text" class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}" id="postal_code" name="postal_code" placeholder="CAP">
                                <div class="invalid-feedback">
                                    {{ $errors->first('postal_code') }}
                                </div>
                            </div>
                            {{-- / row: postal_code --}}
                        </div>
                    </div>
                    {{-- / row: customer_address --}}


                    <div class="row">
                        <div class="col-12">
                            {{-- row: address --}}
                            <div class="form-group">
                                <label for="customer_address" style="color:white"><b>Indirizzo</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" id="customer_address" name="customer_address" placeholder="Indirizzo">
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_address') }}
                                </div>
                            </div>
                            {{-- / row: address --}}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            {{-- row: email --}}
                            <div class="form-group">
                                <label for="customer_email" style="color:white"><b>Email</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_email') ? 'is-invalid' : '' }}" id="customer_email" name="customer_email" placeholder="Email">
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_email') }}
                                </div>
                            </div>
                            {{-- / row: email --}}
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            {{-- row: telephone --}}
                            <div class="form-group">
                                <label for="customer_telephone" style="color:white"><b>Telefono</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_telephone') ? 'is-invalid' : '' }}" id="customer_telephone" name="customer_telephone" placeholder="Numero di Telefono">
                                <div class="invalid-feedback">
                                    {{ $errors->first('telephone') }}
                                </div>
                            </div>
                            {{-- / row: telephone --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {{-- row: notes --}}
                            <div class="form-group">
                                <label for="notes" style="color:white"><b>Annotazioni (facoltativo)</b></label>
                                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" id="notes" name="notes" placeholder="(facoltativo)"></textarea>
                                <div class="invalid-feedback">
                                {{ $errors->first('notes') }}
                            </div>
                        </div>
                        {{-- / row: notes --}}
                        </div>
                    </div>
                </div>
                <div class="offset-1"></div>
            </form>
            {{-- / Form --}}
        </div>

        <div class="recap-table col-5 inner-container">

            {{-- tabella riepilogativa ordine --}}
            <div class="row">
                <div class="offset-1"></div>
                <div class="col-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col-8">Prodotto</th>
                                <th scope="col-2">Quantità</th>
                                <th scope="col-2">Prezzo (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in cartSaved">
                                <td class="col-sm-8 col-xs-12">@{{item.name}}</td>
                                <td class="col-sm-1 col-xs-6">@{{item.quantity}}</td>
                                <td class="col-sm-3 col-xs-6">@{{item.price}}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-8 col-xs-12">Totale Ordine</td>
                                <td class="col-sm-1 col-xs-6">€</td>
                                <td class="col-sm-3 col-xs-6">@{{amountSaved}}</td>
                            </tr>
                        </tbody>
                    </table>
                       {{-- row: success --}}
                       <input type="hidden" value="" name="success">
                       {{-- / row: success --}}

                       {{-- row: amount --}}
                       <input type="hidden" :value="amountSaved" name="amount">
                       {{-- / row: amount --}}

                       <input v-for ="product in cartSaved" type = "hidden" name = "products[]" :value = "product.id"/>
                       <input v-for ="product in cartSaved" type = "hidden" name = "quantities[]" :value = "product.quantity"/>
                       <div class="bt-drop-in-wrapper">
                           <div id="bt-dropin"></div>
                       </div>
                       <input type="submit" id="submit-button" value="Procedi all'ordine" class="btn btn-success">
                </div>
                <div class="offset-1"></div>
            </div>
            {{-- / tabella riepilogativa ordine --}}
        </div>
    </div>

<script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{ $token }}";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
    }, function (createErr, instance) {
        if (createErr) {
        console.log('Create Error', createErr);
        return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                console.log('Request Payment Method Error', err);
                return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>
@endsection





