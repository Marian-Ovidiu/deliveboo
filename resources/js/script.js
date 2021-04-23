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
    amount: 0,
    amountSaved: 0,
    quantity: 0
  },

  mounted() {
    axios.get('http://localhost:8000/api/businesses')
    .then(resp => {
        this.businnessesForType = [];
        this.allBusinesses = resp.data.data.businesses;
        this.businessesToRender = this.allBusinesses;
    }),

    axios.get('http://localhost:8000/api/types')
    .then(resp => {
        this.allTypes = resp.data.data.types;
    }),

    this.cartSaved = JSON.parse(localStorage.getItem('cart'));
    this.amountSaved = localStorage.getItem('amount');
  },

  methods: {

    // Visualizzazione Hamburger menu
    viewHambMenu () {
      this.hambMenu = !this.hambMenu;
    },

    // RICERCA: Filtro ristoranti per tipo (API)
    filterBusinessesByTypes (type) {
        axios.get('http://localhost:8000/api/type/' + type)
        .then(resp => {
            console.log(resp.data);
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
            this.showBusinessesToRender = true;

            if(this.query === '') {
                this.businessesToRender = this.allBusinesses;
            } else {
                this.businessesToRender = resp.data;
            }
        })
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
