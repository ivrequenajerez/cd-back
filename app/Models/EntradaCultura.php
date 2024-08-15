<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaCultura extends Model
{
    protected $fillable = [
        'actividad_cultural_id',
        'usuario_id',
        'cantidad',
        'total',
        'estado',
        'fecha_compra',
    ];

    // Relación muchos a uno con ActividadesCulturales
    public function actividadCultural()
    {
        return $this->belongsTo(ActividadCultural::class);
    }

    // Relación muchos a uno con Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
