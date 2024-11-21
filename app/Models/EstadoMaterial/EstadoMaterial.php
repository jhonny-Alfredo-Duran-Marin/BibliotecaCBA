<?php

namespace App\Models\EstadoMaterial;

use App\Models\MaterialBibliografico\MaterialBibliografico;
use Illuminate\Database\Eloquent\Model;

class EstadoMaterial extends Model
{
    protected $fillable = [
        'descripcion',
    ];
     // Relación con MaterialBibliografico
     public function materiales()
     {
         return $this->hasMany(MaterialBibliografico::class, 'estado_id');
     }
}
