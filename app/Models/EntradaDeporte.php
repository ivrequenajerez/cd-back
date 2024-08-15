<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaDeporte extends Model
{
    protected $fillable = [
        'actividad_deportiva_id',
        'usuario_id',
        'cantidad',
        'total',
        'estado',
        'fecha_compra',
    ];

    // Relación muchos a uno con ActividadesDeportivas
    public function actividadDeportiva()
    {
        return $this->belongsTo(ActividadDeportiva::class);
    }

    // Relación muchos a uno con Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
