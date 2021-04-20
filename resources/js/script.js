const app = new Vue({
    el: '#app',
    data: {
        businesses: [],
        businessesForType: [],
        query: '',
        types: []
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
    }
});

Vue.config.devtools = true
