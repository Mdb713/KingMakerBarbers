<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ValoracionPeluquero;
use Illuminate\Http\Request;

class ValoracionesController extends Controller
{
    public function index(Request $request)
    {
        $peluqueros = User::where('rol', 'peluquero')->get();

        $query = ValoracionPeluquero::with(['cliente', 'peluquero']);

        if ($request->filled('orden')) {
            if ($request->orden === 'mejor') {
                $query->orderBy('calificacion', 'desc');
            } elseif ($request->orden === 'peor') {
                $query->orderBy('calificacion', 'asc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        if ($request->filled('peluquero') && $request->peluquero != 'todos') {
            $query->whereHas('peluquero', function ($q) use ($request) {
                $q->where('id', $request->peluquero);
            });
        }

        $valoraciones = $query->paginate(5)->withQueryString();

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
