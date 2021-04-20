const app = new Vue({
    el: '#app',
    data: {
        businesses: [],
        businessesForType: [],
        query: '',
        types: [],
        cart: []
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
        })


            if(localStorage.getItem('cart')) {
            try {
            this.cart = JSON.parse(localStorage.getItem('cart'));
            } catch(e) {
            localStorage.removeItem('cart');
        }
        }
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
            for (let i = 0; i < this.cart.length; i++) {
              if (this.cart[i].id === product_id) {
                this.cart[i].quantity++;
                this.cart[i].price += product_price;
                return; // la funzione si ferma qui, non aggiungendo l'id
              }
            }
            this.cart.push({
              'id' : product_id,
              'name' : product_name,
              'quantity' : 1,
              'price' : product_price
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

          amount () {
            let sum = 0;
            this.cart.forEach((item) => {
              sum += item.price;
            });
            return sum;
        },

        saveCart() {
            let cartJSON = JSON.stringify(this.cart);
            localStorage.setItem('cart', cartJSON);
        },

    }
});

Vue.config.devtools = true
