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
        'fecha',
        'hora',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }

    public function peluquero()
    {
        return $this->belongsTo(Usuario::class, 'peluquero_id');
    }

    public function valoracion()
    {
        return $this->hasOne(ValoracionPeluquero::class, 'cita_id');
    }
}
