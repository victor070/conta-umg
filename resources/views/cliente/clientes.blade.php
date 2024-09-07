@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="{{ asset('assets\css\clientes\index.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Clientes</h2>&nbsp;<a href="{{ url('clientes/new/') }}" class="btn btn-success" title="Agregar"><i class="fa-solid fa-plus"></i></a>  
    </div>
    <table id="clientestb" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Nit</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cts)
            <tr>
                <td>{{ $cts->ClienteID }}</td>
                <td>{{ $cts->Nombre }}</td>
                <td>{{ $cts->Direccion }}</td>
                <td>{{ $cts->Nit }}</td>
                <td>{{ $cts->CorreoElectronico }}</td>
                <td>{{ $cts->Telefono }}</td>
                <td><a href="{{ url('clientes/edit/'.base64_encode($cts->ClienteID)) }}" class="btn btn-warning"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Nit</th>
                <th>Correo</th>
                <th>Telefono</th>
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

<script src="{{asset('assets/js/clientes/index.js')}}"></script>

@endsection