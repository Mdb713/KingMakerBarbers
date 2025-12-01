@extends('layouts.navigation')

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Reservar Cita</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Rye&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-dark text-gray-100 font-body">

    <!-- SECCIÓN ENCABEZADO -->
    <section class="pt-32 pb-16 bg-gradient-to-br from-dark via-dark-gray to-medium-gray relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10" data-aos="fade-up">
            <span class="text-gold text-sm font-bold uppercase tracking-widest font-body">Agenda tu Visita</span>
            <h1 class="text-6xl font-heading mt-4 mb-6">Reserva tu <span class="text-gold">Cita</span></h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto font-body">
                Selecciona el servicio y horario para tu próxima visita
            </p>
        </div>
    </section>

    <!-- FORMULARIO DE RESERVA -->
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- FORMULARIO -->
                <div class="lg:col-span-2 bg-medium-gray rounded-3xl border border-gold/10 p-8 md:p-10" data-aos="fade-right">
                    <h2 class="text-3xl font-heading mb-2 text-gold">Completa tu Reserva</h2>
                    <p class="text-gray-400 mb-8 font-body">Elige tu servicio y horario preferido</p>

                    @if(session('success'))
                        <div class="bg-green-600 p-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('reservas.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- SERVICIOS -->
                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Servicio</label>
                            <select name="servicio" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition font-body">
                                <option value="">Selecciona un servicio</option>
                                <option value="corte">Corte de pelo - 25€</option>
                                <option value="barba">Arreglo de barba - 15€</option>
                                <option value="completo">Servicio completo - 35€</option>
                            </select>
                        </div>

                        <!-- PELUQUERO -->
                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Barbero (Opcional)</label>
                            <select name="peluquero_id" class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition font-body">
                                <option value="">Sin preferencia</option>
                                @foreach($peluqueros as $peluquero)
                                    <option value="{{ $peluquero->id }}">{{ $peluquero->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- FECHA Y HORA -->
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Fecha</label>
                                <input type="date" name="fecha" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Hora</label>
                                <select name="hora" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none">
                                    <option value="">Selecciona una hora</option>
                                    @foreach(['09:00','10:00','11:00','12:00','13:00','16:00','17:00','18:00','19:00','20:00'] as $hora)
                                        <option>{{ $hora }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gold text-dark font-heading py-4 rounded-lg hover:bg-yellow-500 transition-all">
                            Confirmar Reserva
                        </button>
                    </form>
                </div>

                <!-- INFORMACIÓN LATERAL -->
                <div data-aos="fade-left" class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                    <h3 class="text-xl font-heading mb-4 text-gold">Información</h3>
                    <p class="text-gray-400 text-sm font-body">Calle Real 25, Sevilla</p>
                </div>

            </div>
        </div>
    </section>

    @extends('layouts.footer')
</body>
</html>
@endsection
