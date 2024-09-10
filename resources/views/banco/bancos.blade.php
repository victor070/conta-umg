@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="{{ asset('assets\css\bancos\index.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Bancos</h2>&nbsp;<a href="{{ url('bancos/new/') }}" class="btn btn-success" title="Agregar"><i class="fa-solid fa-plus"></i></a>  
    </div>
    <table id="bancostb" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bancos as $bn)
            <tr>
                <td>{{ $bn->BancoID }}</td>
                <td>{{ $bn->Nombre }}</td>
                <td>{{ $bn->SaldosCuentas }}</td>
                <td><a href="{{ url('bancos/edit/'.base64_encode($bn->BancoID)) }}" class="btn btn-warning"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Saldo</th>
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

<script src="{{asset('assets/js/bancos/index.js')}}"></script>

@endsection