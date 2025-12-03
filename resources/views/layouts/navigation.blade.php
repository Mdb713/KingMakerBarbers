<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KingMaker Barbers</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    },
                    fontFamily: {
                        heading: ['Rye', 'cursive'],
                        body: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Rye&display=swap"
        rel="stylesheet">

    <script src="{{ asset('js/footer.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>

<body class="bg-dark text-gray-100 font-body">

    <nav class="bg-dark-gray/95 backdrop-blur-sm shadow-2xl fixed top-0 left-0 w-full z-50 border-b border-gold/20 font-body">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="w-14 h-14 bg-gradient-to-br from-gold to-yellow-600 rounded-lg flex items-center justify-center transform group-hover:rotate-6 transition-transform">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-auto">
                </div>
                <h1 class="text-3xl font-heading">
                    <span class="text-gold">KingMaker</span><span class="text-white">Barbers</span>
                </h1>
            </a>

            <ul class="hidden md:flex gap-8 text-sm font-medium uppercase tracking-wider items-center">
                <li><a href="{{ url('/') }}" class="hover:text-gold transition-colors">Inicio</a></li>
                <li><a href="{{ route('productos') }}" class="hover:text-gold transition-colors">Productos</a></li>
                <li><a href="{{ route('reservas') }}" class="hover:text-gold transition-colors">Reservas</a></li>
                <li><a href="{{ route('contacto') }}" class="hover:text-gold transition-colors">Contacto</a></li>

                @auth
                    @if (auth()->user()->is_admin)
                        <li><a href="{{ route('admin.panel') }}" class="text-gold hover:text-yellow-500 transition-colors font-semibold">Panel</a></li>
                    @endif
                    <li><a href="{{ route('perfil.index') }}" class="text-gold hover:text-yellow-500 transition-colors">Perfil</a></li>

                    <li class="relative">
                        <a href="{{ route('carrito.ver') }}" class="hover:text-gold transition-colors flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gold" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6H19m-12 0a1 1 0 11-2 0 1 1 0 012 0zm12 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                            @php
                                $cantidad = session('carrito')
                                    ? array_sum(array_column(session('carrito'), 'cantidad'))
                                    : 0;
                            @endphp
                            @if ($cantidad > 0)
                                <span class="absolute -top-2 -right-2 bg-gold text-dark text-xs font-bold rounded-full px-2 py-0.5">{{ $cantidad }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="flex items-center">
                        <button id="logoutBtn" class="text-gold hover:text-yellow-500 transition-colors flex items-center justify-center h-10 w-10">
                            <i class="fas fa-right-from-bracket text-lg"></i>
                        </button>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="text-gold hover:text-yellow-500 transition-colors">Iniciar Sesión</a></li>
                @endauth

                <li class="flex items-center relative">
                    <button id="searchBtnDesktop" class="p-2 bg-medium-gray rounded-full hover:bg-dark-gray transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 512 512">
                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                                stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="32" d="M338.29 338.29L448 448" />
                        </svg>
                    </button>
                    <input type="text" placeholder="Buscar..." id="searchInputDesktop"
                        class="absolute top-full right-0 mt-2 w-64 px-4 py-2 rounded-full bg-medium-gray text-gray-100 transition-all duration-300 ease-out opacity-0 pointer-events-none focus:opacity-100 focus:pointer-events-auto focus:ring-2 focus:ring-gold" />
                </li>
            </ul>

            <div class="flex items-center gap-2 md:hidden">
                <button id="searchBtnMobile" class="p-2 bg-medium-gray rounded-full hover:bg-dark-gray transition-colors flex items-center justify-center z-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 512 512">
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

        <ul id="mobileMenu"
            class="hidden flex-col gap-4 p-6 text-sm font-medium uppercase tracking-wider md:hidden bg-dark-gray/95 border-t border-gold/20 font-body">
            <li><a href="{{ url('/') }}" class="hover:text-gold transition-colors block">Inicio</a></li>
            <li><a href="{{ route('productos') }}" class="hover:text-gold transition-colors block">Productos</a></li>
            <li><a href="{{ route('reservas') }}" class="hover:text-gold transition-colors block">Reservas</a></li>
            <li><a href="{{ route('contacto') }}" class="hover:text-gold transition-colors block">Contacto</a></li>
            @auth
                @if (auth()->user()->is_admin)
                    <li><a href="{{ route('admin.panel') }}" class="text-gold hover:text-yellow-500 transition-colors font-semibold block">Panel</a></li>
                @endif
            @endauth
        </ul>
    </nav>

    <script>

        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        menuBtn?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const searchBtnDesktop = document.getElementById('searchBtnDesktop');
        const searchInputDesktop = document.getElementById('searchInputDesktop');
        const searchBtnMobile = document.getElementById('searchBtnMobile');
        const searchInputMobile = document.getElementById('searchInputMobile');

        const toggleInput = (btn, input) => {
            btn?.addEventListener('click', () => {
                input.classList.toggle('opacity-0');
                input.classList.toggle('pointer-events-none');
                input.focus();
            });
        }

        toggleInput(searchBtnDesktop, searchInputDesktop);
        toggleInput(searchBtnMobile, searchInputMobile);

        const handleSearch = (query) => {
            query = query.toLowerCase().trim();
            const routes = [
                { keywords: ['productos','producto','barba','cabello','shampoo','aceite'], url:'/productos' },
                { keywords: ['reservas','cita','horario'], url:'/reservas' },
                { keywords: ['contacto','mensaje','soporte'], url:'/contacto' },
                { keywords: ['perfil','usuario','cuenta'], url:'/perfil' },
                { keywords: ['inicio','home'], url:'/' },
                 { keywords: ['carro','carrito,pedido'], url:'/carrito' }
            ];

            let found = false;
            for (let route of routes) {
                for (let word of route.keywords) {
                    if (query.includes(word)) {
                        window.location.href = route.url;
                        found = true;
                        break;
                    }
                }
                if (found) break;
            }

            if (!found) {
                window.location.href = `/?search=${encodeURIComponent(query)}`;
            }
        }

        [searchInputDesktop, searchInputMobile].forEach(input => {
            input?.addEventListener('keypress', e => {
                if (e.key === 'Enter') handleSearch(e.target.value);
            });
        });

        document.getElementById('logoutBtn')?.addEventListener('click', function() {
            fetch("{{ route('logout') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
            }).then(() => {
                window.location.href = "{{ url('/') }}";
            });
        });
    </script>
</body>
