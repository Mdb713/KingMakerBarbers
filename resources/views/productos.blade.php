<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Tienda de Productos</title>
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
<body class="bg-dark text-gray-100 font-sans">

    @include('layouts.navigation')

    <section class="pt-32 pb-12 bg-gradient-to-br from-dark via-dark-gray to-medium-gray text-center">
        <h1 class="text-5xl font-bold text-gold mb-4">Productos de Peluquería</h1>
        <p class="text-gray-400 text-lg">Descubre nuestros productos premium para el cuidado del cabello y la barba</p>
    </section>

    <div class="max-w-7xl mx-auto px-6 mt-8">

        @if(session('success'))
            <div class="mb-6 bg-green-500 text-white p-4 rounded-lg shadow-lg transition-all">
                {{ session('success') }}
            </div>
        @endif

        <section class="py-16 bg-dark">
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($productos as $producto)
                <div class="bg-medium-gray rounded-2xl p-6 shadow-md hover:shadow-2xl transition-all transform hover:-translate-y-1 hover:scale-105 border border-transparent hover:border-gold/50 relative overflow-hidden group">

                    <div class="absolute inset-0 bg-gradient-to-tr from-gold/20 via-transparent to-gold/20 opacity-0 group-hover:opacity-50 transition-opacity rounded-2xl pointer-events-none"></div>

                    <img src="{{ asset($producto->imagen_url) }}" alt="{{ $producto->nombre }}" class="rounded-lg mb-4 w-full object-cover">
                    <h3 class="text-2xl font-bold text-gold mb-2">{{ $producto->nombre }}</h3>
                    <p class="text-gray-400 mb-4 text-sm">{{ $producto->descripcion }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-gold font-bold text-lg">{{ $producto->precio }}€</span>

                        @auth
                        <form action="{{ route('carrito.agregar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <button type="submit" class="bg-gold text-dark px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition-all shadow-md hover:shadow-lg">
                                Agregar
                            </button>
                        </form>
                        @endauth

                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    @include('layouts.footer')

    <script>
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                } else {
                    entry.target.classList.add('opacity-0', 'translate-y-10');
                    entry.target.classList.remove('opacity-100', 'translate-y-0');
                }
            });
        }, { threshold: 0.2 });
        reveals.forEach((el) => observer.observe(el));
    </script>

</body>
</html>
