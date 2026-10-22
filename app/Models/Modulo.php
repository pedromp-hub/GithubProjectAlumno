<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulo';

    protected $fillable = [
        'nombre',
        'abreviatura',
        'horas',
        'creditos',
    ];
}
