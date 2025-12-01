<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KingMaker Barbers</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuración Tailwind personalizada -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'gold': '#D4AF37',
                        'dark': '#0A0A0A',
                        'dark-gray': '#1A1A1A',
                        'medium-gray': '#2D2D2D',
                    },
                    fontFamily: {
                        heading: ['Rye', 'cursive'],
                        body: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Rye&display=swap" rel="stylesheet">

    <!-- Scripts y CSS adicionales -->
    <script src="{{ asset('js/footer.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>

<nav class="bg-dark-gray/95 backdrop-blur-sm shadow-2xl fixed top-0 left-0 w-full z-50 border-b border-gold/20 font-body">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
            <div class="w-14 h-14 bg-gradient-to-br from-gold to-yellow-600 rounded-lg flex items-center justify-center transform group-hover:rotate-6 transition-transform">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-96 h-auto">
            </div>
            <h1 class="text-3xl font-heading">
                <span class="text-gold">KingMaker</span><span class="text-white">Barbers</span>
            </h1>
        </a>

        <!-- Menú Desktop -->
        <ul class="hidden md:flex gap-8 text-sm font-medium uppercase tracking-wider items-center">
            <li><a href="{{ url('/') }}" class="hover:text-gold transition-colors">Inicio</a></li>
            <li><a href="{{ route('productos') }}" class="hover:text-gold transition-colors">Productos</a></li>
            <li><a href="{{ route('reservas') }}" class="hover:text-gold transition-colors">Reservas</a></li>
            <li><a href="{{ route('contacto') }}" class="hover:text-gold transition-colors">Contacto</a></li>

            @auth
                @if (auth()->user()->is_admin)
                    <li>
                        <a href="{{ route('admin.panel') }}" class="text-gold hover:text-yellow-500 transition-colors font-semibold">
                            Panel de Administración
                        </a>
                    </li>
                @endif
              <a href="{{ route('perfil.index') }}" class="text-gold hover:text-yellow-500 transition-colors">Perfil</a>
                <li class="relative">
                    <a href="{{ route('carrito.ver') }}" class="hover:text-gold transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6H19m-12 0a1 1 0 11-2 0 1 1 0 012 0zm12 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                        @php
                            $cantidad = session('carrito') ? array_sum(array_column(session('carrito'), 'cantidad')) : 0;
                        @endphp
                        @if ($cantidad > 0)
                            <span class="absolute -top-2 -right-2 bg-gold text-dark text-xs font-bold rounded-full px-2 py-0.5">{{ $cantidad }}</span>
                        @endif
                    </a>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="text-gold hover:text-yellow-500 transition-colors">Iniciar Sesión</a></li>
            @endauth
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gold hover:text-yellow-500 transition-colors">
                        <i class="fas fa-right-from-bracket text-lg"></i>
                    </button>
                </form>
            </li>
        </ul>

        <!-- Menú Mobile -->
        <div class="flex items-center gap-2 md:hidden">
            <button id="searchBtnMobile" class="p-2 bg-medium-gray rounded-full hover:bg-dark-gray transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300" viewBox="0 0 512 512">
                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                        stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                        stroke-width="32" d="M338.29 338.29L448 448" />
                </svg>
            </button>
            <input type="text" placeholder="Buscar..." id="searchInputMobile"
                class="absolute top-full right-0 mt-2 w-64 px-4 py-2 rounded-full bg-medium-gray text-gray-100 transition-all duration-300 ease-out opacity-0 pointer-events-none focus:opacity-100 focus:pointer-events-auto focus:ring-2 focus:ring-gold" />

            <button id="menuBtn" class="bg-gold text-dark px-4 py-2 rounded-lg font-bold">☰</button>
        </div>
    </div>

    <!-- Menú Mobile Links -->
    <ul id="mobileMenu"
        class="hidden flex-col gap-4 p-6 text-sm font-medium uppercase tracking-wider md:hidden bg-dark-gray/95 border-t border-gold/20 font-body">
        <li><a href="{{ url('/') }}" class="hover:text-gold transition-colors block">Inicio</a></li>
        <li><a href="{{ route('productos') }}" class="hover:text-gold transition-colors block">Productos</a></li>
        <li><a href="{{ route('reservas') }}" class="hover:text-gold transition-colors block">Reservas</a></li>
        <li><a href="{{ route('contacto') }}" class="hover:text-gold transition-colors block">Contacto</a></li>
        @auth
            @if (auth()->user()->is_admin)
                <li><a href="{{ route('admin.panel') }}"
                        class="text-gold hover:text-yellow-500 transition-colors font-semibold block">Panel de
                        Administración</a></li>
            @endif
        @endauth
    </ul>
</nav>
