@extends('layout.master')
@section('title')
   Compnay Data
@endsection
@section('content')

<div class="content">
    <div class="container">
        <table class="table" id="companyTable">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Open</th>
                <th scope="col">High</th>
                <th scope="col">Low</th>
                <th scope="col">Close</th>
                <th scope="col">Volume</th>
              </tr>
            </thead>
            <tbody>
                @foreach($prices as $price)
                <tr>
                    <td scope="row">{{ isset($price->date)? $price->date : '' }}</td>
                    <td scope="row">{{ isset($price->open)? $price->open : '' }}</td>
                    <td scope="row">{{ isset($price->high)? $price->high : '' }}</td>
                    <td scope="row">{{ isset($price->low)? $price->low : '' }}</td>
                    <td scope="row">{{ isset($price->low)? $price->low : '' }}</td>
                    <td scope="row">{{ isset($price->volume)? $price->volume : '' }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>

          <div id="chart-container">
            <canvas id="date-chart"></canvas>
        </div>


    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
    $('#companyTable').DataTable();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('date-chart').getContext('2d');
    var dateData = {
        labels: {!! json_encode($labels) !!},
        datasets: [
            {
                label: 'Open',
                data: {!! json_encode($openData) !!},
                borderColor: 'green',
                fill: false
            },
            {
                label: 'Close',
                data: {!! json_encode($closeData) !!},
                borderColor: 'red',
                fill: false
            }
        ]
    };

    var chartOptions = {
        scales: {
        }
    };

    var lineChart = new Chart(ctx, {
        type: 'line',
        data: dateData,
        options: chartOptions
    });
</script>

@endsection
