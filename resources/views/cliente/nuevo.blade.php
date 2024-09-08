@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\clientes\new.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Nuevo Cliente</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='newclient'>
        <div class="row">

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Juan Smit" value='' required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Direccion <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Direccion" value="" required>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12"> 
                <div class="form-group">
                    <label>Nit <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="3" maxlength="8"  class="form-control" id="Nit" value='' required autofocus
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Correo Electronico <samp style='color:red'>*</samp></label>
                    <input type="email" min='1' class="form-control" id="CorreoElectronico" value='' required >
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Telefono <samp style='color:red'>*</samp></label>
                    <input type="tel" min='1' class="form-control" id="Telefono" value='' required >
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

@section('fin')
@parent
<!-- js -->

<script src="{{asset('assets/js/clientes/new.js')}}"></script>

@endsection