<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/00-ico.png">
  </head>
  <body>

    <script>
    let orders ={!! $orders !!};

    let values = {
        "01": {
            orders: 25,
            amount: 980,
            month: "Gennaio",
        },
        "02": {
            orders: 42,
            amount: 1929,
            month: "Febbraio",
        },
        "03": {
            orders: 38,
            amount: 1342,
            month: "Marzo",
        },
        "04": {
            orders: 15,
            amount: 754,
            month: "Aprile",
        },
    }
        orders.forEach(order => {
            values[order.created_at.slice(5,7)].orders += 1;
            values[order.created_at.slice(5,7)].amount += order.amount;
        });

        let myOrders = [];
        let myAmounts = [];
        let myMonths = [];
        for (let key in values) {
            myOrders.push(values[key].orders);
            myAmounts.push(values[key].amount);
            myMonths.push(values[key].month);
        }
    </script>


        <div>
            <canvas id="myChart" width="100" height="75"></canvas>
        </div>


    <script>
        let container = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(container, {
        type: 'bar', // set the kind of chart
        data: {
            labels: [...myMonths],
            datasets: [
              // first graph
              {
                label: 'Ordini', // legend
                data: [...myOrders], // the y value adapt automatically to contain all the values in the array
                fill: false, // fil color under the graph
                backgroundColor: 'white', // color of the graph under the line
                borderColor: '#00BE43', // graph line color
                borderWidth: 1.5, // width of the graph line
                tension: 0.1, // roundness of the graph line
            },
              // second graph
            {
                label: 'Incasso (euro)', // legend
                data: [...myAmounts],
                fill: false,
                backgroundColor: '#00BE43', // color of the graph under the line
                borderColor: 'white',
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

  </body>
</html>
