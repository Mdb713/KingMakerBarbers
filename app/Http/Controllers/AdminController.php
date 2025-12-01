<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('adminPanel', compact('usuarios'));
    }

    public function createUser()
    {
        return view('admin.create');
    }

    public function storeUser(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email',
        'contraseña' => 'required|string|min:6',
        'rol' => 'required|in:admin,cliente',
    ]);

    User::create([
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'email' => $request->email,
        'contraseña' => bcrypt($request->contraseña),
        'rol' => $request->rol,
    ]);

    return redirect()->route('admin.panel')->with('success', 'Usuario creado correctamente.');
}

    public function editUser(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,'.$user->id,
            'rol' => 'required|in:admin,cliente',
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['nombre', 'apellidos', 'email', 'rol']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.panel')->with('success', 'Usuario actualizado correctamente.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.panel')->with('success', 'Usuario eliminado correctamente.');
    }
}
