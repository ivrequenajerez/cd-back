<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'foto_de_perfil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relaciones

    // Relación uno a muchos con EntradasCultura
    public function entradasCultura()
    {
        return $this->hasMany(EntradaCultura::class);
    }

    // Relación uno a muchos con Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Relación uno a muchos con Abonos
    public function abonos()
    {
        return $this->hasMany(Abono::class);
    }

    // Relación uno a muchos con Carnets
    public function carnets()
    {
        return $this->hasMany(Carnet::class);
    }

    // Relación uno a muchos con Pagos
    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    // Relación uno a muchos con Notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }

    // Relación uno a muchos con EntradasDeporte
    public function entradasDeporte()
    {
        return $this->hasMany(EntradaDeporte::class);
    }

}
