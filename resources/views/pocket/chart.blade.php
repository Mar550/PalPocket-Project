@extends('layouts.app')

@section('content')
<div class="container">

    
    <div style="display:flex; flex-direction:row">
        <div class="dropdown" style="width:50px">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> Sort by   </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#"> Day</a></li>
                <li><a class="dropdown-item" href="#"> Month</a></li>
                <li><a class="dropdown-item" href="#"> Year</a></li>
            </ul>
        </div>
    </div>

<div> 
    <h2> Sort by </h2>
    <button onclick="showChart('daily')"> Day </button>
    <button onclick="showChart('monthly')"> Month </button>
    <button onclick="showChart('yearly')"> Year </button>
</div>

<canvas id="myChart" width="400" height="200"></canvas>


</div>

<!-- SCRIPT JS -->

<script>  
var month = <?php echo $month; ?>;
var income = <?php echo $dataincome; ?>;

var dataObjects = [
  {
    label: "Datasets 1",
    data: [2018, 2019, 2020, 2021, 2022]
  },
  {
    label: "Datasets 2",
    data: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
  },
  {
    label: "Datasets 3",
    data: [5,10,15,20,25,30]
  }
]
// data: dataObjects[0].data,

var jan = <?php echo $jan; ?>;
var feb = <?php echo $feb; ?>;
var mar = <?php echo $mar; ?>;
var apr = <?php echo $apr; ?>;
var may = <?php echo $may; ?>;
var jun = <?php echo $jun; ?>;
var jul = <?php echo $jul; ?>;
var aug = <?php echo $aug; ?>;
var sep = <?php echo $sep; ?>;
var oct = <?php echo $oct; ?>;
var nov = <?php echo $nov; ?>;
var dec = <?php echo $dec; ?>;
var dec = <?php echo $amountMonth; ?>;




const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: month,
        datasets: [{
            label: 'Incomes',
            data: [15, 14, 5, 4, 6, 10],
            backgroundColor:"transparent",
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        },{
            label: 'Expenses',
            data: [14, 12, 2, 7, 8, 5],
            backgroundColor:"transparent",
            borderColor: [
                '#7975FF'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function showChart(type){
        const dayslabel = [0,5,10,15,20,25,30];
        const monthslabel = ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'];
        const yearslabel = [2018, 2019, 2020, 2021, 2022, 2023];

        const dataday = [3,0,0,42,0,32,7,12,2,24,5,9,12,0,0,0,27,18,0,0,0,0,21]
        const datamonth = [4,12,21,45,32,43,6,43,21,34,21,14]
        const datayear = [4,12,21,45,32,43,6,43,21,34,21,14]

        if (type === 'monthly'){
            myChart.config.type = 'line';
            myChart.data.datasets[0].data = datamonth;
            myChart.data.labels = monthslabel;
        }

        if (type === 'daily'){
            myChart.data.datasets[0].data = dataday;
            myChart.data.labels = dayslabel;
            myChart.config.type = 'bar';
        }

        if (type === 'yearly'){
            myChart.config.type = 'line';
            myChart.data.datasets[0].data = datayear;
            myChart.data.labels = yearslabel;
        }

        myChart.update()
    }
</script>

   




@endsection


