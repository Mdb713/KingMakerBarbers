@extends('layouts.app')

@section('content')
    <section class="relative pt-32 pb-12 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-dark via-dark-gray to-medium-gray"></div>
        <div class="absolute inset-0 opacity-5"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23D4AF37\" fill-opacity=\"1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <div class="relative max-w-7xl mx-auto px-6">
            <div class="text-center mb-8">
                <h1 class="text-5xl md:text-6xl font-heading text-gold mb-4 drop-shadow-2xl">Valoraciones</h1>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Descubre lo que nuestros clientes opinan sobre nuestro servicio
                </p>
            </div>
            <div class="grid md:grid-cols-4 gap-6 mt-12">
                <div class="bg-medium-gray/50 backdrop-blur-sm p-6 rounded-xl border border-gold/20 text-center">
                    <div class="text-4xl font-bold text-gold mb-2">4.8</div>
                    <div class="text-sm text-gray-400">Calificación promedio</div>
                    <div class="flex justify-center gap-1 mt-2">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                </div>

                <div class="bg-medium-gray/50 backdrop-blur-sm p-6 rounded-xl border border-gold/20 text-center">
                    <div class="text-4xl font-bold text-gold mb-2">{{ $valoraciones->total() }}</div>
                    <div class="text-sm text-gray-400">Reseñas totales</div>
                </div>

                <div class="bg-medium-gray/50 backdrop-blur-sm p-6 rounded-xl border border-gold/20 text-center">
                    <div class="text-4xl font-bold text-gold mb-2">98%</div>
                    <div class="text-sm text-gray-400">Clientes satisfechos</div>
                </div>

                <div class="bg-medium-gray/50 backdrop-blur-sm p-6 rounded-xl border border-gold/20 text-center">
                    <div class="text-4xl font-bold text-gold mb-2">{{ count($peluqueros) }}</div>
                    <div class="text-sm text-gray-400">Profesionales</div>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 py-12">

        @auth
            <div class="bg-medium-gray p-8 rounded-2xl mb-12 border border-gold/20 shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gold/10 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-heading text-gold">Comparte tu experiencia</h3>
                        <p class="text-gray-400 text-sm">Tu opinión nos ayuda a mejorar</p>
                    </div>
                </div>

                <form action="{{ route('valoraciones.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-gray-300 font-semibold block mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Selecciona Profesional
                            </label>
                            <select name="peluquero_id" required
                                class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold focus:outline-none transition-all">
                                <option value="">-- Elige un profesional --</option>
                                @foreach ($peluqueros as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }} {{ $p->apellidos ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="text-gray-300 font-semibold block mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Calificación
                            </label>
                            <div class="flex gap-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label class="flex-1">
                                        <input type="radio" name="calificacion" value="{{ $i }}" required
                                            class="hidden peer">
                                        <div
                                            class="bg-dark-gray border-2 border-gold/20 rounded-lg p-3 text-center cursor-pointer transition-all peer-checked:bg-gold peer-checked:border-gold peer-checked:text-dark hover:border-gold/50">
                                            <div class="text-2xl font-bold">{{ $i }}</div>
                                            <div class="text-xs">estrella{{ $i > 1 ? 's' : '' }}</div>
                                        </div>
                                    </label>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-300 font-semibold block mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            Comentario (opcional)
                        </label>
                        <textarea name="comentario" rows="4"
                            class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold focus:outline-none transition-all resize-none"
                            placeholder="Cuéntanos sobre tu experiencia..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full md:w-auto bg-gold hover:bg-yellow-500 text-dark font-bold px-8 py-4 rounded-lg transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                        <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Enviar Valoración
                    </button>
                </form>
            </div>
        @else
            <div class="bg-medium-gray/50 border border-gold/20 rounded-2xl p-8 mb-12 text-center">
                <svg class="w-16 h-16 text-gold mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-300 mb-2">¿Quieres dejar una valoración?</h3>
                <p class="text-gray-400 mb-6">Inicia sesión para compartir tu experiencia con nosotros</p>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center gap-2 bg-gold hover:bg-yellow-500 text-dark font-bold px-6 py-3 rounded-lg transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Iniciar Sesión
                </a>
            </div>
        @endauth

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
            <h2 class="text-2xl font-heading text-gold">Todas las Valoraciones</h2>

            <div class="flex gap-3">
                <select
                    class="bg-medium-gray border border-gold/20 rounded-lg px-4 py-2 text-gray-100 text-sm focus:border-gold focus:outline-none">
                    <option>Más recientes</option>
                    <option>Mejor valoradas</option>
                    <option>Peor valoradas</option>
                </select>

                <select
                    class="bg-medium-gray border border-gold/20 rounded-lg px-4 py-2 text-gray-100 text-sm focus:border-gold focus:outline-none">
                    <option>Todos los profesionales</option>
                    @foreach ($peluqueros as $p)
                        <option>{{ $p->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="space-y-6">
            @forelse($valoraciones as $v)
                <div
                    class="bg-medium-gray rounded-2xl p-6 border border-gold/10 hover:border-gold/30 transition-all group">
                    <div class="flex flex-col md:flex-row md:items-start gap-6">

                        <div class="flex items-start gap-4 md:w-1/4">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-gold to-yellow-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-dark font-bold text-lg">
                                    {{ strtoupper(substr($v->cliente->nombre, 0, 1)) }}{{ strtoupper(substr($v->cliente->apellidos, 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-100">{{ $v->cliente->nombre }}
                                    {{ $v->cliente->apellidos }}</h4>
                                <p class="text-sm text-gray-500">Cliente verificado</p>
                            </div>
                        </div>

                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <div class="flex gap-1">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg class="w-5 h-5 {{ $i < $v->calificacion ? 'text-gold' : 'text-gray-600' }}"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-sm text-gray-400">{{ $v->calificacion }}.0</span>
                                    </div>
                                    <p class="text-sm text-gray-400">
                                        Atendido por <span
                                            class="text-gold font-semibold">{{ $v->peluquero->nombre }}</span>
                                    </p>
                                </div>

                                <span class="text-sm text-gray-500">{{ $v->created_at->diffForHumans() }}</span>
                            </div>

                            @if ($v->comentario)
                                <p class="text-gray-300 leading-relaxed">{{ $v->comentario }}</p>
                            @else
                                <p class="text-gray-500 italic">Sin comentario adicional</p>
                            @endif

                            <div class="flex gap-4 mt-4 pt-4 border-t border-gold/10">
                                <button
                                    class="text-sm text-gray-400 hover:text-gold transition-colors flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    Útil
                                </button>
                                <button
                                    class="text-sm text-gray-400 hover:text-gold transition-colors flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    Responder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20">
                    <svg class="w-24 h-24 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <h3 class="text-2xl font-heading text-gray-400 mb-2">Aún no hay valoraciones</h3>
                    <p class="text-gray-500">Sé el primero en compartir tu experiencia</p>
                </div>
            @endforelse
        </div>
        <div class="mt-12">
            {{ $valoraciones->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
