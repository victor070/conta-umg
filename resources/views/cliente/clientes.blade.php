@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
@endsection

@section('content')
<div class="container-fluid">
    <h2>Clientes</h2><a href="{{ url('clientes/new/') }}" class="btn btn-success"
    title="Editar"><i class="fas fa-user"></i></a>  
    <table id="example" class="display" style="width:100%">
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
                        title="Editar"><i class="fas fa-user"></i></a></td>
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