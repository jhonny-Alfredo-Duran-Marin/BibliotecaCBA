<?php

namespace App\Models\Evento;

use App\Models\TipoEvento\TipoEvento;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'tipo_evento_id',
    ];

     public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class,'tipo_evento_id');
    }
}
