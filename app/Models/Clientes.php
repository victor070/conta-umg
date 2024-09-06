<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'Cliente';
    protected $primaryKey = 'ClienteID';

    public $timestamps =false;

    protected $fillable = [
        'Cliente_id',
        'Nombre',
        'Direccion',
        'Nit',
        'CorreoElectronico',
        'telefono'
    ];
}

