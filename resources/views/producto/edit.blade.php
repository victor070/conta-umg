@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\productos\edit.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Editar producto</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='edit'>
        <div class="row">
            <input type="hidden" id="ProductoID" value='{{ $producto[0]->ProductoID }}'>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Producto"
                        value='{{ $producto[0]->Nombre }}' required autofocus>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Codigo Producto <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="CodigoProducto" minlength="1" maxlength="8" value="{{ $producto[0]->CodigoProducto }}"
                        required>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Descripcion <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="DescripcionDetallada" value="{{ $producto[0]->DescripcionDetallada }}" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Precio Compra <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" maxlength="8" class="form-control" id="PrecioCompra"
                        value='{{ $producto[0]->PrecioCompra }}' required onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Precio Venta <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" maxlength="8" class="form-control" id="PrecioVenta"
                        value='{{ $producto[0]->PrecioVenta }}' required onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Impuestos<samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" maxlength="8" class="form-control"
                        id="ImpuestosAplicables" value='{{ $producto[0]->ImpuestosAplicables }}' required
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Proveedores<samp style='color:red'>*</samp></label>
                    <select class='form-select' id="ProveedorID">
                        @foreach($proveedores as $pv)
                        <option value="{{ $pv->ProveedorID }}"
                            <?php echo ($producto[0]->ProveedorID == $pv->ProveedorID?'selected':'') ?>>
                            {{ $pv->Nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Stock Minimo<samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" class="form-control" id="StockMinimo" value='{{ $producto[0]->StockMinimo }}' required
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>StockMaximo<samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="1" class="form-control" id="StockMaximo" value='{{ $producto[0]->StockMaximo }}' required
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estatus <samp style='color:red'>*</samp></label>
                    <select class='form-select' id="Estatus">
                        <option value="1" <?php echo ($producto[0]->Estatus == '1'?'selected':'') ?>>Activo</option>
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
<script src="{{asset('assets/js/productos/edit.js')}}"></script>

@endsection