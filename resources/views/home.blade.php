@extends('layouts.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <h2>Dashboard</h2>
        <div class="col-6">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let ctx = $("#mychart");
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
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
<!-- <script src="{{asset('assets/js/home.js')}}"></script> -->