<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';

    protected $fillable = [
        'cliente_id',
        'peluquero_id',
        'servicio',
        'fecha',
        'hora',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function peluquero()
    {
        return $this->belongsTo(User::class, 'peluquero_id', 'id')->withDefault([
            'name' => 'Asignado aleatoriamente',
        ]);
    }

    public function valoracion()
    {
        return $this->hasOne(ValoracionPeluquero::class, 'cita_id');
    }
}
