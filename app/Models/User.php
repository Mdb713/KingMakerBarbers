<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nombre de la tabla
    protected $table = 'usuarios';

    // Laravel no manejará automáticamente created_at/updated_at
    public $timestamps = false;

    // Campos asignables masivamente
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

    // Campos ocultos al serializar
    protected $hidden = [
        'contraseña',
    ];

    // Casts de atributos (opcional, útil para fechas)
    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    // Para que Laravel use la columna 'contraseña' como password
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    // RELACIONES

    // Pedidos del usuario
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }

    // Citas donde el usuario es cliente
    public function citasComoCliente()
    {
        return $this->hasMany(Cita::class, 'cliente_id');
    }

    // Citas donde el usuario es peluquero
    public function citasComoPeluquero()
    {
        return $this->hasMany(Cita::class, 'peluquero_id');
    }

    // Valoraciones realizadas por el usuario
    public function valoracionesRealizadas()
    {
        return $this->hasMany(ValoracionPeluquero::class, 'usuario_id');
    }

    // Valoraciones recibidas por el usuario (como peluquero)
    public function valoracionesRecibidas()
    {
        return $this->hasMany(ValoracionPeluquero::class, 'peluquero_id');
    }

    // Notificaciones del usuario
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'usuario_id');
    }

    // ATRIBUTOS PERSONALIZADOS

    // Check si el usuario es administrador
    public function getIsAdminAttribute()
    {
        return $this->rol === 'admin';
    }

    // Nombre completo
    public function getNombreCompletoAttribute()
    {
        return trim("{$this->nombre} {$this->apellidos}");
    }
}
