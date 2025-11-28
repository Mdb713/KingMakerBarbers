<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Reservar Cita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
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
  @extends('layouts.navigation')
<body class="bg-dark text-gray-100 font-sans">

    <section class="pt-32 pb-16 bg-gradient-to-br from-dark via-dark-gray to-medium-gray relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-96 h-96 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-yellow-600 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10" data-aos="fade-up">
            <span class="text-gold text-sm font-bold uppercase tracking-widest">Agenda tu Visita</span>
            <h1 class="text-6xl font-bold mt-4 mb-6">Reserva tu <span class="text-gold">Cita</span></h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Selecciona el servicio que deseas y el horario que mejor se adapte a ti
            </p>
        </div>
    </section>

    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-medium-gray rounded-3xl border border-gold/10 p-8 md:p-10" data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-2 text-gold">Completa tu Reserva</h2>
                    <p class="text-gray-400 mb-8">Elige tu servicio y horario preferido</p>

                    <form id="appointmentForm" class="space-y-6">

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Nombre Completo</label>
                                <input type="text" placeholder="Tu nombre" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Teléfono</label>
                                <input type="tel" placeholder="+34 612 345 678" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Email</label>
                            <input type="email" placeholder="tu@email.com" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                        </div>

                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Selecciona el Servicio</label>
                            <div class="grid md:grid-cols-3 gap-4">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="service" value="corte" class="peer sr-only" required>
                                    <div class="bg-dark-gray border-2 border-gold/20 rounded-xl p-6 text-center transition-all peer-checked:border-gold peer-checked:bg-gold/10">
                                        <div class="text-4xl mb-3"></div>
                                        <h4 class="font-bold mb-1">Corte de Pelo</h4>
                                        <p class="text-gold font-bold text-lg">25€</p>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="service" value="barba" class="peer sr-only">
                                    <div class="bg-dark-gray border-2 border-gold/20 rounded-xl p-6 text-center transition-all peer-checked:border-gold peer-checked:bg-gold/10">
                                        <div class="text-4xl mb-3"></div>
                                        <h4 class="font-bold mb-1">Arreglo de Barba</h4>
                                        <p class="text-gold font-bold text-lg">15€</p>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="service" value="completo" class="peer sr-only">
                                    <div class="bg-dark-gray border-2 border-gold/20 rounded-xl p-6 text-center transition-all peer-checked:border-gold peer-checked:bg-gold/10">
                                        <div class="text-4xl mb-3"></div>
                                        <h4 class="font-bold mb-1">Servicio Completo</h4>
                                        <p class="text-gold font-bold text-lg">35€</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Selecciona tu Barbero (Opcional)</label>
                            <select class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                                <option>Sin preferencia</option>
                                <option>Carlos Martínez - Senior</option>
                                <option>Javier López - Especialista en Barba</option>
                                <option>Miguel Rodríguez - Estilista</option>
                                <option>Antonio García - Master Barber</option>
                            </select>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Fecha</label>
                                <input type="date" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Hora</label>
                                <select required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                                    <option value="">Selecciona una hora</option>
                                    <option>09:00</option>
                                    <option>10:00</option>
                                    <option>11:00</option>
                                    <option>12:00</option>
                                    <option>13:00</option>
                                    <option>16:00</option>
                                    <option>17:00</option>
                                    <option>18:00</option>
                                    <option>19:00</option>
                                    <option>20:00</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Notas Adicionales (Opcional)</label>
                            <textarea rows="3" placeholder="¿Alguna preferencia o solicitud especial?" class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none resize-none transition"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gold text-dark font-bold py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                            Confirmar Reserva
                        </button>
                    </form>
                </div>

                <div class="space-y-6" data-aos="fade-left">

                    <div class="bg-medium-gray rounded-2xl border border-gold/10 p-6">
                        <h3 class="text-xl font-bold mb-4 text-gold">Información</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold text-sm mb-1">Ubicación</h4>
                                    <p class="text-gray-400 text-sm">Calle Real 25, Sevilla</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold text-sm mb-1">Teléfono</h4>
                                    <p class="text-gray-400 text-sm">+34 612 345 678</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold text-sm mb-1">Horario</h4>
                                    <p class="text-gray-400 text-sm">Lun-Vie: 9:00-21:00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-medium-gray rounded-2xl border border-gold/10 p-6">
                        <h3 class="text-xl font-bold mb-4 text-gold">Política de Cancelación</h3>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li class="flex items-start gap-2">
                                <span class="text-gold mt-1">✓</span>
                                <span>Cancelación gratuita hasta 24h antes</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold mt-1">✓</span>
                                <span>Modificaciones sin cargo</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold mt-1">✓</span>
                                <span>Confirmación por email y SMS</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold mt-1">✓</span>
                                <span>Recordatorio 24h antes de tu cita</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-medium-gray rounded-2xl border border-gold/10 p-6">
                        <h3 class="text-xl font-bold mb-4 text-gold">Disponibilidad Hoy</h3>
                        <div class="flex flex-wrap gap-2">
                            {{-- <span class="px-3 py-2 bg-dark-gray rounded-lg text-sm border border-gold/20 hover:border-gold transition cursor-pointer">10:00</span>
                            <span class="px-3 py-2 bg-dark-gray rounded-lg text-sm border border-gold/20 hover:border-gold transition cursor-pointer">11:00</span>
                            <span class="px-3 py-2 bg-dark-gray rounded-lg text-sm border border-gold/20 hover:border-gold transition cursor-pointer">16:00</span>
                            <span class="px-3 py-2 bg-dark-gray rounded-lg text-sm border border-gold/20 hover:border-gold transition cursor-pointer">17:00</span>
                            <span class="px-3 py-2 bg-dark-gray rounded-lg text-sm border border-gold/20 hover:border-gold transition cursor-pointer">19:00</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  @extends('layouts.footer')

    <script>

        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        anime({
            targets: '#appointmentForm input, #appointmentForm select, #appointmentForm textarea',
            translateY: [20, 0],
            opacity: [0, 1],
            delay: anime.stagger(50)
        });

        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('¡Reserva confirmada! Te enviaremos un email de confirmación.');
        });
    </script>
</body>
</html>
