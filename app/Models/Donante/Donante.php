<?php

namespace App\Models\Donante;

use App\Models\Donacion\Donacion;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $fillable = [
        'nombre',
        'sexo',
        'celular',
    ];
    public function donaciones()
    {
        return $this->hasMany(Donacion::class, 'donante_id');
    }

}
