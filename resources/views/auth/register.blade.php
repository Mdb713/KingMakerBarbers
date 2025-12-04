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

<body class="bg-dark text-gray-100 font-sans h-screen flex flex-col">

    <div class="flex-grow flex items-center justify-center px-6">
        <div class="bg-dark-gray rounded-2xl shadow-2xl border border-gold/10 p-8 w-full max-w-lg">
            <div
                class="w-16 h-16 bg-gradient-to-br from-gold to-yellow-600 rounded-lg mx-auto flex items-center justify-center">
                <span class="text-2xl font-bold text-dark">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-auto">
                </span>
            </div>
            <h1 class="text-3xl font-bold mt-4 text-center"><span class="text-gold">StreetMake</span><span
                    class="text-white">Barbers</span></h1>
            <p class="text-gray-400 text-sm mt-2 text-center">Inicia sesión para continuar</p>
            <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="nombre" class="block text-sm font-semibold text-gold mb-1">Nombre</label>
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus
                        class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="apellidos" class="block text-sm font-semibold text-gold mb-1">Apellidos</label>
                    <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required
                        class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    @error('apellidos')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gold mb-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="contraseña" class="block text-sm font-semibold text-gold mb-1">Contraseña</label>
                        <input id="contraseña" type="password" name="contraseña" required
                            class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                        @error('contraseña')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contraseña_confirmation"
                            class="block text-sm font-semibold text-gold mb-1">Confirmar contraseña</label>
                        <input id="contraseña_confirmation" type="password" name="contraseña_confirmation" required
                            class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="telefono" class="block text-sm font-semibold text-gold mb-1">Teléfono</label>
                        <input id="telefono" type="text" name="telefono" value="{{ old('telefono') }}" required
                            class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    </div>

                    <div>
                        <label for="direccion" class="block text-sm font-semibold text-gold mb-1">Dirección</label>
                        <input id="direccion" type="text" name="direccion" value="{{ old('direccion') }}" required
                            class="w-full px-4 py-2 rounded-lg bg-medium-gray border border-gold/20 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-gold text-dark font-bold py-2 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                        Registrarse
                    </button>
                </div>
            </form>

            <p class="text-center text-gray-400 mt-6">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-gold hover:text-yellow-400 font-semibold">Inicia sesión</a>
            </p>
        </div>
    </div>
</body>


</html>
