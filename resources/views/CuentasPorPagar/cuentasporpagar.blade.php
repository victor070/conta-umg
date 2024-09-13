@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="{{ asset('assets\css\cuentasporpagar\index.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Cuentas por pagar</h2>&nbsp;<a href="{{ url('cuentasporpagar/new/') }}" class="btn btn-success" title="Agregar"><i class="fa-solid fa-plus"></i></a>  
    </div>
    <table id="cuentasporpagartb" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor ID</th>
                <th>Saldo Pendiente</th>
                <th>Fecha Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cuentasporpagar as $cpp)
            <tr>
                <td>{{ $cpp->CuentaPorPagarID }}</td>
                <td>{{ $cpp->ProveedorID }}</td>
                <td>{{ number_format($cpp->SaldoPendiente, 2, '.', ',') }}</td>
                <td>{{ \Carbon\Carbon::parse($cpp->FechaVencimiento)->format('d-m-Y') }}</td>
                <td><a href="{{ url('cuentasporpagar/edit/'.base64_encode($cpp->CuentaPorPagarID)) }}" class="btn btn-warning"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Proveedor ID</th>
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

<script src="{{asset('assets/js/cuentasporpagar/index.js')}}"></script>

@endsection
