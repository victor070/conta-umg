@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\bancos\edit.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Editar Banco</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='editbanc'>
        <div class="row">
            <input type="hidden" id="BancoID" value='{{ $banco[0]->BancoID }}'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Juan Smit" value='{{$banco[0]->Nombre}}' required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12"> 
                <div class="form-group">
                    <label>Saldo <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="3" maxlength="8"  class="form-control" id="SaldoCuentas" value='{{$banco[0]->Nit}}' required autofocus
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estatus <samp style='color:red'>*</samp></label>
                    <select class='form-select' id="Estatus" >
                        <option value="1" <?php echo ($banco[0]->Estatus == '1'?'selected':'') ?>>Activo</option>
                        <option value="0">Desactivado</option>
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
<script src="{{asset('assets/js/bancos/edit.js')}}"></script>

@endsection