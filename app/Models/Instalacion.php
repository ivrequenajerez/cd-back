<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'capacidad',
        'categoria_id',
    ];

    // Relación muchos a uno con Categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación uno a muchos con Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
