@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-gray-900 rounded-xl shadow-lg border border-yellow-500">

        <h1 class="text-2xl font-bold text-gold mb-6 text-center">Editar Usuario</h1>

        @if ($errors->any())
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-300 font-semibold mb-1">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $user->nombre) }}"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
            </div>

            <div>
                <label class="block text-gray-300 font-semibold mb-1">Apellidos</label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $user->apellidos) }}"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
            </div>

            <div>
                <label class="block text-gray-300 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
            </div>

            <div>
                <label class="block text-gray-300 font-semibold mb-1">Contraseña <span class="text-gray-400 text-sm">(dejar
                        vacío si no quieres cambiarla)</span></label>
                <input type="password" name="contraseña"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white">
            </div>
            <div>
                <label class="block text-gray-300 font-semibold mb-1">Rol</label>

                <select name="rol" class="w-full p-2 rounded bg-gray-800 border border-gray-700 text-white"
                    @if (auth()->id() === $user->id) disabled @endif>
                    <option value="admin" {{ old('rol', $user->rol) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="cliente" {{ old('rol', $user->rol) == 'cliente' ? 'selected' : '' }}>Cliente</option>
                     <option value="peluquero" {{ old('rol', $user->rol) == 'peluquero' ? 'selected' : '' }}>Peluquero</option>
                </select>

                {{-- Si edita su propio usuario, enviamos el rol REAL en un campo oculto --}}
                @if (auth()->id() === $user->id)
                    <input type="hidden" name="rol" value="{{ $user->rol }}">
                    <p class="text-gray-400 text-sm mt-1">No puedes cambiar tu propio rol.</p>
                @endif
            </div>


            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('admin.panel') }}"
                    class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-dark font-semibold px-4 py-2 rounded shadow-md transition">
                    Actualizar Usuario
                </button>
            </div>
        </form>
    </div>
@endsection
