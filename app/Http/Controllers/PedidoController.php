<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido; // Modelo para detallepedido

class PedidoController extends Controller
{
    /**
     * Guardar un nuevo pedido
     */
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'metodo_pago' => 'required|string',
            'carrito' => 'required|array',
            'total' => 'required'
        ]);

        // Guardar pedido
        $pedido = Pedido::create([
            'usuario_id' => auth()->id(), // Coincide con la columna de la tabla
            'metodo_pago' => $request->metodo_pago,
            'estado' => 'pendiente',
        ]);

        // Guardar detalle de cada producto
        foreach ($request->carrito as $item) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $item['id'], // Asegúrate de que cada item del carrito tenga 'id'
                'cantidad' => $item['cantidad']
            ]);
        }

        return response()->json(['success' => true]);
    }
}
