new Vue({
  el: '#cart',

  data: {
    cart: [],
  },

  methods: {

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
    }
  }
})
