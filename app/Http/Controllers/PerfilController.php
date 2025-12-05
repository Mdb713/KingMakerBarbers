<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        return view('perfil', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => ['required', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/', 'unique:usuarios,email,' . $usuario->id],
            'telefono' => 'required|digits_between:9,15',
            'direccion' => 'required|string|max:255',
            'contraseña' => ['nullable', Password::min(8)],
            'contraseña_confirm' => 'same:contraseña',
        ], [
            'contraseña_confirm.same' => 'La confirmación de la contraseña no coincide.',
            'telefono.digits_between' => 'El teléfono debe contener entre 9 y 15 números.',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;

        if ($request->filled('contraseña')) {
            $usuario->contraseña = Hash::make($request->contraseña);
        }

        $usuario->save();

        return redirect()->route('perfil.index')->with('success', 'Perfil actualizado correctamente.');
    }
}
