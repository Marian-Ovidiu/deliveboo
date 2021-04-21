
  var app = new Vue(
      {
        el: "#app",
        data: {
            cartSaved: [],
        },
        mounted: function() {
          this.cartSaved = JSON.parse(localStorage.getItem('cart'));

        //   setInterval(function(){
        //     document.getElementById('amount').type = 'hidden';
        //     document.getElementById('amount').value = parseFloat(localStorage.getItem('tot_price')).toFixed(2);
        //     document.getElementById('plates').type = 'hidden';
        //     document.getElementById('plates').value = localStorage.getItem('plates');
        //     document.getElementById('restaurant_id').type = 'hidden';
        //     document.getElementById('restaurant_id').value = localStorage.getItem('restaurant_id');
        //   }, 100);
        }
  })
