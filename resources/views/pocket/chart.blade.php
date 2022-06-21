@extends('layouts.app')

@section('content')

{{ $income }}

<div>
    <p> Titre</p>
</div>

<div id="chart" style="height: 500px;"></div>
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

<script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
        hooks: new ChartisanHooks()
            .title('Financial chart')
            .legend(true)
            .datasets('line','line')
      });

</script>

@endsection
