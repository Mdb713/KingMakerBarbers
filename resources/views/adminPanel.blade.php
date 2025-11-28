@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Usuarios Registrados</h1>

    <a href="{{ route('usuarios.create') }}"
       class="bg-gold text-dark px-4 py-2 rounded-lg mb-4 inline-block hover:bg-yellow-500 transition-colors">
        Añadir Usuario
    </a>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full text-left border border-gray-700 rounded-lg">
        <thead class="bg-dark-gray text-gold">
            <tr>
                <th class="p-2 border-b">ID</th>
                <th class="p-2 border-b">Nombre</th>
                <th class="p-2 border-b">Email</th>
                <th class="p-2 border-b">Rol</th>
                <th class="p-2 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr class="border-b border-gray-700">
                <td class="p-2">{{ $usuario->id }}</td>
                <td class="p-2">{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                <td class="p-2">{{ $usuario->email }}</td>
                <td class="p-2">{{ $usuario->rol }}</td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                       class="bg-yellow-500 px-2 py-1 rounded text-dark hover:bg-yellow-400 transition-colors">
                        Editar
                    </a>
                    <form action="{{ route('usuarios.delete', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar este usuario?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 px-2 py-1 rounded text-dark hover:bg-red-400 transition-colors">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
