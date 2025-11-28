<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Carrito de Compras</title>
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
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
</head>

<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col">

    @include('layouts.navigation')

    <main class="flex-1 pt-32 pb-12 bg-dark">
        <section class="bg-dark text-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <h1 class="text-4xl font-bold text-gold mb-8">Tu Carrito</h1>

                {{-- Mensajes --}}
                @if (session('success'))
                    <div class="mb-6 bg-green-500 text-white p-4 rounded-lg shadow-lg">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="mb-6 bg-red-500 text-white p-4 rounded-lg shadow-lg">{{ session('error') }}</div>
                @endif

                @if (count($carrito) > 0)
                    <!-- Botón Vaciar Carrito -->
                    <div class="flex justify-end mb-4 gap-2">
                        <button id="btnVaciarCarrito"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-lg transition-all shadow">
                            Vaciar Carrito
                        </button>
                    </div>

                    <!-- Productos -->
                    <div class="grid md:grid-cols-1 gap-6">
                        @foreach ($carrito as $id => $producto)
                            <div class="bg-medium-gray p-6 rounded-2xl flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset($producto['imagen_url']) }}" alt="{{ $producto['nombre'] }}"
                                        class="w-24 h-24 rounded-lg">
                                    <div>
                                        <h3 class="text-xl font-bold text-gold">{{ $producto['nombre'] }}</h3>
                                        <p class="text-gray-400">Cantidad: {{ $producto['cantidad'] }}</p>
                                        <p class="text-gray-400">Precio: {{ $producto['precio'] }}€</p>
                                    </div>
                                </div>
                                <form action="{{ route('carrito.eliminar') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $id }}">
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg">Eliminar</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <!-- Total y botón Pagar -->
                    <div class="mt-8 text-right">
                        <h2 id="totalCarrito" class="text-2xl font-bold text-gold">
                            {{ collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) }}€
                        </h2>

                        @auth
                            <button id="btnPagar"
                                class="mt-4 bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3 rounded-lg transition-all shadow-lg">
                                Pagar
                            </button>
                        @else
                            <p class="mt-4 text-gray-400">Debes iniciar sesión para poder pagar.</p>
                        @endauth
                    </div>

                    {{-- Inputs ocultos para JS --}}
                    <input type="hidden" id="carritoData" value='@json($carrito)'>
                    @auth
                        <input type="hidden" id="emailCliente" value="{{ auth()->user()->email }}">
                        <input type="hidden" id="clienteNombre"
                            value="{{ auth()->user()->nombre }} {{ auth()->user()->apellidos }}">
                    @endauth
                    <input type="hidden" id="totalCarritoInput"
                        value='{{ collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) }}'>
                @else
                    <p class="text-gray-400">Tu carrito está vacío.</p>
                @endif
            </div>
        </section>
    </main>

    @include('layouts.footer')

    {{-- JS --}}
    @vite('resources/js/carrito.js')

</body>

</html>
