<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'Proveedor';
    protected $primaryKey = 'ProveedorID';

    public $timestamps =false;

    protected $fillable = [
        'ProveedorID',
        'Nombre',
        'Direccion',
        'Nit',
        'CorreoElectronico',
        'Telefono',
        'Estatus'
    ];
}