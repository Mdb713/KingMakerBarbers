@extends('layouts.app')

@section('content')
<section class="pt-32 pb-32 relative overflow-hidden bg-dark"
    style="background: url('{{ asset('images/fondo3.webp') }}') center/cover no-repeat;">
    <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/50 to-black/90"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-center z-10" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-heading text-gold mb-4 drop-shadow-2xl">Valoraciones</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-12">
            Descubre lo que nuestros clientes opinan sobre nuestro servicio
        </p>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-dark-gray/50 backdrop-blur-lg p-6 rounded-xl border border-gold/20 text-center">
                <div class="text-4xl font-bold text-gold mb-2">4.8</div>
                <div class="text-sm text-gray-400">Calificación promedio</div>
            </div>

            <div class="bg-dark-gray/50 backdrop-blur-lg p-6 rounded-xl border border-gold/20 text-center">
                <div class="text-4xl font-bold text-gold mb-2">{{ $valoraciones->total() }}</div>
                <div class="text-sm text-gray-400">Reseñas totales</div>
            </div>

            <div class="bg-dark-gray/50 backdrop-blur-lg p-6 rounded-xl border border-gold/20 text-center">
                <div class="text-4xl font-bold text-gold mb-2">98%</div>
                <div class="text-sm text-gray-400">Clientes satisfechos</div>
            </div>

            <div class="bg-dark-gray/50 backdrop-blur-lg p-6 rounded-xl border border-gold/20 text-center">
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
                    <select name="peluquero_id"
                        class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold focus:outline-none transition-all">
                        <option value="">-- Elige un profesional --</option>
                        @foreach ($peluqueros as $p)
                        <option value="{{ $p->id }}" {{ old('peluquero_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nombre }} {{ $p->apellidos ?? '' }}
                        </option>
                        @endforeach
                    </select>
                    @error('peluquero_id')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
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
                            <input type="radio" name="calificacion" value="{{ $i }}"
                                class="hidden peer" {{ old('calificacion') == $i ? 'checked' : '' }}>
                            <div
                                class="bg-dark-gray border-2 border-gold/20 rounded-lg p-3 text-center cursor-pointer transition-all peer-checked:bg-gold peer-checked:border-gold peer-checked:text-dark hover:border-gold/50">
                                <div class="text-2xl font-bold">{{ $i }}</div>
                                <div class="text-xs">estrella{{ $i > 1 ? 's' : '' }}</div>
                            </div>
                        </label>
                        @endfor
                    </div>
                    @error('calificacion')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
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
                    placeholder="Cuéntanos sobre tu experiencia...">{{ old('comentario') }}</textarea>
                @error('comentario')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full md:w-auto bg-gold hover:bg-yellow-500 text-dark font-bold px-8 py-4 rounded-lg transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                Enviar Valoración
            </button>
        </form>
    </div>
    @else
    <div class="bg-medium-gray/50 border border-gold/20 rounded-2xl p-8 mb-12 text-center">
        <h3 class="text-xl font-semibold text-gray-300 mb-2">¿Quieres dejar una valoración?</h3>
        <p class="text-gray-400 mb-6">Inicia sesión para compartir tu experiencia con nosotros</p>
        <a href="{{ route('login') }}"
            class="inline-flex items-center gap-2 bg-gold hover:bg-yellow-500 text-dark font-bold px-6 py-3 rounded-lg transition-all">
            Iniciar Sesión
        </a>
    </div>
    @endauth

    <form method="GET" class="flex gap-3 mb-6">
        <select name="orden"
            class="bg-medium-gray border border-gold/20 rounded-lg px-4 py-2 text-gray-100 text-sm focus:border-gold focus:outline-none">
            <option value="recientes" {{ request('orden') == 'recientes' ? 'selected' : '' }}>Más recientes</option>
            <option value="mejor" {{ request('orden') == 'mejor' ? 'selected' : '' }}>Mejor valoradas</option>
            <option value="peor" {{ request('orden') == 'peor' ? 'selected' : '' }}>Peor valoradas</option>
        </select>

        <select name="peluquero"
            class="bg-medium-gray border border-gold/20 rounded-lg px-4 py-2 text-gray-100 text-sm focus:border-gold focus:outline-none">
            <option value="todos" {{ request('peluquero') == 'todos' ? 'selected' : '' }}>Todos los profesionales</option>
            @foreach ($peluqueros as $p)
            <option value="{{ $p->id }}" {{ request('peluquero') == $p->id ? 'selected' : '' }}>
                {{ $p->nombre }}
            </option>
            @endforeach
        </select>

        <button type="submit"
            class="bg-gold px-4 py-2 rounded-lg text-dark font-bold hover:bg-yellow-500 transition-all">
            Filtrar
        </button>
    </form>

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
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-20">
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
x
