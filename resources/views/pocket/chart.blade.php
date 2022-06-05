@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1> Chart Page </h1>
        <p> {{$dataincome}} </p>
        <p> {{$dataexpense}} </p>
        <p> {{$selectmonth}} </p>
        <p> {{$expdate}} </p>
        <p> {{$montanttotal}} </p>
        <p> {{$may}} </p>


    </div>
    
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
        <button onClick="showChart('daily')"> Day </button>
        <button onClick="showChart('monthly')"> Month </button>
        <button onClick="showChart('yearly')"> Year </button>
    </div>
<div> 
<canvas id="myChart" width="400" height="200"></canvas>
</div>

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
            data: [jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec],
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
</script>

   
</div>

<script>

    var month = <?php echo $month; ?>;
    var income = <?php echo $dataincome; ?>;
    var chartData = {
        labels: month,
        datasets: [{
            label:'Income',
            backgroundColor:"Yellow",
            data: amountMonth
        }]
    }

    window.onload = function showChart(type) {
        if(type === 'monthly') {
            var ctx= document.getElementById("canvas").getContect("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data:chartData,
                options: {
                    responsive:true,
                    title: {
                        display:true,
                        text: " Income per month"
                    }
                }
            })
        }
        if(type === 'daily') {
            var ctx= document.getElementById("canvas").getContect("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data:chartData,
                options: {
                    responsive:true,
                    title: {
                        display:true,
                        text: " Income per day"
                    }
                }
            })
        }
    }

</script>

@endsection


