<?php

namespace App\Models\CategoriaMaterial;

use App\Models\MaterialBibliografico\MaterialBibliografico;
use Illuminate\Database\Eloquent\Model;

class CategoriaMaterial extends Model
{
    protected $fillable = [
        'descripcion',
    ];
     // Relación con MaterialBibliografico
     public function materiales()
    {
        return $this->hasMany(MaterialBibliografico::class, 'categoria_id'); 
    }
}
