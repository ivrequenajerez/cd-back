<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación uno a muchos con ActividadesCulturales
    public function actividadesCulturales()
    {
        return $this->hasMany(ActividadCultural::class);
    }

    // Relación uno a muchos con Instalaciones
    public function instalaciones()
    {
        return $this->hasMany(Instalacion::class);
    }

    // Relación uno a muchos con ActividadesDeportivas
    public function actividadesDeportivas()
    {
        return $this->hasMany(ActividadDeportiva::class);
    }

    // Relación uno a muchos con Libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
