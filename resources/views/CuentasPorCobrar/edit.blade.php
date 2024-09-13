@extends('layouts.index')
@section('header')

<link rel="stylesheet" href="{{ asset('assets/css/cuentasporcobrar/edit.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Editar Cuenta por Cobrar</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id='editCuentaPorCobrar'>
        @csrf <!-- Token de seguridad para formularios -->
        <div class="row">
            <input type="hidden" id="CuentaPorCobrarID" value='{{ $cuentaPorCobrar[0]->CuentaPorCobrarID }}'>
            
            <!-- Seleccionar Cliente -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Cliente <samp style='color:red'>*</samp></label>
                    <select class='form-select' id="ClienteID">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->ClienteID }}" {{ $cliente->ClienteID == $cuentaPorCobrar[0]->ClienteID ? 'selected' : '' }}>
                                {{ $cliente->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Campo de Saldo Pendiente -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Saldo Pendiente <samp style='color:red'>*</samp></label>
                    <input type="number" step="0.01" class="form-control" id="SaldoPendiente" value="{{$cuentaPorCobrar[0]->SaldoPendiente}}" required>
                </div>
            </div>

            <!-- Campo de Fecha de Vencimiento -->
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Vencimiento <samp style='color:red'>*</samp></label>
                    <input type="date" class="form-control" id="FechaVencimiento" value="{{ $cuentaPorCobrar[0]->FechaVencimiento }}" required>
                </div>
            </div>

            <!-- Selección de Estatus -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estatus <samp style='color:red'>*</samp></label>
                    <select class='form-select' id="Estatus">
                        <option value="1" {{ $cuentaPorCobrar[0]->Estatus == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $cuentaPorCobrar[0]->Estatus == '0' ? 'selected' : '' }}>Desactivado</option>
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
<script src="{{ asset('assets/js/cuentasporcobrar/edit.js') }}"></script>
@endsection
