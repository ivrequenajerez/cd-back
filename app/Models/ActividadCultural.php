<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadCultural extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'ubicacion',
        'categoria_id',
    ];

    // Relación muchos a uno con Categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación uno a muchos con EntradasCultura
    public function entradasCultura()
    {
        return $this->hasMany(EntradaCultura::class);
    }
}
