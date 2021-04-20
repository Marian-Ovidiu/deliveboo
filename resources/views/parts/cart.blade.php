<div id="app" class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-7">
            <div class="product-details mr-2">
                <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i>
                    <span class="ml-2">Prodotti</span>
                </div>
                <hr>
                @foreach ($business->products()->get() as $product)
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row">
                        <img class="rounded" src="{{ $product->img }}" alt="{{ $product->name }}" width="40">
                        <div class="ml-2">
                            <span class="font-weight-bold d-block">{{ $product->name }}</span>
                            <span class="spec">{{ $product->description }}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        {{-- <span class="d-block">2</span> --}}
                        <span class="d-block ml-5 font-weight-bold">{{ $product->price }}</span>
                        {{-- <a href=""><i class="far fa-trash-alt ml-3 text-black-50"></i></a> --}}
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" @click="add({{$product->id}}, '{{$product->name}}', {{$product->price}})">Add</button>
                <br><br>
                <button type="button" class="btn btn-warning" @click="quantityUp({{$product->id}}, {{$product->price}})">+</button>
                <br><br>
                <button type="button" class="btn btn-warning" @click="quantintyDown({{$product->id}}, {{$product->price}})">-</button>
                <br><br>
                <button type="button" class="btn btn-danger" @click="remove({{$product->id}})">x</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-4">
            <div v-show="cart.length > 0">
                <div v-for="product in cart">
                  <hr>
                  [ #@{{product.id}} | @{{product.name}} | Qt. @{{product.quantity}} | Eur. @{{product.price}} ]
                  <br>
                  <br>
                  @{{amount()}}
                  <br>
                  <hr>
                </div>
              </div>
            <div class="payment-info">
                <div class="d-flex justify-content-between align-items-center">
                    <span>Card details</span>
                </div>
                <span class="type d-block mt-3 mb-1">Card type</span>
                <label class="radio"> <input type="radio" name="card" value="payment" checked>
                    <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span>
                </label>
                <label class="radio"> <input type="radio" name="card" value="payment">
                    <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span>
                </label>
                <label class="radio"> <input type="radio" name="card" value="payment">
                    <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span>
                </label>
                <label class="radio">
                    <input type="radio" name="card" value="payment">
                    <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span>
                </label>
                <div>
                    <label class="credit-card-label">Name on card</label>
                    <input type="text" class="form-control credit-inputs" placeholder="Name">
                </div>
                <div>
                    <label class="credit-card-label">Card number</label>
                    <input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="credit-card-label">Date</label>
                        <input type="text" class="form-control credit-inputs" placeholder="12/24">
                    </div>
                    <div class="col-md-6">
                        <label class="credit-card-label">CVV</label>
                        <input type="text" class="form-control credit-inputs" placeholder="342">
                    </div>
                </div>
                <hr class="line">
                <div class="d-flex justify-content-between information">
                    <span>Subtotal</span>
                    <span>$3000.00</span>
                </div>
                <div class="d-flex justify-content-between information">
                    <span>Shipping</span>
                    <span>$20.00</span>
                </div>
                <div class="d-flex justify-content-between information">
                    <span>Total(Incl. taxes)</span>
                    <span>$3020.00</span>
                </div>
                <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button">
                    <span>$3020.00</span>
                    <span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span>
                </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</div>
