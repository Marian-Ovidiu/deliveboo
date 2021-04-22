<div id="app" class="col-12 business-main">
    <div class="business-main-row row">
        <div class="col-1 business-main-row-space"></div>
        <div class="business-main-row-content col-5">
            <div class="business-main-row-content-row row">
                <div class="col-12 business-main-row-content-row-products">
                    <div class="business-main-row-content-row-products-row row">
                        <div class="col-12 business-main-row-content-row-products-row-title">I nostri piatti</div>
                    </div>
                    <div class="business-main-row-content-row-products-row row">
                        @foreach ($business->products()->get() as $product)
                        <div class="col-12 business-main-row-content-row-products-row-product">
                            <div class="business-main-row-content-row-products-row-product-row row">
                                <div class="col-9 business-main-row-content-row-products-row-product-row-name">
                                    <div class="business-main-row-content-row-products-row-product-row-name-img"  style="background-image: url({{ $product->img }});"></div>
                                    <div class="business-main-row-content-row-products-row-product-row-name-container">
                                        <span class="business-main-row-content-row-products-row-product-row-name-container-title">{{ $product->name }}</span><br>
                                        <span class="business-main-row-content-row-products-row-product-row-name-container-description">{{ $product->description }}</span>
                                    </div>
                                </div>
                                <div class="col-1 business-main-row-content-row-products-row-product-row-price"><strong>Prezzo</strong> <br><br> {{ $product->price }}€</div>
                                <div class="col-2 business-main-row-content-row-products-row-product-row-options" style="text-align: center">
                                    <button type="button" class="btn btn-primary" v-on:click = "add({{$product->id}}, '{{$product->name}}', {{$product->price}})" style="width: 95%; margin-top: 20px;">Add</button><br><br>
                                    <button type="button" class="btn btn-warning" v-on:click = "quantityUp({{$product->id}}, {{$product->price}})" style="width: 45%;" >+</button>
                                    <button type="button" class="btn btn-warning" v-on:click = "quantintyDown({{$product->id}}, {{$product->price}})" style="width: 45%;">-</button><br><br>
                                    <button type="button" class="btn btn-danger" v-on:click = "remove({{$product->id}})" style="width: 95%;">Remove</button>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="col-5 business-main-row-container">
            <div class="business-main-row-container-row row">
                <div class="col-1 business-main-row-container-row-space"></div>
                <div class="col-10 business-main-row-container-row-cart">
                    {{-- <div v-show="cart.length > 0">
                        <div v-for="product in cart">
                          X@{{product.quantity}}  @{{product.name}} €@{{product.price}}
                          <br>

                        </div>
                        <a class="btn btn-primary" v-on:click="saveCart()" href="{{asset(route('cart-checkout', compact('business')))}}">Checkout</a>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-8 cart">
                            <div class="title">
                                <div class="row">
                                    <div class="col-12">
                                        <h4><b>Shopping Cart</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-bottom">
                                <div v-for="product in cart" class="row main align-items-center" style="display: flex;">

                                        <div class="col-5" style="background-color: red">
                                            <div class="row">@{{product.name}}</div>
                                        </div>
                                        <div class="col-3" style="background-color: yellow"><a href="#" class="border">X @{{product.quantity}}</a></div>
                                        <div class="col-4" style="background-color: green">&euro; @{{product.price}}</div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 summary">
                            <div>
                                <h5><b>Summary</b></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col" style="padding-left:0;">ITEMS 3</div>
                                <div class="col text-right">&euro; 132.00</div>
                            </div>
                            <form>
                                <p>SHIPPING</p> <select>
                                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                                </select>
                                <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
                            </form>
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">TOTAL PRICE</div>
                                <div class="col text-right">&euro; 137.00</div>
                            </div> <button class="btn">CHECKOUT</button>
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
                <div class="col-1 business-main-row-container-row-space"></div>
            </div>

        </div>
        <div class="col-1 business-main-row-space"></div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</div>
