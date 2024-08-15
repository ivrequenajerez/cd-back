<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadDeportiva extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'categoria_id',
    ];

    // Relación muchos a uno con Categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación uno a muchos con EntradasDeporte
    public function entradasDeporte()
    {
        return $this->hasMany(EntradaDeporte::class);
    }
}
