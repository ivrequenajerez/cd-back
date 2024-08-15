<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $fillable = [
        'usuario_id',
        'tipo',
        'fecha_compra',
        'fecha_expiracion',
        'estado',
    ];

    // Relación muchos a uno con Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
