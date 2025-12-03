<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function reservas()
    {
        return view('reservas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'service' => 'required|string',
        ]);

        $cita = Cita::create([
            'cliente_id' => Auth::id(),
            'peluquero_id' => $request->input('peluquero_id', 1),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'estado' => 'pendiente',
        ]);

        return redirect()->back()->with('success', '¡Reserva creada correctamente!');
    }
}
