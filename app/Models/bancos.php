<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
    protected $table = 'Banco';
    protected $primaryKey = 'BancoID';

    public $timestamps =false;

    protected $fillable = [
        'BancoID',
        'Nombre',
        'SaldosCuentas',
        'Estatus'
    ];
}

