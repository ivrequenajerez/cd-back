<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = [
        'usuario_id',
        'tipo',
        'mensaje',
        'fecha_envio',
        'estado',
    ];

    // Relación muchos a uno con Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
