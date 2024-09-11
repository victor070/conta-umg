@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="{{ asset('assets\css\productos\index.css') }}">
@endsection

<div class="container-fluid">
    @section('content')
    <div class="title">
        <h2>Productos</h2>&nbsp;<a href="{{ url('productos/new/') }}" class="btn btn-success" title="Agregar"><i
                class="fa-solid fa-plus"></i></a>
    </div>
    <table id="bancostb" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Impuestos</th>
                <th>Proveedor</th>
                <th>Stock Minimo</th>
                <th>Stock Maximop</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $pr)
            <tr>
                <td>{{ $pr->ProductoID }}</td>
                <td>{{ $pr->Nombre }}</td>
                <td>{{ $pr->CodigoProducto }}</td>
                <td>{{ $pr->DescripcionDetallada }}</td>
                <td>{{ $pr->PrecioCompra }}</td>
                <td>{{ $pr->PrecioVenta }}</td>
                <td>{{ $pr->ImpuestosAplicables }}</td>
                <td>{{ $pr->Proveedor }}</td>
                <td>{{ $pr->StockMinimo }}</td>
                <td>{{ $pr->StockMaximo }}</td>
                <td><a href="{{ url('productos/edit/'.base64_encode($pr->ProductoID)) }}" class="btn btn-warning"
                        title="Editar"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Impuestos</th>
                <th>Proveedor</th>
                <th>Stock Minimo</th>
                <th>Stock Maximop</th>
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

<script src="{{asset('assets/js/productos/index.js')}}"></script>

@endsection