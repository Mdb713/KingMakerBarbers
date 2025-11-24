<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // tu vista de registro
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:usuarios,email',
            'contraseña' => 'required|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        $usuario = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'contraseña' => Hash::make($request->contraseña),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rol' => 'cliente',
        ]);

        // Loguear automáticamente
        Auth::login($usuario);

        return redirect('/')->with('success', 'Registro completado correctamente');
    }
}
