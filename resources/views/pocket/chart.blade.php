@extends('layouts.app')

@section('content')

{{ $income }}
<br>
{{ $expense }}
<br>
{{ $yearsInc }}
<br>
<br>
{{ $incomeYears }}
<br>
<br>
{{ $incomeMonths }}
<br>
<br>
{{ $incomeDays }}
<br>
<br>

<div id="chart" style="height: 500px;"></div>
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

<script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
        hooks: new ChartisanHooks()
            .title('Financial chart')
            .legend(true)
            .datasets(['line','line'])

      });

</script>

@endsection
