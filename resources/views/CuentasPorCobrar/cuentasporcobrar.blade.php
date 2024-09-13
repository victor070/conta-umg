@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="{{ asset('assets\css\cuentasporcobrar\index.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Cuentas por cobrar</h2>&nbsp;<a href="{{ url('cuentasporcobrar/new/') }}" class="btn btn-success" title="Agregar"><i class="fa-solid fa-plus"></i></a>  
    </div>
    <table id="cuentasporcobrartb" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente ID</th>
                <th>Saldo Pendiente</th>
                <th>Fecha Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cuentasporcobrar as $cpc)
            <tr>
                <td>{{ $cpc->CuentaPorCobrarID }}</td>
                <td>{{ $cpc->ClienteID }}</td>
                <td>{{ number_format($cpc->SaldoPendiente, 2, '.', ',') }}</td>
                <td>{{ \Carbon\Carbon::parse($cpc->FechaVencimiento)->format('d-m-Y') }}</td>
                <td><a href="{{ url('cuentasporcobrar/edit/'.base64_encode($cpc->CuentaPorCobrarID)) }}" class="btn btn-warning"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Cliente ID</th>
                <th>Saldo Pendiente</th>
                <th>Fecha Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('fin')
@parent
<!-- js -->
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>

<script src="{{asset('assets/js/cuentasporcobrar/index.js')}}"></script>

@endsection