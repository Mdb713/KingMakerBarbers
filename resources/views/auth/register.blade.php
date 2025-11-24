<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - HairLab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#D4AF37',
                        dark: '#0A0A0A',
                        'dark-gray': '#1A1A1A',
                        'medium-gray': '#2D2D2D',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-dark-gray/95 backdrop-blur-sm shadow-2xl fixed top-0 left-0 w-full z-50 border-b border-gold/20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 group">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-gold to-yellow-600 rounded-lg flex items-center justify-center transform group-hover:rotate-6 transition-transform">
                    <span class="text-xl font-bold text-dark">HL</span>
                </div>
                <h1 class="text-2xl font-bold">
                    <span class="text-gold">Hair</span><span class="text-white">Lab</span>
                </h1>
            </a>
            <a href="{{ route('login') }}" class="text-gold font-semibold hover:text-yellow-400 transition">Iniciar
                sesión</a>
        </div>
    </nav>

    <!-- FORMULARIO -->
    <div class="flex-grow flex items-center justify-center pt-32 pb-16 px-6">
        <div class="bg-dark-gray rounded-2xl shadow-2xl border border-gold/10 p-10 w-full max-w-lg">
            <h2 class="text-4xl font-bold text-center mb-6">
                <span class="text-gold">Crear</span> Cuenta
            </h2>
            <p class="text-gray-400 text-center mb-8">Únete a HairLab y reserva tus citas fácilmente.</p>

            <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-sm font-semibold text-gold mb-2">Nombre</label>
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus
                        class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="apellidos" class="block text-sm font-semibold text-gold mb-2">Apellidos</label>
                    <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required
                        class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    @error('apellidos')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gold mb-2">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="contraseña" class="block text-sm font-semibold text-gold mb-2">Contraseña</label>
                        <input id="contraseña" type="password" name="contraseña" required
                            class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                        @error('contraseña')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contraseña_confirmation"
                            class="block text-sm font-semibold text-gold mb-2">Confirmar contraseña</label>
                        <input id="contraseña_confirmation" type="password" name="contraseña_confirmation" required
                            class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    </div>
                </div>

                <div>
                    <label for="telefono" class="block text-sm font-semibold text-gold mb-2">Teléfono</label>
                    <input id="telefono" type="text" name="telefono" value="{{ old('telefono') }}" required
                        class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                </div>

                <div>
                    <label for="direccion" class="block text-sm font-semibold text-gold mb-2">Dirección</label>
                    <input id="direccion" type="text" name="direccion" value="{{ old('direccion') }}" required
                        class="w-full px-4 py-3 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gold text-dark font-bold py-3 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                        Registrarse
                    </button>
                </div>
            </form>

            <p class="text-center text-gray-400 mt-8">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-gold hover:text-yellow-400 font-semibold">Inicia sesión</a>
            </p>
        </div>
    </div>

    <footer class="text-center py-6 border-t border-gold/10 text-gray-500 text-sm">
        © 2025 HairLab. Todos los derechos reservados.
    </footer>
</body>

</html>
