<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'Producto';
    protected $primaryKey = 'ProductoID';

    public $timestamps =false;

    protected $fillable = [
        'ProductoID',
        'CodigoProducto',
        'Nombre',
        'DescripcionDetallada',
        'PrecioCompra',
        'PrecioVenta',
        'ImpuestosAplicables',
        'ProveedorID',
        'StockMinimo',
        'StockMaximo',
        'Estatus'
    ];
}