<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuentasPorPagar extends Model
{
    protected $table = 'CuentaPorPagar';
    protected $primaryKey = 'CuentaPorPagarID';

    public $timestamps =false;

    protected $fillable = [
        'CuentaPorPagarID',
        'ProveedorID',
        'SaldoPendiente',
        'FechaVencimiento',
        'Estatus'
    ];
}

