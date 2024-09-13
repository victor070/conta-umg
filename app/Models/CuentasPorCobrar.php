<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuentasPorCobrar extends Model
{
    protected $table = 'CuentaPorCobrar';
    protected $primaryKey = 'CuentaPorCobrarID';

    public $timestamps =false;

    protected $fillable = [
        'CuentaPorCobrarID ',
        'ClienteID  ',
        'SaldoPendiente ',
        'FechaVencimiento',
        'Estatus'
    ];
}

