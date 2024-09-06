<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'ClienteID';

    public $timestamps =false;

    protected $fillable = [
        'cliente_id',
        'Nombre',
        'Direccion',
        'Nit',
        'CorreoElectronico',
        'telefono'
    ];
}

