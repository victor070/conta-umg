@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="{{ asset('assets\css\proveedores\index.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Proveedores</h2>&nbsp;<a href="{{ url('proveedores/new/') }}" class="btn btn-success" title="Agregar"><i class="fa-solid fa-plus"></i></a>  
    </div>
    <table id="bancostb" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Nit</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $pr)
            <tr>
                <td>{{ $pr->ProveedorID }}</td>
                <td>{{ $pr->Nombre }}</td>
                <td>{{ $pr->Direccion }}</td>
                <td>{{ $pr->Nit }}</td>
                <td>{{ $pr->CorreoElectronico }}</td>
                <td>{{ $pr->Telefono }}</td>
                <td><a href="{{ url('proveedores/edit/'.base64_encode($pr->ProveedorID)) }}" class="btn btn-warning"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
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

<script src="{{asset('assets/js/proveedores/index.js')}}"></script>

@endsection