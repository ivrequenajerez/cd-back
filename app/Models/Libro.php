<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'descripcion',
        'precio',
        'categoria_id',
    ];

    // Relación muchos a uno con Categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
