@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-8">

    <h1 class="text-4xl font-title font-bold text-gold mb-6 drop-shadow-lg">Mi Perfil</h1>

    <form action="{{ route('perfil.update') }}" method="POST" class="space-y-6 bg-dark-gray rounded-3xl p-8 border border-gold/20 shadow-lg">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-400 font-semibold mb-2">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}"
                    class="w-full bg-dark border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition" required>
            </div>
            <div>
                <label class="block text-gray-400 font-semibold mb-2">Apellidos</label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $usuario->apellidos) }}"
                    class="w-full bg-dark border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-400 font-semibold mb-2">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}"
                class="w-full bg-dark border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition" required>
        </div>

        <div>
            <label class="block text-gray-400 font-semibold mb-2">Contraseña (dejar en blanco si no se cambia)</label>
            <input type="password" name="contraseña"
                class="w-full bg-dark border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-400 font-semibold mb-2">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}"
                    class="w-full bg-dark border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
            </div>
            <div>
                <label class="block text-gray-400 font-semibold mb-2">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}"
                    class="w-full bg-dark border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-400 font-semibold mb-2">Rol</label>
                <input type="text" name="rol" value="{{ old('rol', $usuario->rol) }}" readonly
                    class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-300 cursor-not-allowed">
            </div>
            <div>
                <label class="block text-gray-400 font-semibold mb-2">Fecha de Registro</label>
                <input type="text" value="{{ $usuario->fecha_registro }}" readonly
                    class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-300 cursor-not-allowed">
            </div>
        </div>

        <button type="submit"
            class="w-full bg-gold text-dark font-bold py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
            Actualizar Perfil
        </button>
    </form>

</div>
@endsection
