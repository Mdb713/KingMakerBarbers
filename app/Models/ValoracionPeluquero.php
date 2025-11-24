<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValoracionPeluquero extends Model
{
    use HasFactory;

    protected $table = 'valoraciones_peluquero';

    protected $fillable = [
        'usuario_id',
        'peluquero_id',
        'comentario',
        'calificacion',
    ];

    // 🔗 Relaciones
    public function cliente()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function peluquero()
    {
        return $this->belongsTo(User::class, 'peluquero_id');
    }
}
