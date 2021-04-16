const app = new Vue({
    el: '#app',
    data: {
        businesses: [],
        types: [],
        products: []
    },
    mounted() {
        axios
            .get('http://localhost:8000/api/businesses')
            .then((resp) => {
                this.businesses = resp.data.businesses
                this.categories = resp.data.types
            })
            console.log(this.businesses)
    },
    methods: {

    }
});

Vue.config.devtools = true
