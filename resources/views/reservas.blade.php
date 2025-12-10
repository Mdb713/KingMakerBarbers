@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <body class="bg-dark text-gray-100 font-body">

        <section class="pt-32 pb-16 relative overflow-hidden bg-dark"
            style="background: url('{{ asset('images/fondo3.webp') }}') center/cover no-repeat;">

            <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/50 to-black/90"></div>


            <div class="max-w-6xl mx-auto px-6 text-center relative z-10" data-aos="fade-up">
                <span class="text-gold text-sm font-bold uppercase tracking-widest font-body">Agenda tu Visita</span>
                <h1 class="text-6xl font-heading mt-4 mb-6">Reserva tu <span class="text-gold">Cita</span></h1>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto font-body">
                    Selecciona el servicio y horario para tu próxima visita
                </p>
            </div>
        </section>

        <section class="py-16 bg-dark">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 bg-medium-gray rounded-3xl border border-gold/10 p-8 md:p-10"
                        data-aos="fade-right">

                        <h2 class="text-3xl font-heading mb-2 text-gold">Completa tu Reserva</h2>
                        <p class="text-gray-400 mb-8 font-body">Elige tu servicio y horario preferido</p>

                        @if (session('success'))
                            <div class="bg-green-600 p-3 rounded mb-4 text-white font-body">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->has('limite'))
                            <div class="bg-red-600 p-3 rounded mb-4 text-white font-body">
                                <strong>{{ $errors->first('limite') }}</strong>
                            </div>
                        @endif


                        <p id="horaOcupadaMsg" class="text-red-500 mb-4 font-bold hidden">La hora seleccionada ya está
                            ocupada. Por favor, elige otra.</p>

                        <form action="{{ route('reservas.store') }}" method="POST" class="space-y-6" id="reservaForm">
                            @csrf

                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Servicio</label>
                                <select name="servicio"
                                    class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition font-body">
                                    <option value="">Selecciona un servicio</option>
                                    <option value="corte">Corte de pelo - 25€</option>
                                    <option value="barba">Arreglo de barba - 15€</option>
                                    <option value="completo">Servicio completo - 35€</option>
                                </select>

                                @error('servicio')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Barbero
                                    (Opcional)</label>
                                <select name="peluquero_id"
                                    class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition font-body">
                                    <option value="">Sin preferencia</option>
                                    @foreach ($peluqueros as $peluquero)
                                        <option value="{{ $peluquero->id }}">
                                            {{ $peluquero->nombre }} {{ $peluquero->apellidos ?? '' }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('peluquero_id')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Fecha</label>
                                    <input id="fechaInput" name="fecha" type="text" placeholder="Selecciona una fecha"
                                        class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none focus:ring-1 focus:ring-gold transition-all cursor-pointer">
                                    @error('fecha')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="text-gray-400 text-sm mb-2 block font-bold font-body">Hora</label>
                                    <select name="hora" id="horaSelect"
                                        class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none">
                                        <option value="">Selecciona una hora</option>
                                        @foreach (['09:00', '10:00', '11:00', '12:00', '13:00', '16:00', '17:00', '18:00', '19:00', '20:00'] as $hora)
                                            <option value="{{ $hora }}">{{ $hora }}</option>
                                        @endforeach
                                    </select>

                                    @error('hora')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-gold text-dark font-heading py-4 rounded-lg hover:bg-yellow-500 transition-all">
                                Confirmar Reserva
                            </button>
                        </form>
                    </div>

                    <div data-aos="fade-left" class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                        <h3 class="text-xl font-heading mb-4 text-gold">Tus Citas Reservadas</h3>

                        @if ($citas->isEmpty())
                            <p class="text-gray-400 text-sm font-body">No tienes citas reservadas aún.</p>
                        @else
                            <ul class="space-y-2 text-gray-200 text-sm font-body">
                                @foreach ($citas as $cita)
                                    <li class="bg-dark-gray/70 p-3 rounded flex justify-between items-center">
                                        <div>
                                            <span class="font-bold">
                                                {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                                            </span>
                                            a las
                                            <span class="font-bold">
                                                {{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}
                                            </span><br>

                                            Servicio: {{ ucfirst($cita->servicio) }}<br>

                                            Barbero:
                                            {{ $cita->peluquero ? $cita->peluquero->nombre . ' ' . $cita->peluquero->apellidos : 'Asignado aleatoriamente' }}
                                        </div>

                                        <form action="{{ route('reservas.destroy', $cita->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 font-bold hover:text-red-400">
                                                Eliminar
                                            </button>
                                        </form>
                                    </li>
                                @endforeach

                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </section>

    </body>

    <script>
        const horasReservadas = @json($horasReservadas);
        const fechaInput = document.getElementById('fechaInput');
        const horaSelect = document.getElementById('horaSelect');
        const mensajeOcupada = document.getElementById('horaOcupadaMsg');
        const formReserva = document.getElementById('reservaForm');

        function actualizarHorasDisponibles() {
            const fecha = fechaInput.value;
            const ocupadas = horasReservadas[fecha] || [];

            let horaSeleccionadaOcupada = false;

            for (let option of horaSelect.options) {
                option.disabled = false;
                if (ocupadas.includes(option.value)) {
                    option.disabled = true;
                    if (horaSelect.value === option.value) {
                        horaSeleccionadaOcupada = true;
                    }
                }
            }

            if (horaSeleccionadaOcupada) {
                mensajeOcupada.classList.remove('hidden');
            } else {
                mensajeOcupada.classList.add('hidden');
            }
        }

        fechaInput.addEventListener('change', actualizarHorasDisponibles);
        horaSelect.addEventListener('change', actualizarHorasDisponibles);

        formReserva.addEventListener('submit', function(e) {
            const ocupadas = horasReservadas[fechaInput.value] || [];
            if (ocupadas.includes(horaSelect.value)) {
                e.preventDefault();
                mensajeOcupada.classList.remove('hidden');
            }
        });

        document.addEventListener('DOMContentLoaded', actualizarHorasDisponibles);
        flatpickr("#fechaInput", {
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: {
                firstDayOfWeek: 1
            },
            disableMobile: true,
            theme: "dark",
        });
    </script>

@endsection
