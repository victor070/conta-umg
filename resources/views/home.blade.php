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
<script src="{{asset('assets/js/home.js')}}"></script>