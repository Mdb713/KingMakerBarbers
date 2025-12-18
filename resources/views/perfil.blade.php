@extends('layouts.app')

@section('content')
<section class="relative pt-32 pb-24 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/fondo5.webp') }}" alt="Fondo Perfil" class="w-full h-full object-cover object-center opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-dark via-transparent to-dark"></div>
    </div>

    <div class="max-w-5xl mx-auto p-6 relative z-10 space-y-8 font-body">
        <h1 class="text-4xl md:text-5xl font-heading font-bold text-gold mb-6 drop-shadow-lg text-center">Mi Perfil</h1>

        @if ($errors->any())
            <div class="bg-red-600 text-white p-3 rounded mb-4 font-body">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="passwordError" class="hidden bg-red-600 text-white p-3 rounded mb-4 font-body">
            <ul class="list-disc pl-5">
                <li>Las contraseñas no coinciden.</li>
            </ul>
        </div>

        <form id="perfilForm" action="{{ route('perfil.update') }}" method="POST" class="space-y-6 bg-dark-gray/90 rounded-3xl p-8 border border-gold/20 shadow-lg">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}"
                        class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body" required>
                </div>
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Apellidos</label>
                    <input type="text" name="apellidos" value="{{ old('apellidos', $usuario->apellidos) }}"
                        class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-300 font-semibold mb-2">Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email', $usuario->email) }}"
                    class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body" required>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Nueva contraseña</label>
                    <input type="password" name="contraseña" id="contraseña"
                        class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body">
                </div>
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Confirmar contraseña</label>
                    <input type="password" name="contraseña_confirm" id="contraseña_confirm"
                        class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}"
                        class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body">
                </div>
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}"
                        class="w-full p-3 rounded bg-dark border border-gold/20 text-gray-100 focus:border-gold outline-none transition font-body">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 font-semibold mb-2">Rol</label>
                    <input type="text" name="rol" value="{{ old('rol', $usuario->rol) }}" readonly
                        class="w-full p-3 rounded bg-dark-gray border border-gold/20 text-gray-400 cursor-not-allowed font-body">
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('perfil.index') }}"
                   class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition font-body">
                   Cancelar
                </a>
                <button type="submit"
                    class="bg-gold hover:bg-yellow-500 text-dark font-bold px-4 py-2 rounded shadow-lg transition font-body">
                    Actualizar Perfil
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    const form = document.getElementById('perfilForm');
    const passwordError = document.getElementById('passwordError');

    form.addEventListener('submit', function(event) {
        const pass = document.getElementById('contraseña').value;
        const confirmPass = document.getElementById('contraseña_confirm').value;

        passwordError.classList.add('hidden');

        if (pass !== confirmPass) {
            event.preventDefault();
            passwordError.classList.remove('hidden');
        }
    });
</script>
@endsection
