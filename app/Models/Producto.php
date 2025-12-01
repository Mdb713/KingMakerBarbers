<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen_url'];

    
    public function detallesPedido()
    {
        return $this->hasMany(DetallePedido::class, 'producto_id');
    }
}
