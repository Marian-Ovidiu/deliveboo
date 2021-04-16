const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        categories: [],
        foods: [],
        cart: [],
        statsFood: [],
        statsOrder: [],
        selectedYear:'',
        chartMonth:{
            statsLabel: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
            statsData: []
        },
        chartYear:{
            statsLabel: [],
            statsData: []
        },
        activeCategory: [],
        searchByName: '',
        totalPrice: 0
    },
    mounted() {

        axios
            .get('http://localhost:8000/api/restaurant')
            .then(r => {
                this.restaurants = r.data.data.restaurants;
                this.categories = r.data.data.categories;
            })
        axios
            .get('http://localhost:8000/api/food')
            .then(result => {
                this.foods = result.data.data.food;
            });

        axios
            .get('http://localhost:8000/api/statistics')
            .then(result => {
                this.statsFood = result.data.data.food;
                this.statsOrder = result.data.data.order;


                // GRAFICO ANNI

                this.statsOrder.forEach((order) => {
                    if(!this.chartYear.statsLabel.includes(order.delivery_time.substring(0,4))){
                        this.chartYear.statsLabel.push(order.delivery_time.substring(0,4));
                    }
                });
                this.chartYear.statsLabel.sort();
                this.chartYear.statsLabel.forEach((year) => {
                     let count = 0;
                    this.statsOrder.forEach((order) => {
                        if(order.delivery_time.substring(0,4) == year){
                        count++;
                        }
                    });
                    this.chartYear.statsData.push(count);
                });

                new Chart(document.getElementById("chartYear"),{
                    type: 'bar',
                    responsive: true,
                    data: {
                    labels: this.chartYear.statsLabel,
                    datasets: [
                        {
                        label: "Ordini",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#e8c3b9","#c45850"],
                        data: this.chartYear.statsData
                        }
                    ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    suggestedMax: 10,
                                }
                            }]
                        },
                        title:{
                            display:true,
                            text:'Ordini per anno',
                            fontSize:20
                        }
                    }
                    });



                });

                if (localStorage.getItem('cart')) {
                      this.cart = JSON.parse(localStorage.getItem('cart'));
                      this.totalPrice = localStorage.getItem('total');

                    };

    },
    methods: {
        selectCategory(element){
            if(!this.activeCategory.includes(element)){
                this.activeCategory.push(element);
            }else{
                this.activeCategory.splice(this.activeCategory.indexOf(element), 1)
            }
        },
        goto(refName) {
            var element = this.$refs[refName];
            console.log(element);
            var top = element.offsetTop;
            window.scrollTo(0, (top - 70));
        },
        gotocart(){
          let cartPosition = this.$refs.cart;
          cartPosition.scrollIntoView();
        },
        filterRestaurant(){
            if(this.activeCategory.length == 0){
                return this.restaurants;
            } else {
                return this.restaurants.filter(restaurant => this.activeCategory.every(v => restaurant.category_id.includes(v)));
            }
        },
        filterByName(){
            if(this.searchByName == ''){
                return this.filterRestaurant();
            }else{
                return this.restaurants.filter(restaurant => restaurant.name_restaurant.toLowerCase().includes(this.searchByName.toLowerCase()));
            }
        },
        saveCart() {
          const parsed = JSON.stringify(this.cart);
          localStorage.setItem('cart', parsed);
        },
        addToCart(element){
            this.foods.forEach(food => {
                if(food.id == element){
                  if((this.cart.length > 0) && (food.restaurant_id !== this.cart[0].restaurant_id)){
                    // alert('Puoi ordinare da un ristorante alla volta. Svuota il carrello');
                  }else{
                    if(this.cart.includes(food)){
                      ++food.quantity;
                      this.saveCart();
                    }else{
                      food.quantity = 1;
                      this.cart.push(food);
                      this.saveCart();
                    }
                  }

                }
            })
        },
        removeFromCart(index){
            this.cart.splice(index, 1);
            this.saveCart();
        },
        emptyCart(){
            this.cart = [];
            this.saveCart();
        },
        refreshTotal(){
            this.totalPrice = 0;
            this.cart.forEach(food => {
                food.totalPrice = food.quantity*food.price;
                this.totalPrice += food.totalPrice;
            })
            this.totalPrice = (Math.round(this.totalPrice * 100) / 100).toFixed(2);
            let totalPriceSave = this.totalPrice;
            localStorage.setItem('total', totalPriceSave);
        },
        refreshGraphicYear(){
            this.chartMonth.statsData = [];
            for(let i = 1; i <= 12; i++){
                let count = 0;
                this.statsOrder.forEach((order) => {
                    if((order.delivery_time.substring(0,4) ==  this.selectedYear) && (order.delivery_time.substring(5,7) == i)){
                        count++;
                    }
                });
                this.chartMonth.statsData.push(count);
            }
            let ChartName = 'chartMonth' + this.selectedYear;
            new Chart(document.getElementById(ChartName),{
                type: 'bar',
                responsive: true,
                data: {
                    labels: this.chartMonth.statsLabel,
                    datasets: [
                        {
                            label: "Ordini",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#e8c3b9","#c45850"],
                            data: this.chartMonth.statsData
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                suggestedMax: 10,
                            }
                        }]
                    },
                    title:{
                        display:true,
                        text:'Ordini per mese',
                        fontSize:20
                    }
                }
            });
        }
    }
});
