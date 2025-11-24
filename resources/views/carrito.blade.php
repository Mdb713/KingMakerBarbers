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
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script>
        emailjs.init('TU_PUBLIC_KEY_EMAILJS'); // Reemplaza con tu Public Key
    </script>
</head>

<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('layouts.navigation')

    <main class="flex-1 pt-32 pb-12 bg-dark">
        <section class="bg-dark text-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <h1 class="text-4xl font-bold text-gold mb-8">Tu Carrito</h1>

                {{-- Mensajes --}}
                @if(session('success'))
                    <div class="mb-6 bg-green-500 text-white p-4 rounded-lg shadow-lg transition-all">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 bg-red-500 text-white p-4 rounded-lg shadow-lg transition-all">
                        {{ session('error') }}
                    </div>
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
                        <h2 class="text-2xl font-bold text-gold">
                            Total: {{ collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) }}€
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

                @else
                    <p class="text-gray-400">Tu carrito está vacío.</p>
                @endif

            </div>
        </section>
    </main>

    {{-- Modal de Pago --}}
    <div id="modalPago" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
        <div class="bg-dark-gray rounded-xl w-96 p-6 relative">
            <h2 class="text-2xl font-bold text-gold mb-4">Selecciona método de pago</h2>
            <form id="formPago">
                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Método de pago:</label>
                    <select id="metodoPago" class="w-full p-2 rounded-lg bg-medium-gray text-gray-100" required>
                        <option value="">-- Selecciona --</option>
                        <option value="tarjeta">Tarjeta de crédito</option>
                        <option value="paypal">PayPal</option>
                        <option value="efectivo">Efectivo</option>
                    </select>
                    <p id="errorPago" class="text-red-500 text-sm mt-1 hidden">Debes seleccionar un método</p>
                </div>

                <div id="formTarjeta" class="hidden">
                    <label class="block text-gray-300 mb-1">Número de tarjeta:</label>
                    <input type="text" name="num_tarjeta" class="w-full p-2 rounded-lg mb-2 bg-medium-gray text-gray-100" required pattern="\d{16}" placeholder="1234567812345678">
                    <label class="block text-gray-300 mb-1">Fecha de expiración:</label>
                    <input type="text" name="fecha_exp" class="w-full p-2 rounded-lg mb-2 bg-medium-gray text-gray-100" required pattern="\d{2}/\d{2}" placeholder="MM/AA">
                    <label class="block text-gray-300 mb-1">CVV:</label>
                    <input type="text" name="cvv" class="w-full p-2 rounded-lg mb-2 bg-medium-gray text-gray-100" required pattern="\d{3}" placeholder="123">
                </div>

                <div id="formPayPal" class="hidden">
                    <label class="block text-gray-300 mb-1">Correo PayPal:</label>
                    <input type="email" name="paypal_email" class="w-full p-2 rounded-lg mb-2 bg-medium-gray text-gray-100" placeholder="ejemplo@paypal.com" required>
                </div>

                <div id="formEfectivo" class="hidden text-gray-300">
                    <p>Pagarás en efectivo al recibir tu pedido.</p>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" id="cancelarPago" class="px-4 py-2 bg-gray-500 rounded-lg hover:bg-gray-600 text-white">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-gold rounded-lg hover:bg-yellow-500 text-dark font-bold">Confirmar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    <script>
        // Variables globales
        const carritoJS = @json($carrito);
        const totalJS = {{ collect($carrito)->sum(fn($p) => $p['precio'] * $p['cantidad']) }};
        const emailCliente = "@auth{{ auth()->user()->email }}@endauth";

        // Animación reveal
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                } else {
                    entry.target.classList.add('opacity-0', 'translate-y-10');
                    entry.target.classList.remove('opacity-100', 'translate-y-0');
                }
            });
        }, { threshold: 0.2 });
        reveals.forEach(el => observer.observe(el));

        // Elementos del DOM
        const btnVaciar = document.getElementById('btnVaciarCarrito');
        const btnPagar = document.getElementById('btnPagar');
        const modalPago = document.getElementById('modalPago');
        const cancelarPago = document.getElementById('cancelarPago');
        const formPago = document.getElementById('formPago');
        const metodoPago = document.getElementById('metodoPago');
        const errorPago = document.getElementById('errorPago');
        const formTarjeta = document.getElementById('formTarjeta');
        const formPayPal = document.getElementById('formPayPal');
        const formEfectivo = document.getElementById('formEfectivo');

        // Vaciar carrito
        btnVaciar?.addEventListener('click', () => {
            if(!confirm("¿Seguro que quieres vaciar el carrito?")) return;
            fetch("{{ route('carrito.vaciar') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            }).then(() => location.reload());
        });

        // Abrir modal pago
        btnPagar?.addEventListener('click', () => modalPago.classList.remove('hidden'));
        cancelarPago?.addEventListener('click', () => {
            modalPago.classList.add('hidden');
            errorPago.classList.add('hidden');
            metodoPago.value = "";
            formTarjeta.classList.add('hidden');
            formPayPal.classList.add('hidden');
            formEfectivo.classList.add('hidden');
        });

        // Cambiar formulario según método de pago
        metodoPago?.addEventListener('change', () => {
            formTarjeta.classList.add('hidden');
            formPayPal.classList.add('hidden');
            formEfectivo.classList.add('hidden');
            if (metodoPago.value === 'tarjeta') formTarjeta.classList.remove('hidden');
            else if (metodoPago.value === 'paypal') formPayPal.classList.remove('hidden');
            else if (metodoPago.value === 'efectivo') formEfectivo.classList.remove('hidden');
        });

        // Submit pago
        formPago?.addEventListener('submit', e => {
            e.preventDefault();
            if (!metodoPago.value) {
                errorPago.classList.remove('hidden');
                return;
            }
            errorPago.classList.add('hidden');

            // Validar campos
            let inputs = [];
            if (metodoPago.value === 'tarjeta') inputs = formTarjeta.querySelectorAll('input');
            else if (metodoPago.value === 'paypal') inputs = formPayPal.querySelectorAll('input');

            for (let input of inputs) {
                if (!input.checkValidity()) {
                    alert('Completa correctamente los campos.');
                    return;
                }
            }

            // Enviar EmailJS
            emailjs.send('TU_SERVICE_ID', 'TU_TEMPLATE_ID', {
                metodo: metodoPago.value,
                carrito: JSON.stringify(carritoJS),
                total: totalJS,
                emailCliente: emailCliente
            }).then(() => {
                alert("Pago realizado y factura enviada.");
                modalPago.classList.add('hidden');

                // Vaciar carrito
                fetch("{{ route('carrito.vaciar') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                }).then(() => location.reload());
            }).catch(err => alert("Error al enviar factura: " + (err.text || err)));
        });
    </script>

</body>
</html>
