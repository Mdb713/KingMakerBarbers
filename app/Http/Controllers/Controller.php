<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class Controller 
{
    /** Mostrar formulario de login */
    public function showLoginForm()
    {
        return view('login');
    }

    /** Procesar login */
    public function login(Request $request)
    {
        // Validación del formulario
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        // Intento de autenticación
        if (Auth::attempt($validated)) {
            // Regenerar sesión y CSRF token
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Inicio de sesión exitoso.');
        }

        // Si las credenciales no son válidas
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /** Mostrar formulario de registro */
    public function showRegisterForm()
    {
        return view('register');
    }

    /** Procesar registro */
    public function register(Request $request)
    {
        // Validación del formulario
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Crear nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Autenticamos automáticamente tras registrarse
        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Registro completado con éxito.');
    }

    /** Cerrar sesión */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar la sesión y regenerar el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sesión cerrada correctamente.');
    }
}
