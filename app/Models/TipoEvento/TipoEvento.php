<?php

namespace App\Models\TipoEvento;

use App\Models\Evento\Evento;
use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $fillable = [
        'descripcion',
    ];
    public function eventos()
    {
        return $this->hasMany(Evento::class,'tipo_evento_id');
    }
}
