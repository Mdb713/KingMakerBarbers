<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KingMaker Barbers - Carrito de Compras</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Rye&display=swap"
        rel="stylesheet">

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
                        sans: ['Poppins', 'sans-serif'],
                        title: ['Rye', 'cursive'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col">

    @include('layouts.navigation')

    <main class="flex-1 pt-32 pb-12 bg-dark">
        <section class="bg-dark text-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-4xl font-title font-bold text-gold">Carrito de Compras</h1>
                    <a href="{{ route('productos') }}"
                        class="text-gold hover:text-yellow-500 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Seguir comprando
                    </a>
                </div>

                @if (session('success'))
                    <div
                        class="mb-6 bg-green-500/20 border border-green-500 text-green-400 p-4 rounded-lg shadow-lg transition-all">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div
                        class="mb-6 bg-red-500/20 border border-red-500 text-red-400 p-4 rounded-lg shadow-lg transition-all">
                        {{ session('error') }}
                    </div>
                @endif

                @if (count($carrito) > 0)
                    <div class="grid lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2 space-y-4">
                            <div class="bg-medium-gray p-6 rounded-xl border border-gold/10">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-xl font-semibold text-gold">Productos ({{ count($carrito) }})</h2>
                                    <button id="btnVaciarCarrito"
                                        class="text-red-400 hover:text-red-300 text-sm transition-colors flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Vaciar carrito
                                    </button>
                                </div>

                                <div class="space-y-4">
                                    @foreach ($carrito as $id => $producto)
                                        <div
                                            class="bg-dark-gray p-4 rounded-lg flex items-center gap-4 hover:bg-dark-gray/70 transition-all border border-gold/5">
                                            <img src="{{ asset($producto['imagen_url']) }}"
                                                alt="{{ $producto['nombre'] }}"
                                                class="w-20 h-20 rounded-lg object-cover">

                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-gray-100">
                                                    {{ $producto['nombre'] }}</h3>
                                                <p class="text-sm text-gray-400 mt-1">Precio unitario: <span
                                                        class="text-gold">{{ $producto['precio'] }}€</span></p>
                                                <div class="flex items-center gap-3 mt-2">
                                                    <span class="text-sm text-gray-400">Cantidad:</span>
                                                    <div
                                                        class="flex items-center gap-2 bg-medium-gray rounded-lg px-3 py-1">
                                                        <button
                                                            class="text-gray-400 hover:text-gold transition-colors">-</button>
                                                        <span
                                                            class="text-gold font-semibold w-8 text-center">{{ $producto['cantidad'] }}</span>
                                                        <button
                                                            class="text-gray-400 hover:text-gold transition-colors">+</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <p class="text-xl font-bold text-gold">
                                                    {{ $producto['precio'] * $producto['cantidad'] }}€</p>
                                                <form action="{{ route('carrito.eliminar') }}" method="POST"
                                                    class="mt-2">
                                                    @csrf
                                                    <input type="hidden" name="producto_id"
                                                        value="{{ $id }}">
                                                    <button type="submit"
                                                        class="text-red-400 hover:text-red-300 text-sm transition-colors flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="bg-medium-gray p-6 rounded-xl border border-gold/10 sticky top-32">
                                <h2 class="text-2xl font-title font-bold text-gold mb-6">Resumen del Pedido</h2>

                                <div class="space-y-3 mb-6 pb-6 border-b border-gold/10">
                                    <div class="flex justify-between text-gray-300">
                                        <span>Subtotal:</span>
                                        <span>{{ collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) }}€</span>
                                    </div>
                                    <div class="flex justify-between text-gray-300">
                                        <span>Envío:</span>
                                        <span class="text-green-400">Gratis</span>
                                    </div>
                                    <div class="flex justify-between text-gray-300">
                                        <span>IVA (21%):</span>
                                        <span>{{ number_format(collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) * 0.21, 2) }}€</span>
                                    </div>
                                </div>

                                <div class="mb-6 pb-6 border-b border-gold/10">
                                    <div class="flex justify-between items-center">
                                        <span class="text-xl font-semibold">Total:</span>
                                        <span
                                            class="text-3xl font-bold text-gold">{{ number_format(collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) * 1.21, 2) }}€</span>
                                    </div>
                                </div>

                                @auth
                                    <div class="space-y-4 mb-6">
                                        <label class="block text-gray-300 font-semibold mb-3">Método de pago:</label>

                                        <label
                                            class="flex items-center p-4 bg-dark-gray rounded-lg cursor-pointer hover:bg-dark-gray/70 transition-all border-2 border-transparent has-[:checked]:border-gold">
                                            <input type="radio" name="metodo_pago" value="tarjeta"
                                                class="w-5 h-5 text-gold accent-gold">
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                    </svg>
                                                    <span class="font-semibold">Tarjeta de crédito/débito</span>
                                                </div>
                                            </div>
                                        </label>

                                        <label
                                            class="flex items-center p-4 bg-dark-gray rounded-lg cursor-pointer hover:bg-dark-gray/70 transition-all border-2 border-transparent has-[:checked]:border-gold">
                                            <input type="radio" name="metodo_pago" value="paypal"
                                                class="w-5 h-5 text-gold accent-gold">
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-6 h-6 text-gold" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a3.35 3.35 0 0 0-.607-.541c-.013.076-.026.175-.041.254-.93 4.778-4.005 7.201-9.138 7.201h-2.19a.563.563 0 0 0-.556.479l-1.187 7.527h-.506l-.24 1.516a.56.56 0 0 0 .554.647h3.882c.46 0 .85-.334.922-.788.06-.26.76-4.852.816-5.09a.932.932 0 0 1 .923-.788h.58c3.76 0 6.705-1.528 7.565-5.946.36-1.847.174-3.388-.777-4.471z" />
                                                    </svg>
                                                    <span class="font-semibold">PayPal</span>
                                                </div>
                                            </div>
                                        </label>

                                        <label
                                            class="flex items-center p-4 bg-dark-gray rounded-lg cursor-pointer hover:bg-dark-gray/70 transition-all border-2 border-transparent has-[:checked]:border-gold">
                                            <input type="radio" name="metodo_pago" value="efectivo"
                                                class="w-5 h-5 text-gold accent-gold">
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <span class="font-semibold">Efectivo contra entrega</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <button id="btnPagar"
                                        class="w-full bg-gold hover:bg-yellow-500 text-dark font-bold py-4 rounded-lg transition-all shadow-lg transform hover:scale-105 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        Proceder al Pago
                                    </button>

                                    <p class="text-xs text-gray-400 text-center mt-4">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        Pago 100% seguro y encriptado
                                    </p>
                                @else
                                    <div class="text-center py-8">
                                        <svg class="w-16 h-16 text-gold mx-auto mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <p class="text-gray-400 mb-4">Debes iniciar sesión para continuar con tu compra</p>
                                        <a href="{{ route('login') }}"
                                            class="inline-block bg-gold hover:bg-yellow-500 text-dark font-bold py-3 px-6 rounded-lg transition-all">
                                            Iniciar Sesión
                                        </a>
                                    </div>
                                @endauth
                            </div>

                            <div class="mt-6 bg-medium-gray p-4 rounded-xl border border-gold/10">
                                <div class="flex items-start gap-3 mb-3">
                                    <svg class="w-5 h-5 text-gold mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-sm">Envío gratis</p>
                                        <p class="text-xs text-gray-400">En pedidos superiores a 30€</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-gold mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-sm">Factura digital</p>
                                        <p class="text-xs text-gray-400">Recíbela por email</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-20">
                        <svg class="w-32 h-32 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h2 class="text-2xl font-title text-gray-400 mb-4">Tu carrito está vacío</h2>
                        <p class="text-gray-500 mb-8">Añade productos para comenzar tu compra</p>
                        <a href="{{ route('productos') }}"
                            class="inline-block bg-gold hover:bg-yellow-500 text-dark font-bold py-3 px-8 rounded-lg transition-all">
                            Ver Productos
                        </a>
                    </div>
                @endif

            </div>
        </section>
    </main>

    <div id="modalPago"
        class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 hidden p-4">
        <div class="bg-medium-gray rounded-2xl max-w-md w-full p-8 relative border border-gold/20 shadow-2xl">
            <button id="cerrarModal" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-2xl font-title font-bold text-gold mb-6">Confirmar Datos de Pago</h2>

            <form id="formPago" class="space-y-4">
                <div id="formTarjeta" class="hidden space-y-4">
                    <div>
                        <label class="block text-gray-300 mb-2 text-sm">Número de tarjeta</label>
                        <input type="text" name="num_tarjeta" maxlength="16"
                            class="w-full p-3 rounded-lg bg-dark-gray text-gray-100 border border-gold/20 focus:border-gold focus:outline-none"
                            placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-300 mb-2 text-sm">Fecha exp.</label>
                            <input type="text" name="fecha_exp" maxlength="5"
                                class="w-full p-3 rounded-lg bg-dark-gray text-gray-100 border border-gold/20 focus:border-gold focus:outline-none"
                                placeholder="MM/AA">
                        </div>
                        <div>
                            <label class="block text-gray-300 mb-2 text-sm">CVV</label>
                            <input type="text" name="cvv" maxlength="3"
                                class="w-full p-3 rounded-lg bg-dark-gray text-gray-100 border border-gold/20 focus:border-gold focus:outline-none"
                                placeholder="123">
                        </div>
                    </div>
                </div>

                <div id="formPayPal" class="hidden">
                    <label class="block text-gray-300 mb-2 text-sm">Correo PayPal</label>
                    <input type="email" name="paypal_email"
                        class="w-full p-3 rounded-lg bg-dark-gray text-gray-100 border border-gold/20 focus:border-gold focus:outline-none"
                        placeholder="tu@email.com">
                </div>

                <div id="formEfectivo" class="hidden bg-dark-gray p-4 rounded-lg border border-gold/20">
                    <p class="text-gray-300 text-sm">
                        <svg class="w-5 h-5 text-gold inline mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pagarás en efectivo al recibir tu pedido. Ten preparado el importe exacto.
                    </p>
                </div>

                <div class="flex gap-3 mt-6">
                    <button type="button" id="cancelarPago"
                        class="flex-1 px-4 py-3 bg-gray-600 hover:bg-gray-700 rounded-lg text-white font-semibold transition-all">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 bg-gold hover:bg-yellow-500 rounded-lg text-dark font-bold transition-all">
                        Confirmar Pago
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalVaciar"
        class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-dark-gray text-gray-100 p-6 rounded-2xl shadow-2xl w-80 border border-gold/20">
            <h2 class="text-xl font-title font-bold mb-2 text-gold">¿Vaciar carrito?</h2>
            <p class="text-gray-300 mb-4">Esto eliminará todos los productos del carrito.</p>
            <div class="flex justify-end gap-3">
                <button id="cancelarVaciar"
                    class="px-4 py-2 rounded-xl border border-gray-500 text-gray-300 hover:bg-gray-700 transition">
                    Cancelar
                </button>
                <button id="confirmarVaciar"
                    class="px-4 py-2 rounded-xl bg-red-700 hover:bg-red-800 text-white shadow-md transition">
                    Vaciar
                </button>
            </div>
        </div>
    </div>

    <div id="modalPagoExito"
        class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-dark-gray text-gray-100 p-6 rounded-2xl shadow-2xl w-80 border border-green-500/30 text-center">
            <h2 class="text-2xl font-title font-bold text-green-500 mb-3">¡Pago realizado!</h2>
            <p class="text-gray-300 mb-4">Recibirás tu factura por email.</p>
            <button id="cerrarPagoExito"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-xl shadow-md transition">
                Aceptar
            </button>
        </div>
    </div>

    <div id="modalPagoError"
        class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-dark-gray text-gray-100 p-6 rounded-2xl shadow-2xl w-80 border border-red-500/30 text-center">
            <h2 class="text-2xl font-title font-bold text-red-500 mb-3">Error en el pago</h2>
            <p class="text-gray-300 mb-4">Hubo un problema al procesar el pago. Inténtalo de nuevo.</p>
            <button id="cerrarPagoError"
                class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-xl shadow-md transition">
                Cerrar
            </button>
        </div>
    </div>


    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            emailjs.init('kFWHJhU1kOf5F5X2Q');

            const carritoJS = Object.values(@json($carrito));
            const subtotal = {{ collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) }};
            const total =
                {{ number_format(collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) * 1.21, 2, '.', '') }};
            const emailCliente = @json(auth()->user()->email ?? null);
            const nombreCliente = @json(auth()->user()->nombre ?? 'Cliente');

            const btnPagar = document.getElementById('btnPagar');
            const modalPago = document.getElementById('modalPago');
            const cancelarPago = document.getElementById('cancelarPago');
            const cerrarModal = document.getElementById('cerrarModal');
            const formPago = document.getElementById('formPago');
            const radioMetodos = document.querySelectorAll('input[name="metodo_pago"]');
            const formTarjeta = document.getElementById('formTarjeta');
            const formPayPal = document.getElementById('formPayPal');
            const formEfectivo = document.getElementById('formEfectivo');

            const modalPagoExito = document.getElementById("modalPagoExito");
            const cerrarPagoExito = document.getElementById("cerrarPagoExito");

            const modalPagoError = document.getElementById("modalPagoError");
            const cerrarPagoError = document.getElementById("cerrarPagoError");

            if (!emailCliente) return;

            btnPagar.disabled = true;

            radioMetodos.forEach(radio => {
                radio.addEventListener('change', () => {
                    btnPagar.disabled = false;
                    formTarjeta.classList.add('hidden');
                    formPayPal.classList.add('hidden');
                    formEfectivo.classList.add('hidden');
                });
            });

            btnPagar?.addEventListener('click', () => {
                const metodoSeleccionado = document.querySelector('input[name="metodo_pago"]:checked');
                if (!metodoSeleccionado) {
                    modalPagoError.classList.remove("hidden");
                    return;
                }

                modalPago.classList.remove('hidden');

                if (metodoSeleccionado.value === 'tarjeta') formTarjeta.classList.remove('hidden');
                else if (metodoSeleccionado.value === 'paypal') formPayPal.classList.remove('hidden');
                else if (metodoSeleccionado.value === 'efectivo') formEfectivo.classList.remove('hidden');
            });

            cancelarPago?.addEventListener('click', () => modalPago.classList.add('hidden'));
            cerrarModal?.addEventListener('click', () => modalPago.classList.add('hidden'));

            formPago?.addEventListener('submit', e => {
                e.preventDefault();

                const metodoSeleccionado = document.querySelector('input[name="metodo_pago"]:checked')
                    ?.value;

                let itemsHTML = carritoJS.map(p => `
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">${p.nombre}</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; text-align: center;">${p.cantidad}</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; text-align: right;">${p.precio} €</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd; text-align: right;">${(p.precio * p.cantidad).toFixed(2)} €</td>
            </tr>
        `).join('');

                emailjs.send('service_c2ntdhg', 'template_ipujnwt', {
                    to_email: emailCliente,
                    cliente_nombre: nombreCliente,
                    cliente_email: emailCliente,
                    metodo_pago: metodoSeleccionado,
                    fecha: new Date().toLocaleDateString('es-ES'),
                    items_html: itemsHTML,
                    subtotal: subtotal.toFixed(2),
                    total: total,
                    year: new Date().getFullYear()
                }).then(() => {

                    modalPago.classList.add('hidden');
                    modalPagoExito.classList.remove('hidden');

                    cerrarPagoExito.onclick = () => {
                        modalPagoExito.classList.add("hidden");

                        fetch("{{ route('carrito.vaciar') }}", {
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Accept': 'application/json'
                            }
                        }).then(() => location.reload());
                    };

                }).catch(err => {
                    console.error(err);

                    modalPagoError.classList.remove("hidden");

                    cerrarPagoError.onclick = () => {
                        modalPagoError.classList.add("hidden");
                    };
                });
            });


            document.getElementById('btnVaciarCarrito')?.addEventListener('click', () => {
                document.getElementById("modalVaciar").classList.remove("hidden");
            });

            document.getElementById("cancelarVaciar").addEventListener("click", () => {
                document.getElementById("modalVaciar").classList.add("hidden");
            });

            document.getElementById("confirmarVaciar").addEventListener("click", () => {
                fetch("{{ route('carrito.vaciar') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                        'Accept': 'application/json'
                    }
                }).then(() => location.reload());
            });
        });
    </script>


</body>

</html>
