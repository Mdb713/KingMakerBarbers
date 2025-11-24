<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    public function agregar(Request $request)
    {
        $producto_id = $request->producto_id;

        $carrito = session()->get('carrito', []);

        if(isset($carrito[$producto_id])) {
            $carrito[$producto_id]['cantidad']++;
        } else {
            $producto = Producto::find($producto_id);
            $carrito[$producto_id] = [
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "imagen_url" => $producto->imagen_url,
                "cantidad" => 1
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function ver()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }

    public function eliminar(Request $request)
    {
        $producto_id = $request->producto_id;
        $carrito = session()->get('carrito', []);
        if(isset($carrito[$producto_id])) {
            unset($carrito[$producto_id]);
            session()->put('carrito', $carrito);
        }
        return redirect()->back();
    }
    public function vaciar() {
    session()->forget('carrito');
    return response()->json(['ok'=>true]);
}
    public function pagar(Request $request)
{
    $carrito = session()->get('carrito', []);

    if(empty($carrito)){
        return redirect()->back()->with('error', 'Tu carrito está vacío.');
    }

    $total = collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']);

    session()->forget('carrito');

    return redirect()->route('carrito.ver')->with('success', "Pago realizado con éxito. Total pagado: {$total}€");
}

}
