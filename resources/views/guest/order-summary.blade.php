@extends('layouts.checkout')
@section('title', 'Il tuo ordine')
@section('content')
<script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>

<div class="container" id="app">

    <div class="row">
        <div class="col-2 row-space"></div>
        <div class="col-8 row-container">
            <div class="row-container-row row">
                <div class="col-12 row-container-row-summary">
                    <div v-for="item in cartSaved" style="display: flex;" class="row-container-row-summary-row row">
                        <div class="col-5">@{{item.name}}</div>
                        <div class="col-2">@{{item.quantity}}</div>
                        <div class="col-5">&euro; @{{item.price}}</div>
                    </div>
                </div>
            </div>
            <div class="row-container-row row">
                <div class="col-12 row-container-row-amount">
                    Totale Ordine € @{{amountSaved}}
                </div>
            </div>
            <hr>

            {{-- Form --}}
            <form class="row" action="{{ route('order-payment') }}" method="post">
                @csrf
                @method( 'POST' )
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            {{-- row: name --}}
                            <div class="form-group">
                                <label for="customer_name"><b>Nome</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" id="customer_name" name="customer_name">
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_name') }}
                                </div>
                            </div>
                            {{-- / row: name --}}
                        </div>
                        <div class="col-6">
                            {{-- row: last name --}}
                            <div class="form-group">
                                <label for="customer_last_name"><b>Cognome</b></label>
                                <input type="text" class="form-control {{ $errors->has('customer_last_name') ? 'is-invalid' : '' }}" id="customer_last_name" name="customer_last_name">
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_last_name') }}
                                </div>
                            </div>
                            {{-- / row: last name --}}
                        </div>
                    </div>


                    {{-- row: city --}}
                    <div class="form-group">
                        <label for="city"><b>Città</b></label>
                        <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" id="city" name="city">
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    </div>
                    {{-- / row: city --}}


                    {{-- row: customer_address --}}
                    <div class="form-group">
                        <label for="customer_address"><b>Indirizzo</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" id="customer_address" name="customer_address">
                        <div class="invalid-feedback">
                            {{ $errors->first('customer_address') }}
                        </div>
                    </div>
                    {{-- / row: customer_address --}}



                     {{-- row: postal_code --}}
                     <div class="form-group">
                        <label for="postal_code"><b>CAP</b></label>
                        <input type="text" class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}" id="postal_code" name="postal_code">
                        <div class="invalid-feedback">
                            {{ $errors->first('postal_code') }}
                        </div>
                    </div>
                    {{-- / row: postal_code --}}

                    {{-- row: email --}}
                    <div class="form-group">
                        <label for="customer_email"><b>Email</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_email') ? 'is-invalid' : '' }}" id="customer_email" name="customer_email">
                        <div class="invalid-feedback">
                            {{ $errors->first('customer_email') }}
                        </div>
                    </div>
                    {{-- / row: email --}}

                    {{-- row: telephone --}}
                    <div class="form-group">
                        <label for="customer_telephone"><b>Telefono</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_telephone') ? 'is-invalid' : '' }}" id="customer_telephone" name="customer_telephone">
                        <div class="invalid-feedback">
                            {{ $errors->first('customer_telephone') }}
                        </div>
                    </div>
                    {{-- / row: telephone --}}

                    {{-- row: notes --}}
                    <div class="form-group">
                        <label for="notes"><b>Annotazioni (facoltativo)</b></label>
                        <input type="text" class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" id="notes" name="notes">
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    </div>
                    {{-- / row: notes --}}

                    {{-- row: success --}}
                    <input type="hidden" value="" name="success">
                    {{-- / row: success --}}

                    {{-- row: amount --}}
                    <input type="hidden" :value="amountSaved" name="amount">
                    {{-- / row: amount --}}

                    <br>
                    <br>
                    <hr>
                    <br>
                    <br>

                    <input v-for ="product in cartSaved" type = "hidden" name = "products[]" :value = "product.id"/>
                    <input v-for ="product in cartSaved" type = "hidden" name = "quantities[]" :value = "product.quantity"/>

                    <input type="submit" value="Procedi all'ordine">

                    <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-2 row-space"></div>
    </div>

@endsection


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
        form.submit();
    });
    });
});
</script>
