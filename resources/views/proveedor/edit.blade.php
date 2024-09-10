@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets\css\proveedores\edit.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Editar Proveedor</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='edit'>
        <div class="row">
            <input type="hidden" id="ProveedorID" value='{{ $proveedor[0]->ProveedorID }}'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nombre <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Proveedores" value='{{ $proveedor[0]->Nombre }}' required
                        autofocus>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Direccion <samp style='color:red'>*</samp></label>
                    <input type="text" class="form-control" id="Direccion" value="{{ $proveedor[0]->Direccion }}" required>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12"> 
                <div class="form-group">
                    <label>Nit <samp style='color:red'>*</samp></label>
                    <input type="number" min='0' minlength="3" maxlength="8"  class="form-control" id="Nit" value='{{ $proveedor[0]->Nit }}' required 
                        onkeydown="if(event.key==='.'){event.preventDefault();}"
                        oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Correo Electronico <samp style='color:red'>*</samp></label>
                    <input type="email" class="form-control" id="CorreoElectronico" value='{{ $proveedor[0]->CorreoElectronico }}' required >
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Telefono <samp style='color:red'>*</samp></label>
                    <input type="tel" minlength="3" maxlength="8" class="form-control" id="Telefono" value='{{ $proveedor[0]->Telefono }}' required >
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estatus <samp style='color:red'>*</samp></label>
                    <select class='form-select' id="Estatus" >
                        <option value="1" <?php echo ($proveedor[0]->Estatus == '1'?'selected':'') ?>>Activo</option>
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
<script src="{{asset('assets/js/proveedores/edit.js')}}"></script>

@endsection