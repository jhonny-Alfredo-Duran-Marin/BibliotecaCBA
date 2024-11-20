<?php

namespace App\Models\MaterialBibliografico;

use Illuminate\Database\Eloquent\Model;

class MaterialBibliografico extends Model
{
    protected $fillable = [
        'codigo',
        'titulo',
        'editorial',
        'autor',
        'fecha_publicacion',
        'imagen'
    ];
}
