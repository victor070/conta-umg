@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\productos\new.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Nuevo Producto</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='new'>
        <div class="row">

            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Proveedores" value='' required
                        autofocus>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Codigo Producto <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="CodigoProducto" inlength="3" maxlength="8" value=""
                        required>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Descripcion <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="DescripcionDetallada" value="" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Precio Compra <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" maxlength="8" class="form-control" id="PrecioCompra"
                        value='' required onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Precio Venta <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" maxlength="8" class="form-control" id="PrecioVenta"
                        value='' required onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Impuestos<samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" maxlength="8" class="form-control"
                        id="ImpuestosAplicables" value='' required
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Proveedores<samp style='color:red'>*</samp></label>
                    <select class='form-select' id="ProveedorID">
                        @foreach($proveedores as $pv)
                        <option value="{{ $pv->ProveedorID }}">{{ $pv->Nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Stock Minimo<samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" class="form-control" id="StockMinimo" value='' required
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>StockMaximo<samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" class="form-control" id="StockMaximo" value='' required
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
<script src="{{asset('assets/js/proveedores/new.js')}}"></script>

@endsection