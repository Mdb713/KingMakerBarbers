<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservaController extends Controller
{

    public function create()
    {

        $peluqueros = User::where('rol', 'peluquero')->get();

        $citasFuturas = Cita::where('fecha', '>=', now()->format('Y-m-d'))->get();

        $horasReservadas = [];
        foreach ($citasFuturas as $cita) {
            $horasReservadas[$cita->fecha][] = $cita->hora;
        }

        $citas = auth()->user()
            ? auth()->user()->citasComoCliente()->with('peluquero')->orderBy('fecha', 'asc')->get()
            : collect();

        return view('reservas', compact('peluqueros', 'horasReservadas', 'citas'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'servicio' => 'required|string',
            'peluquero_id' => 'nullable|exists:usuarios,id',
        ]);

        $citasActivas = Cita::where('cliente_id', Auth::id())
            ->where('fecha', '>=', Carbon::today()->format('Y-m-d'))
            ->count();

        if (Carbon::parse($request->fecha)->isBefore(today())) {
            return redirect()->back()->withErrors([
                'fecha' => 'No puedes reservar en una fecha pasada.'
            ])->withInput();
        }

        $existeCita = Cita::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->exists();

        if ($existeCita) {
            return redirect()->back()->withErrors([
                'hora' => 'Esta hora ya está reservada. Por favor, elige otra.'
            ])->withInput();
        }

        $usuarioTieneCita = Cita::where('cliente_id', Auth::id())
            ->where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->exists();

        if ($usuarioTieneCita) {
            return redirect()->back()->withErrors([
                'hora' => 'Ya tienes una reserva en esa fecha y hora.'
            ])->withInput();
        }
        $peluquero_id = $request->input('peluquero_id');
        if (!$peluquero_id) {
            $peluquero_id = User::where('rol', 'peluquero')->inRandomOrder()->value('id');
        }

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
        if ($cita->cliente_id !== auth()->id()) {
            abort(403, 'No autorizado');
        }

        $cita->delete();

        return redirect()->back()->with('success', '¡Cita eliminada correctamente!');
    }
}
