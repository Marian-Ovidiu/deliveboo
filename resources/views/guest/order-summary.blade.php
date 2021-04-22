@extends('layouts.checkout')
@section('title', 'Il tuo ordine')

@section('content')
<script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>

<body>
    <div class="container" id="app">
        {{-- riepilogo carrello da fixare css (non inline come adesso) --}}
        {{-- <div class="row">
            <div class="col-md-8" v-for="item in cartSaved">
                <p>@{{item.id}}, @{{item.name}}, @{{item.quantity}}, @{{item.price}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @{{amount}}
            </div>
        </div> --}}
        {{-- riepilogo carrello da fixare css (non inline come adesso) --}}
        <div class="row" style="margin-top: 20px">
            <div class="col-lg-8 mx-auto">
                {{-- Form --}}
                <form action="{{ route('order-payment') }}" method="post">
                    @csrf
                    @method( 'POST' )

                    {{-- row: name --}}
                    <div class="form-group">
                        <label for="customer_name"><b>Nome</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" id="customer_name" name="customer_name">
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    {{-- / row: name --}}

                    {{-- row: last name --}}
                    <div class="form-group">
                        <label for="customer_last_name"><b>Cognome</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_last_name') ? 'is-invalid' : '' }}" id="customer_last_name" name="customer_last_name">
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    </div>
                    {{-- / row: last name --}}

                    {{-- row: email --}}
                    <div class="form-group">
                        <label for="customer_email"><b>Email</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_email') ? 'is-invalid' : '' }}" id="customer_email" name="customer_email">
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    {{-- / row: email --}}

                    {{-- row: telephone --}}
                    <div class="form-group">
                        <label for="customer_telephone"><b>Telefono</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_telephone') ? 'is-invalid' : '' }}" id="customer_telephone" name="customer_telephone">
                        <div class="invalid-feedback">
                            {{ $errors->first('telephone') }}
                        </div>
                    </div>
                    {{-- / row: telephone --}}

                    {{-- row: address --}}
                    <div class="form-group">
                        <label for="customer_address"><b>Indirizzo</b></label>
                        <input type="text" class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" id="customer_address" name="customer_address">
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    </div>
                    {{-- / row: address --}}

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
                    <input type="hidden" value="1" name="success">
                    {{-- / row: success --}}

                    {{-- row: amount --}}
                    <input type="hidden" :value="amount" name="amount">
                    {{-- / row: amount --}}

                    <input v-for ="product in cartSaved" type="hidden" name="products[]" :value="product.id"/>
                    <input v-for ="product in cartSaved" type="hidden" name="quantities[]" :value="product.quantity"/>

                    <input type="submit" value="Procedi all'ordine">

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </form>
            </div>
        </div>


        <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>
        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{ $token }}";
            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                paypal: {
                    flow: 'vault'
                }
            },  function (createErr, instance) {
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
    </div>
</body>
@endsection
