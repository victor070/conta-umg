@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\proveedores\new.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Nuevo Proveedor</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='new'>
        <div class="row">

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Proveedores" value='' required
                        autofocus>
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
                    <input type="number" min='0' minlength="3" maxlength="8"  class="form-control" id="Nit" value='' required 
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Correo Electronico <samp style='color:red'>*</samp></label>
                    <input type="email" class="form-control" id="CorreoElectronico" value='' required >
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Telefono <samp style='color:red'>*</samp></label>
                    <input type="tel" minlength="3" maxlength="8" class="form-control" id="Telefono" value='' required >
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
<script src="{{asset('assets/js/proveedores/new.js')}}"></script>

@endsection