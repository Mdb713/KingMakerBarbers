<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - HairLab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'gold': '#D4AF37',
                        'dark': '#0A0A0A',
                        'dark-gray': '#1A1A1A',
                        'medium-gray': '#2D2D2D',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col justify-center items-center">

    <!-- Contenedor principal -->
    <div class="bg-dark-gray/90 p-10 rounded-2xl shadow-2xl border border-gold/20 w-full max-w-md">

        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-gold to-yellow-600 rounded-lg mx-auto flex items-center justify-center">
                <span class="text-2xl font-bold text-dark">HL</span>
            </div>
            <h1 class="text-3xl font-bold mt-4"><span class="text-gold">Hair</span><span class="text-white">Lab</span></h1>
            <p class="text-gray-400 text-sm mt-2">Inicia sesión para continuar</p>
        </div>

        <!-- Formulario de login -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500 text-red-400 p-3 rounded-lg text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm font-semibold text-gold mb-2">Correo Electrónico</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full bg-medium-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gold mb-2">Contraseña</label>
                <input id="password" type="password" name="password" required
                    class="w-full bg-medium-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-400">
                    <input type="checkbox" name="remember" class="mr-2 accent-gold">
                    Recuérdame
                </label>
                <a href="#" class="text-gold text-sm hover:underline">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="w-full bg-gold text-dark font-bold py-3 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105">
                Iniciar Sesión
            </button>
        </form>

        <p class="text-center text-gray-400 text-sm mt-6">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-gold font-semibold hover:underline">Regístrate aquí</a>
        </p>
    </div>

    <p class="mt-8 text-gray-500 text-sm">© 2025 HairLab. Todos los derechos reservados.</p>

</body>
</html>
