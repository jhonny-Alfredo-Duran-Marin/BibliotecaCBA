<?php

namespace App\Models\Sala;

use App\Models\Evento\Evento;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = [
        'descripcion',
        'capacidad',
        'fecha',
    ];
    public function eventos()
    {
        return $this->hasMany(Evento::class,'sala_id');
    }
}

