<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js"></script>


<script>
const orders ={!! $orders !!};
let result = {
    "01": {
        totalOrders: 15,
        money: 55.5,
        monthName: "Gennaio",
    },
    "02": {
        totalOrders: 50,
        money: 70,
        monthName: "Febbraio",
    },
    "03": {
        totalOrders: 35,
        money: 90,
        monthName: "Marzo",
    },
    "04": {
        totalOrders: 0,
        money: 0,
        monthName: "Aprile",
    },
}
    orders.forEach(order => {
        result[order.created_at.slice(5,7)].totalOrders += 1;
        result[order.created_at.slice(5,7)].money += order.amount;
    });
    console.log(result)
    const orderValues = []; // restaurant's order, from the api
    const moneyValues = []; // restaurant's money gained, from the api
    const monthValues = []; // months
    for (let key in result) {
        orderValues.push(result[key].totalOrders);
        moneyValues.push(result[key].money);
        monthValues.push(result[key].monthName);
    }
</script>


    <div>
        <canvas id="myChart" width="100" height="75"></canvas>
    </div>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar', // set the kind of chart
    data: {
        labels: [...monthValues],
        datasets: [
          // first graph
          {
            label: 'Numero ordini', // legend
            data: [...orderValues], // the y value adapt automatically to contain all the values in the array
            fill: false, // fil color under the graph
            backgroundColor: '#71bed1', // color of the graph under the line
            borderColor: '#71bed1', // graph line color
            borderWidth: 1.5, // width of the graph line
            tension: 0.1, // roundness of the graph line
        },
          // second graph
        {
            label: 'Totale incasso in euro', // legend
            data: [...moneyValues],
            fill: false,
            backgroundColor: '#ff6e54', // color of the graph under the line
            borderColor: '#ff6e54',
            borderWidth: 1.5,
            tension: 0.1,
        }
                  ]
    },
    options: {
        scales: {
            x: {
                beginAtZero: true,
                ticks: {
                    color: 'white',
                    maxRotation: 90,
                    minRotation: 45
                },
            },
             y: {
                beginAtZero: true,
                ticks: {
                    color: 'white',
                },
            }
        }
    }
});
</script>
