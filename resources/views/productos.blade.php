@extends('layouts.app')

@section('content')
    <style>
        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-image {
            transition: transform 0.4s ease;
        }
    </style>

    <section class="pt-32 pb-16 relative overflow-hidden bg-dark"style="background: url('{{ asset('images/fondo3.webp') }}') center/cover no-repeat;">
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/50 to-black/90"></div>


        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-heading text-gold mb-6 drop-shadow-2xl">Nuestros Productos</h1>
            <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-8">
                Productos premium seleccionados por expertos para el cuidado profesional de tu cabello y barba
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mt-8">
                <div class="relative w-full sm:w-96">
                    <input type="text" id="searchProduct" placeholder="Buscar productos..."
                        class="w-full px-6 py-3 rounded-full bg-medium-gray border border-gold/20 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-gold transition-all">
                    <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 py-12 relative z-10">

        @if (session('success'))
            <div
                class="mb-8 bg-green-500/20 border border-green-500 text-green-400 p-4 rounded-xl shadow-lg flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <section>
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-heading text-gold">Catálogo Completo</h2>
                    <p class="text-gray-400 text-sm mt-1">{{ count($productos) }} productos disponibles</p>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($productos as $producto)
                    <div
                        class="product-card bg-medium-gray rounded-xl overflow-hidden border border-gold/10 hover:border-gold/30 hover:shadow-2xl group">

                        <div class="relative overflow-hidden bg-dark-gray aspect-square">
                            <img src="{{ asset($producto->imagen_url) }}" alt="{{ $producto->nombre }}"
                                class="product-image w-full h-full object-cover">

                            @if ($producto->stock > 0)
                                <div
                                    class="absolute top-3 right-3 bg-green-500/90 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    En stock
                                </div>
                            @else
                                <div
                                    class="absolute top-3 right-3 bg-red-500/90 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    Sin stock
                                </div>
                            @endif
                        </div>


                        <div class="p-5">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Cuidado del cabello</span>

                            <h3 class="text-lg font-semibold text-gray-100 mt-2 mb-2 line-clamp-1">
                                {{ $producto->nombre }}
                            </h3>

                            <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                                {{ $producto->descripcion }}
                            </p>

                            <div class="flex items-center gap-1 mb-4">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < 4 ? 'text-gold' : 'text-gray-600' }}" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <span class="text-xs text-gray-500 ml-1">(24)</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-gold">{{ $producto->precio }}€</span>
                                </div>

                                @auth
                                    <form action="{{ route('carrito.agregar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <button type="submit"
                                            class="bg-gold hover:bg-yellow-500 text-dark px-5 py-2.5 rounded-lg font-semibold transition-all shadow-md hover:shadow-lg flex items-center gap-2 group"
                                            @if ($producto->stock <= 0) disabled class="opacity-50 cursor-not-allowed" @endif>
                                            <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Agregar
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="bg-gold hover:bg-yellow-500 text-dark px-5 py-2.5 rounded-lg font-semibold transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Login
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($productos) === 0)
                <div class="text-center py-20">
                    <svg class="w-24 h-24 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="text-2xl font-heading text-gray-400 mb-2">No hay productos disponibles</h3>
                    <p class="text-gray-500">Pronto añadiremos nuevos productos a nuestro catálogo</p>
                </div>
            @endif
        </section>
    </div>

    <script>
        const searchInput = document.getElementById('searchProduct');
        const productCards = document.querySelectorAll('.product-card');

        searchInput?.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();

            productCards.forEach(card => {
                const productName = card.querySelector('h3').textContent.toLowerCase();
                const productDesc = card.querySelector('p').textContent.toLowerCase();

                if (productName.includes(searchTerm) || productDesc.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
@endsection
