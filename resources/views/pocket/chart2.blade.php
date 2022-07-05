@extends('layouts.app')

@section('content')

<p> Chart with JsChart </p> 

{{ json_encode($data) }}

<canvas id="myChart" width="400" height="400"></canvas>
<script>

var dates = <?php echo(json_encode($daterange)); ?>

let amounts = <?php echo(json_encode($data)); ?>

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dates,
        datasets: [{
            label: 'Income',
            data: amounts,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        layout: {
            padding: 50
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>



@endsection
