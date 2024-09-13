@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="{{ asset('assets\css\cuentasporcobrar\new.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Nueva Cuenta por Cobrar</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='newaccount'>
        @csrf
        <div class="row">
            <!-- Campo para ClienteID -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Cliente ID <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="ClienteID" placeholder="ID del Cliente" value='' required>
                </div>
            </div>

            <!-- Campo para Saldo Pendiente -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Saldo Pendiente <samp style='color:red'>*</samp></label>
                    <input type="number" step="0.01" min="0" class="form-control" id="SaldoPendiente" placeholder="Saldo Pendiente" value='' required>
                </div>
            </div>

            <!-- Campo para Fecha de Vencimiento -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Vencimiento <samp style='color:red'>*</samp></label>
                    <input type="date" class="form-control" id="FechaVencimiento" value='' required>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

@section('fin')
@parent
<!-- js -->
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="{{asset('assets/js/cuentasporcobrar/new.js')}}"></script>
@endsection
