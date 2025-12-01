<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Estilo Masculino</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Rye&display=swap" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Configuración Tailwind -->
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
                        heading: ['Rye', 'cursive'],
                        body: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

@extends('layouts.navigation')

<body class="bg-dark text-gray-100 font-body">

    <!-- SECCIÓN INICIO -->
    <section id="inicio" class="reveal pt-32 pb-24 relative overflow-hidden translate-y-10 transition-all duration-700">
        <div class="absolute inset-0">
            <img src="{{ asset('images/fondo3.png') }}" alt="Fondo Inicio"
                 class="w-full h-full object-cover object-center opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-dark via-transparent to-dark"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center relative z-10">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="inline-block bg-gold/10 border border-gold/30 rounded-full px-4 py-2 mb-6">
                    <span class="text-gold text-sm font-semibold uppercase tracking-wider">Barbería Premium</span>
                </div>
                <h2 class="text-6xl font-heading mb-6 leading-tight text-white drop-shadow-lg">
                    Eleva tu <span class="text-gold">estilo</span> al siguiente nivel
                </h2>
                <p class="mb-8 text-lg text-gray-400 leading-relaxed font-body">
                    Cortes de precisión, afeitados clásicos y tratamientos exclusivos. Donde la tradición encuentra la modernidad.
                </p>
                <div class="flex gap-4">
                    <a href="#"
                        class="bg-gold text-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                        Reserva Ahora
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo HairLab" class="mx-auto">
            </div>
        </div>
    </section>

    <!-- SOBRE NOSOTROS Y SERVICIOS -->
    <section class="relative overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/fondo1.svg') }}" alt="Fondo Barbería"
                 class="w-full h-full object-cover object-center opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-dark via-transparent to-dark"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 relative z-10">

            <!-- SOBRE NOSOTROS -->
            <div id="sobre-nosotros" class="py-24">
                <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
                    <span class="text-gold text-sm font-bold uppercase tracking-widest">Nuestra Historia</span>
                    <h3 class="text-5xl font-heading mt-4 mb-6 text-white drop-shadow-md">Sobre Nosotros</h3>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div data-aos="fade-right" data-aos-duration="1000">
                        <p class="text-lg text-gray-300 mb-6 leading-relaxed font-body">
                            En HairLab nos especializamos en ofrecer cortes de cabello y barba de calidad premium para hombres modernos. Nuestro equipo combina técnicas tradicionales y tendencias actuales, asegurando un estilo impecable y un servicio personalizado.
                        </p>
                        <p class="text-gray-400 leading-relaxed font-body">
                            Más de 10 años de experiencia en la peluquería masculina nos avalan, con un ambiente acogedor donde cada cliente se siente único.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                            <div class="text-4xl font-heading text-gold mb-2">10+</div>
                            <div class="text-gray-400 text-sm uppercase tracking-wider font-body">Años de Experiencia</div>
                        </div>
                        <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                            <div class="text-4xl font-heading text-gold mb-2">5K+</div>
                            <div class="text-gray-400 text-sm uppercase tracking-wider font-body">Clientes Satisfechos</div>
                        </div>
                        <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                            <div class="text-4xl font-heading text-gold mb-2">100%</div>
                            <div class="text-gray-400 text-sm uppercase tracking-wider font-body">Premium Quality</div>
                        </div>
                        <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                            <div class="text-4xl font-heading text-gold mb-2">3</div>
                            <div class="text-gray-400 text-sm uppercase tracking-wider font-body">Barberos Expertos</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SERVICIOS -->
            <div id="servicios" class="py-24">
                <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                    <span class="text-gold text-sm font-bold uppercase tracking-widest">Lo Que Ofrecemos</span>
                    <h3 class="text-5xl font-heading mt-4 text-white drop-shadow-md">Nuestros Servicios</h3>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:-translate-y-2 shadow-xl">
                        <h4 class="text-2xl font-heading mb-4 text-gold drop-shadow-sm">Corte de Cabello</h4>
                        <p class="text-gray-400 mb-6 font-body">Cortes clásicos, modernos y personalizados según tu estilo y tipo de cabello.</p>
                        <div class="text-gold font-bold text-sm uppercase tracking-wider font-body">Desde 25€</div>
                    </div>
                    <div class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:-translate-y-2 shadow-xl">
                        <h4 class="text-2xl font-heading mb-4 text-gold drop-shadow-sm">Barba & Afeitado</h4>
                        <p class="text-gray-400 mb-6 font-body">Diseñamos la barba a tu medida y ofrecemos afeitados de lujo con toallas calientes.</p>
                        <div class="text-gold font-bold text-sm uppercase tracking-wider font-body">Desde 20€</div>
                    </div>
                    <div class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:-translate-y-2 shadow-xl">
                        <h4 class="text-2xl font-heading mb-4 text-gold drop-shadow-sm">Tratamientos Capilares</h4>
                        <p class="text-gray-400 mb-6 font-body">Cuidado intensivo para cabello y barba, hidratación y productos premium.</p>
                        <div class="text-gold font-bold text-sm uppercase tracking-wider font-body">Desde 35€</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EQUIPO -->
    <section id="equipo" class="reveal py-24 relative opacity-40 translate-y-10 transition-all duration-700">
        <div class="absolute inset-0">
            <img src="{{ asset('images/fondo3.png') }}" alt="Fondo Equipo" class="w-full h-full object-cover object-center opacity-40 ">
            <div class="absolute inset-0 bg-gradient-to-b from-dark via-transparent to-dark"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Conoce a los Expertos</span>
                <h3 class="text-5xl font-heading mt-4 text-white drop-shadow-md">Nuestro Equipo</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="text-2xl font-heading mb-2 text-gold drop-shadow-sm">Juan Pérez</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3 font-body">Master Barber</p>
                    <p class="text-gray-400 font-body">Especializado en cortes clásicos y modernos con más de 10 años de experiencia.</p>
                </div>
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-2xl font-heading mb-2 text-gold drop-shadow-sm">Carlos López</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3 font-body">Beard Specialist</p>
                    <p class="text-gray-400 font-body">Experto en barba y afeitado de lujo, atención al detalle garantizada.</p>
                </div>
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-2xl font-heading mb-2 text-gold drop-shadow-sm">Miguel Torres</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3 font-body">Hair Treatment Expert</p>
                    <p class="text-gray-400 font-body">Especialista en tratamientos capilares y cuidado premium para hombres.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section id="contacto" class="reveal py-24 relative translate-y-10 transition-all duration-700">
        <div class="absolute inset-0">
            <img src="{{ asset('images/fondo2.png') }}" alt="Fondo Contacto" class="w-full opacity-40 h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-dark via-transparent to-dark"></div>
        </div>
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <div class="text-center mb-12">
                <span class="text-gold text-sm font-bold uppercase tracking-widest font-body">Visítanos</span>
                <h3 class="text-5xl font-heading mt-4 mb-8 text-white drop-shadow-md">Contacto</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider font-body">Ubicación</h5>
                    <p class="text-gray-400 font-body">Calle Real 25<br>Sevilla</p>
                </div>
                <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider font-body">Teléfono</h5>
                    <p class="text-gray-400 font-body">+34 612 345 678</p>
                </div>
                <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider font-body">Email</h5>
                    <p class="text-gray-400 font-body">contacto@hairlab.com</p>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ once: true });
    </script>

</body>
</html>
