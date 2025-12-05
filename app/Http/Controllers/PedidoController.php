<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;

class PedidoController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'metodo_pago' => 'required|string',
            'carrito' => 'required|array',
            'total' => 'required'
        ]);

        $pedido = Pedido::create([
            'usuario_id' => auth()->id(),
            'metodo_pago' => $request->metodo_pago,
            'estado' => 'pendiente',
        ]);

        foreach ($request->carrito as $item) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $item['id'],
                'cantidad' => $item['cantidad']
            ]);
        }

        return response()->json(['success' => true]);
    }
}
