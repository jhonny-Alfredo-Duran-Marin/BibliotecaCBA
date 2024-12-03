<?php

namespace App\Models\Donante;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $fillable = [
        'nombre',
        'sexo',
        'celular',
    ];
}
