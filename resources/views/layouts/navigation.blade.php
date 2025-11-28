<nav class="bg-dark-gray/95 backdrop-blur-sm shadow-2xl fixed top-0 left-0 w-full z-50 border-b border-gold/20">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-4 group">
<div class="w-20 h-20 bg-gradient-to-br from-gold to-yellow-600 rounded-xl flex items-center justify-center transform group-hover:rotate-6 transition-transform">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain scale-125">
</div>


            <h1 class="text-4xl font-bold">
                <span class="text-gold">KingMaker</span><span class="text-white">Barbers</span>
            </h1>
        </a>

        <ul class="hidden md:flex gap-8 text-sm font-medium uppercase tracking-wider items-center">
            <li><a href="{{ url('/') }}" class="hover:text-gold transition-colors">Inicio</a></li>
            <li><a href="{{ route('nosotros') }}" class="hover:text-gold transition-colors">Nosotros</a></li>
            <li><a href="{{ route('productos') }}" class="hover:text-gold transition-colors">Productos</a></li>
            <li><a href="{{ route('reservas') }}" class="hover:text-gold transition-colors">Reservas</a></li>
            <li><a href="{{ route('contacto') }}" class="hover:text-gold transition-colors">Contacto</a></li>

            @auth
                <li><a href="{{ route('perfil') }}" class="text-gold hover:text-yellow-500 transition-colors">Perfil</a></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gold hover:text-yellow-500 transition-colors font-semibold">
                            Cerrar Sesión
                        </button>
                    </form>
                </li>

                <li class="relative">
                    <a href="{{ route('carrito.ver') }}" class="hover:text-gold transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6H19m-12 0a1 1 0 11-2 0 1 1 0 012 0zm12 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>

                        @php
                            $cantidad = session('carrito') ? array_sum(array_column(session('carrito'), 'cantidad')) : 0;
                        @endphp
                        @if($cantidad > 0)
                            <span class="absolute -top-2 -right-2 bg-gold text-dark text-xs font-bold rounded-full px-2 py-0.5">{{ $cantidad }}</span>
                        @endif
                    </a>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="text-gold hover:text-yellow-500 transition-colors">Iniciar Sesión</a></li>
            @endauth
        </ul>

        <button class="md:hidden bg-gold text-dark px-4 py-2 rounded-lg font-bold">☰</button>
    </div>
</nav>
