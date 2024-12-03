<?php

namespace App\Models\Donacion;

use App\Models\Donante\Donante;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{

    protected $fillable = [
        'descripcion',
        'fecha',
        'donante_id',
    ];

    public function donante()
    {
        return $this->belongsTo(Donante::class, 'donante_id');
    }
}
