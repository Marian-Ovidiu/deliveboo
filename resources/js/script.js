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

        setCookie(name, value, days) {
            let expires = "";
            if (days) {
                let date = new Date();
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        },

        localStorage() {
            window.localStorage.setItem("Cart", JSON.stringify(this.orderCart));
            window.localStorage.setItem("cartTotalPrice", this.totalPrice);
            let myItem = localStorage.getItem("Cart");
            this.setCookie("cookieCart", myItem, 7);
        }
    }
});

Vue.config.devtools = true
