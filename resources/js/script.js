new Vue({
  el: '#app',
  data: {
    businesses: [],
    businessesForType: [],
    query: '',
    types: [],
    cart: [],
    cartSaved: [],
    amount: 0,
    amountSaved: 0
  },
  mounted() {
    axios.get('http://localhost:8000/api/businesses', {
      // params: {
      //     query: this.searchByType
      // }
    })
    .then(resp => {
      this.businesses = resp.data.data.businesses
    })
    // .catch(err => {
    //     console.log(err);
    // })
    axios.get('http://localhost:8000/api/types', {

    })
    .then(resp => {
      this.types = resp.data.data.types
    }),

    this.cartSaved = JSON.parse(localStorage.getItem('cart'));
    this.amountSaved = localStorage.getItem('amount');
  },

  methods: {
    filterBusinessesByTypes: function(type) {
      axios.get('http://localhost:8000/api/type/' + type, {

      })
      .then(resp => {
        console.log(resp.data);
        this.businessesForType = [];
        this.businessesForType = resp.data;
      })
    },

    emptyBussinessesForType: function() {
      return this.businessesForType = [];
    },

    searchFunction: function(variabile) {
      let flag = false;
      flag = variabile.toLowerCase().startsWith(this.query.toLowerCase())
      if(flag && this.businessesForType.length === 0) {
        return true;
      }
    },

    add (product_id, product_name, product_price) {
      let tot_price;
      for (let i = 0; i < this.cart.length; i++) {
        if (this.cart[i].id === product_id) {
          this.cart[i].quantity++;
          tot_price = product_price * this.cart[i].quantity;
          this.cart[i].price = tot_price.toFixed(2);
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
    },

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
    },

    getAmount() {
      let sum = 0;
      this.cart.forEach((item) => {
        sum += item.price;
      });
      this.amount = sum;
    },

    saveCart() {
      let cartJSON = JSON.stringify(this.cart);
      localStorage.setItem('cart', cartJSON);
      localStorage.setItem('amount', this.amount );
    }
  }
});

Vue.config.devtools = true
