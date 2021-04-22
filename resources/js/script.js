new Vue({
  el: '#app',
  data: {
    businessesToRender: [],
    businessesForType: [],
    allBusinesses: [],
    allTypes: [],
    showBusinessesToRender: true,
    query: '',
    cart: [],
    cartSaved: [],
    amount: 0
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
    this.amount = localStorage.getItem('amount');
  },

  methods: {
    filterBusinessesByTypes: function(type) {
        axios.get('http://localhost:8000/api/type/' + type)
        .then(resp => {
            console.log(resp.data);
            this.businessesForType = [];
            this.businessesForType = resp.data;
            this.showBusinessesToRender = false;
        })
    },

    filterBusinessesByName: function(query) {
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

    add (product_id, product_name, product_price) {

      let tot_price = product_price;

      for (let i = 0; i < this.cart.length; i++) {
        if (this.cart[i].id === product_id) {
          this.cart[i].quantity++;
          tot_price += product_price;
          this.cart[i].price = tot_price.toFixed(2);
          return; // la funzione si ferma qui, non aggiungendo l'id
        }
      }

      this.cart.push({
        'id' : product_id,
        'name' : product_name,
        'quantity' : 1,
        'price' : tot_price
      });
    },

    remove (product_id) {
      for (let i = 0; i < this.cart.length; i++) {
        if (this.cart[i].id === product_id) {
          this.cart.splice(i, 1);
        }
      }
    },

    quantityUp (product_id, product_price) {
      this.cart.forEach((item) => {
        if (item.id === product_id) {
          item.quantity++;
          item.price += product_price;
        }
      });
    },

    quantintyDown (product_id, product_price) {
      this.cart.forEach((item) => {
        if (item.id === product_id) {
          if(item.quantity === 1) {
            this.remove(product_id);
          } else {
            item.quantity--;
            item.price = item.price - product_price;
          }
        }
      });
    },

    getAmount () {
      let sum = 0;
      this.cart.forEach((item) => {
        sum += item.price;
      });
      this.amount = sum.toFixed(2);
      return this.amount;
    },

    saveCart() {
      let cartJSON = JSON.stringify(this.cart);
      localStorage.setItem('cart', cartJSON);
      localStorage.setItem('amount', this.amount );
    }
  }
});

Vue.config.devtools = true
