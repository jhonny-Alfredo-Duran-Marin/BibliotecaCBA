<?php

namespace App\Models\Suscripcion;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $fillable = [
        'descripcion',
        'duracion',
        'costo'
    ];

}
