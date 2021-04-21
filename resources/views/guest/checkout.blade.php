<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

<div class="container" id="app">
  <div v-for="item in cartSaved">
    @{{item.id}}, @{{item.name}}, @{{item.quantity}}, @{{item.price}} <br>
  </div>
  <div>
    @{{amount}}
  </div>

  <br>
  <br>
  <hr>
  <br>
  <br>

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

    <br>
    <br>
    <hr>
    <br>
    <br>

    <input v-for ="product in cartSaved" type = "hidden" name = "products[]" :value = "product.id"/>
    <input v-for ="product in cartSaved" type = "hidden" name = "quantities[]" :value = "product.quantity"/>

    <input type="submit" value="Procedi all'ordine">
  </form>
