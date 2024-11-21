<?php

namespace App\Models\Material;

use App\Models\MaterialBibliografico\MaterialBibliografico;
use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected $fillable = [
        'descripcion',
    ];
    public function materiales()
    {
        return $this->hasMany(MaterialBibliografico::class, 'tipo_id');
    }
}
