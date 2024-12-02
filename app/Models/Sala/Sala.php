<?php

namespace App\Models\Sala;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = [
        'descripcion',
        'capacidad',
        'fecha',
    ];
}

