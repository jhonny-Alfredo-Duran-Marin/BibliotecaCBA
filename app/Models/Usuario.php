<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre',
        'sexo',
        'email',
        'telefono',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    // Relación hacia User
    public function user()
    {
        return $this->hasOne(User::class, 'usuario_id'); // Especifica la clave foránea
    }
}
