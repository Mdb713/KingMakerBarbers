<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Mostrar el formulario de reservas con peluqueros, citas y horas ocupadas.
     */
    public function create()
    {
        // Obtener todos los peluqueros
        $peluqueros = User::where('rol', 'peluquero')->get();

        // Obtener todas las citas futuras para controlar las horas ocupadas
        $citasFuturas = Cita::where('fecha', '>=', now()->format('Y-m-d'))->get();

        $horasReservadas = [];
        foreach ($citasFuturas as $cita) {
            $horasReservadas[$cita->fecha][] = $cita->hora;
        }

        // Obtener las citas del usuario autenticado
        $citas = auth()->user()
            ? auth()->user()->citasComoCliente()->with('peluquero')->orderBy('fecha', 'asc')->get()
            : collect();

        return view('reservas', compact('peluqueros', 'horasReservadas', 'citas'));
    }

    /**
     * Guardar una nueva reserva.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'servicio' => 'required|string',
            'peluquero_id' => 'nullable|exists:usuarios,id',
        ]);

        // Validar que la hora no esté ocupada para esa fecha
        $existeCita = Cita::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->exists();

        if ($existeCita) {
            return redirect()->back()->withErrors(['hora' => 'Esta hora ya está reservada. Por favor, elige otra.'])->withInput();
        }

        // Si no se elige peluquero, asignar uno aleatorio
        $peluquero_id = $request->input('peluquero_id');
        if (! $peluquero_id) {
            $peluquero_id = User::where('rol', 'peluquero')->inRandomOrder()->value('id');
        }

        // Crear la cita
        Cita::create([
            'cliente_id' => Auth::id(),
            'peluquero_id' => $peluquero_id,
            'servicio' => $request->input('servicio'),
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'pendiente',
        ]);

        return redirect()->back()->with('success', '¡Reserva creada correctamente!');
    }

    public function destroy(Cita $cita)
    {
        // Solo el dueño de la cita puede eliminarla
        if ($cita->cliente_id !== auth()->id()) {
            abort(403, 'No autorizado');
        }

        $cita->delete();

        return redirect()->back()->with('success', '¡Cita eliminada correctamente!');
    }
}
