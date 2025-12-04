<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ValoracionPeluquero;
use Illuminate\Http\Request;

class ValoracionesController extends Controller
{
    public function index()
    {
        $peluqueros = User::where('rol', 'peluquero')->get();

        $valoraciones = ValoracionPeluquero::with(['cliente', 'peluquero'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('valoraciones', compact('valoraciones', 'peluqueros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peluquero_id' => 'required|exists:usuarios,id',
            'calificacion' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:500',
        ]);

        ValoracionPeluquero::create([
            'usuario_id' => auth()->id(),
            'peluquero_id' => $request->peluquero_id,
            'calificacion' => $request->calificacion,
            'comentario' => $request->comentario,
        ]);

        return redirect()->back()->with('success', '¡Gracias por tu valoración!');
    }
}
