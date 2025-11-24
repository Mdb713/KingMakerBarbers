<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrarProductos()
    {
        // Trae todos los productos
        $productos = Producto::all();

        // Envía los productos a la vista
        return view('productos', compact('productos'));
    }
}
