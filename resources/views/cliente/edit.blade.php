@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\clientes\edit.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Editar Cliente</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='editclient'>
        <div class="row">
            <input type="hidden" id="ClienteID" value='{{ $cliente[0]->ClienteID }}'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Juan Smit" value='{{$cliente[0]->Nombre}}' required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Direccion <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Direccion" value="{{$cliente[0]->Direccion}}" required>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12"> 
                <div class="form-group">
                    <label>Nit <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="3" maxlength="8"  class="form-control" id="Nit" value='{{$cliente[0]->Nit}}' required autofocus
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Correo Electronico <samp style='color:red'>*</samp></label>
                    <input type="email" min='1' class="form-control" id="CorreoElectronico" value='{{$cliente[0]->CorreoElectronico}}' required >
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Telefono <samp style='color:red'>*</samp></label>
                    <input type="tel" minlength="3" maxlength="8" class="form-control" id="Telefono" value='{{$cliente[0]->Telefono}}' required >
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estatus <samp style='color:red'>*</samp></label>
                    <select id="Estatus">
                        <option value="1" <?php echo ($cliente[0]->Estatus == '1'?'selected':'') ?>>Activo</option>
                        <option value="0">Activo</option>
                    </select>
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
<script src="{{asset('assets/js/clientes/new.js')}}"></script>

@endsection