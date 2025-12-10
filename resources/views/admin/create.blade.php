@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-gray-900 rounded-xl shadow-lg border border-yellow-500">

    <h1 class="text-2xl font-bold text-gold mb-6 text-center">Crear Nuevo Usuario</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-300 font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre" value=""
                   class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
        </div>

        <div>
            <label class="block text-gray-300 font-semibold mb-1">Apellidos</label>
            <input type="text" name="apellidos" value=""
                   class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
        </div>

        <div>
            <label class="block text-gray-300 font-semibold mb-1">Email</label>
            <input type="email" name="email" value=""
                   class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
        </div>

        <div>
            <label class="block text-gray-300 font-semibold mb-1">Contraseña</label>
            <input type="password" name="contraseña"
                   class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
        </div>

        <div>
            <label class="block text-gray-300 font-semibold mb-1">Rol</label>
            <select name="rol" class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
                <option value="admin">Admin</option>
                <option value="cliente">Cliente</option>
                <option value="peluquero">Peluquero</option>
            </select>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.panel') }}"
               class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-dark font-semibold px-4 py-2 rounded shadow-md transition">
                Crear Usuario
            </button>
        </div>
    </form>
</div>
@endsection
