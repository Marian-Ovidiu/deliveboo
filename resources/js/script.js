new Vue({
  el: '#app',
  data: {
    hambMenu: false,
    businessesToRender: [],
    businessesForType: [],
    allBusinesses: [],
    allTypes: [],
    showBusinessesToRender: true,
    query: '',
    cart: [],
    cartSaved: [],
    coupon: ['freedelivery', 'hambspecial'],
    couponCode: '',
    couponApplied: false,
    couponDiscount: 0.20,
    flagVerificaCoupon: false,
    preDiscountAmount: 0,
    amount: 0,
    amountSaved: 0,
    quantity: 0,
    displayOff: false
  },

  mounted() {
    setTimeout (this.preloadStop, 5000),

    this.couponApplied = false,
    this.flagVerificaCoupon = false,

    axios.get('http://localhost:8000/api/businesses')
    .then(resp => {
        this.businnessesForType = [];
        this.allBusinesses = resp.data;
        this.businessesToRender = this.allBusinesses;
    }),

    axios.get('http://localhost:8000/api/types')
    .then(resp => {
        this.allTypes = resp.data;
    }),

    this.cartSaved = JSON.parse(localStorage.getItem('cart'));
    this.amountSaved = localStorage.getItem('amount');
  },

  methods: {

    // Animazione pre-load homepage
    preloadStop (){
      this.displayOff = true;
    },

    // Visualizzazione Hamburger menu
    viewHambMenu () {
      this.hambMenu = !this.hambMenu;
    },

    // RICERCA: Filtro ristoranti per tipo (API)
    filterBusinessesByTypes (type) {
        axios.get('http://localhost:8000/api/type/' + type)
        .then(resp => {
            this.businessesForType = [];
            this.query = '';
            this.businessesForType = resp.data;
            this.showBusinessesToRender = false;
        })
    },

    // RICERCA: Filtro ristoranti per nome (API)
    filterBusinessesByName (query) {
        axios.get('http://localhost:8000/api/businesses/' + query )
        .then(resp => {
            this.businessesForType = [];
            this.businessesToRender = [];
            this.businessesToRender = resp.data;
            this.showBusinessesToRender = true;

            if(this.query === '') {
              this.businessesToRender = []
              this.businessesToRender = this.allBusinesses;
            }


        })
    },

    // RICERCA: Visualizzazione risultati per nome
    viewNamesResults () {
      return this.businessesForType.length === 0 && this.showBusinessesToRender;
    },

    // RICERCA: Visualizzazione risultati per tipo
    viewTypesResults () {
      return this.businessesForType.length > 0;
    },

    // RICERCA: Visualizzazione nessun risultato per categoria
    viewNoResultsType () {
      return this.businessesForType.length === 0 && !this.showBusinessesToRender;
    },

    // RICERCA: Visualizzazione nessun risultato per nome
    viewNoResultsName () {
      return this.businessesToRender.length === 0;
    },

    //RICERCA: scrolla la pagina alla sezione ristoranti in homepage
    scrollDown () {
        window.location.href = "#restaurants-row";
    },

    // CARRELLO: Aggiungi prodotto
    add (product_id, product_name, product_price) {
      let tot_price;

      for (let i = 0; i < this.cart.length; i++) {
        if (this.cart[i].id === product_id) {
          this.cart[i].quantity++;
          tot_price = product_price * this.cart[i].quantity;
          this.cart[i].price = tot_price.toFixed(2);
          this.getAmount();
          this.getQuantity();
          return; // la funzione si ferma qui, non aggiungendo l'id
        }
      }
      this.cart.push({
        'id' : product_id,
        'name' : product_name,
        'quantity' : 1,
        'price' : product_price
      });
      this.getAmount();
      this.getQuantity();
    },

    // CARRELLO: Rimuovi prodotto
    remove (product_id, product_price) {
      let tot_price;
      this.cart.forEach((item, i) => {
        if (item.id === product_id) {
          if(item.quantity === 1) {
            this.cart.splice(i, 1);
          } else {
            item.quantity--;
            tot_price = product_price;
            tot_price = item.price - product_price;
            item.price = tot_price.toFixed(2);
          }
        }
      });
      this.getAmount();
      this.getQuantity();
    },

    // CARRELLO: Calcola totale prezzo
    getQuantity() {
      let tot = 0;
      this.cart.forEach((item) => {
        tot += item.quantity;
      });
      this.quantity = tot;
    },

    //CARRELLO: Calcola e applica lo sconto al prezzo totale
    discountCoupon() {
        const alertCoupon = 'Inserire un codice valido';
        const alertCouponEmpty = 'Nessun codice inserito';
        const alertCartEmpty = 'Scegliere un prodotto';
        let lowerCoupon = this.couponCode.toLowerCase();
        let discountedAmount;
        let fixedDiscountedAmount;

        if(this.couponApplied) {
            return alert("Hai già utilizzato un coupon!");

        } else {
            discountedAmount = 0;
            fixedDiscountedAmount = 0;

            if(this.amount === 0) {
                    return this.couponCode = alertCartEmpty;
            } else if(this.couponCode === '' ) {
                    return this.couponCode = alertCouponEmpty;
            } else {
                for(let i = 0; i < this.coupon.length; i++) {
                    if(lowerCoupon === this.coupon[i]) {
                        discount = (this.amount * this.couponDiscount);
                        discountedAmount = this.amount - discount;
                        fixedDiscountedAmount = discountedAmount.toFixed(2);
                        this.flagVerificaCoupon = true;
                    }
                }
            }
        }

        if(!this.flagVerificaCoupon && this.couponCode.length > 0) {
            return this.couponCode = alertCoupon;
        } else {
            this.preDiscountAmount = this.amount;
            this.couponApplied = true;
            this.amount = fixedDiscountedAmount;
        }
    },

    // CARRELLO: Calcola totale quantità prodotti
    getAmount() {
      let sum = 0;
      this.cart.forEach((item) => {
        sum += parseFloat(item.price);
      });
      fixedSum = sum.toFixed(2);
      this.amount = fixedSum;
    },

    // CARRELLO: Salva in localStorage
    saveCart() {
      let cartJSON = JSON.stringify(this.cart);
      localStorage.setItem('cart', cartJSON);
      localStorage.setItem('amount', this.amount );
    }
  }
});

Vue.config.devtools = true
