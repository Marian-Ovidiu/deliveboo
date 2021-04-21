<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

<div id="app">
    <div v-for="item in cartSaved">
        @{{item.id}}, @{{item.name}}, @{{item.quantity}}, @{{item.price}} <br>
    </div>
    <div>
        @{{totalPrice}}
    </div>

    {{-- Form --}}
    <form action="{{ route('order-payment') }}" method="post">
        @csrf
        @method( 'POST' )

        <input v-for ="product in cartSaved" type = "hidden" name = "products[]" :value = "product.id"/>
        <input type="submit" value="Procedi all'ordine">
        {{-- <input v-for ="dish in cart" type = "hidden" name = "quantity[]" :value = "dish.quantity"/>  --}}
    </form>



