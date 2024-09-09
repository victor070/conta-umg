@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\bancos\new.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Nuevo Banco</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='newbanc'>
        <div class="row">

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Banco Industrial" value='' required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12"> 
                <div class="form-group">
                    <label>Saldo <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="3" maxlength="8"  class="form-control" id="SaldosCuentas" value='' required autofocus
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
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
<script src="{{asset('assets/js/bancos/new.js')}}"></script>

@endsection