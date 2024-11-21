<?php

namespace App\Models\MaterialBibliografico;

use App\Models\CategoriaMaterial\CategoriaMaterial;
use App\Models\EstadoMaterial\EstadoMaterial;
use App\Models\Material\TipoMaterial;
use Illuminate\Database\Eloquent\Model;

class MaterialBibliografico extends Model
{
    protected $fillable = [
        'codigo',
        'titulo',
        'editorial',
        'autor',
        'fecha_publicacion',
        'imagen',
        'tipo_id',
        'categoria_id',
        'estado_id'
    ];
    // Relación con 'estado_materials'
    public function estado()
    {
        return $this->belongsTo(EstadoMaterial::class, 'estado_id'); // Asegúrate de que el campo clave foránea sea 'estado_id'
    }

    // Relación con 'categoria_materials'
    public function categoria()
    {
        return $this->belongsTo(CategoriaMaterial::class, 'categoria_id'); // Asegúrate de que el campo clave foránea sea 'categoria_id'
    }

    // Relación con 'tipo_materials'
    public function tipo()
    {
        return $this->belongsTo(TipoMaterial::class, 'tipo_id'); // Asegúrate de que el campo clave foránea sea 'tipo_id'
    }
}
