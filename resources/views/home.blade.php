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
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/home.js')}}"></script>