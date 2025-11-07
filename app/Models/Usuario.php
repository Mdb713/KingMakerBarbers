<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'contraseña',
        'rol',
        'telefono',
        'direccion',
        'fecha_registro',
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }

    public function citasComoCliente()
    {
        return $this->hasMany(Cita::class, 'cliente_id');
    }

    public function citasComoPeluquero()
    {
        return $this->hasMany(Cita::class, 'peluquero_id');
    }

    public function valoracionesRealizadas()
    {
        return $this->hasMany(ValoracionPeluquero::class, 'usuario_id');
    }

    public function valoracionesRecibidas()
    {
        return $this->hasMany(ValoracionPeluquero::class, 'peluquero_id');
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'usuario_id');
    }
}
