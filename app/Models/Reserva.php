<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'instalacion_id',
        'usuario_id',
        'fecha_reserva',
        'hora_inicio',
        'hora_fin',
        'estado',
    ];

    // Relación muchos a uno con Instalaciones
    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class);
    }

    // Relación muchos a uno con Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
