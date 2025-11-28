<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Estilo Masculino</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
@if(session('success'))
<div id="loginSuccessMessage"
    class="fixed top-5 right-5 bg-gold text-dark font-bold px-6 py-3 rounded-lg shadow-2xl opacity-0 z-[9999] border border-yellow-600">
    {{ session('success') }}
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const message = document.getElementById('loginSuccessMessage');
    // Mostrar animación con Anime.js
    anime({
        targets: message,
        opacity: [0, 1],
        translateY: [-20, 0],
        duration: 800,
        easing: 'easeOutQuad',
        complete: () => {
            setTimeout(() => {
                anime({
                    targets: message,
                    opacity: [1, 0],
                    translateY: [0, -20],
                    duration: 800,
                    easing: 'easeInQuad'
                });
            }, 2500); // dura 2.5 segundos visible
        }
    });
});
</script>
@endif


<body class="bg-dark text-gray-100 font-sans">

@extends('layouts.navigation')

    <!-- HERO -->
    <section id="inicio"
        class="reveal pt-32 pb-24 bg-gradient-to-br from-dark via-dark-gray to-medium-gray relative overflow-hidden opacity-0 translate-y-10 transition-all duration-700">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-96 h-96 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-yellow-600 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center relative z-10">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="inline-block bg-gold/10 border border-gold/30 rounded-full px-4 py-2 mb-6">
                    <span class="text-gold text-sm font-semibold uppercase tracking-wider">Barbería Premium</span>
                </div>
                <h2 class="text-6xl font-bold mb-6 leading-tight">
                    Eleva tu <span class="text-gold">estilo</span> al siguiente nivel
                </h2>
                <p class="mb-8 text-lg text-gray-400 leading-relaxed">
                    Cortes de precisión, afeitados clásicos y tratamientos exclusivos. Donde la tradición encuentra la
                    modernidad.
                </p>
                <div class="flex gap-4">
                    <a href="#"
                        class="bg-gold text-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                        Reserva Ahora
                    </a>
                    <a href="#servicios"
                        class="border-2 border-gold text-gold font-bold px-8 py-4 rounded-lg hover:bg-gold hover:text-dark transition-all">
                        Ver Servicios
                    </a>
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="relative">
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-gold to-yellow-600 rounded-3xl blur-2xl opacity-20">
                    </div>
                    <div class="relative bg-medium-gray rounded-3xl p-1 shadow-2xl">
                        <div class="bg-dark-gray rounded-2xl p-8 aspect-square flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-8xl mb-4"></div>
                                <p class="text-gold font-semibold text-xl">Imagen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SOBRE NOSOTROS -->
    <section id="sobre-nosotros"
        class="reveal py-24 bg-dark-gray relative opacity-0 translate-y-10 transition-all duration-700">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold to-transparent">
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Nuestra Historia</span>
                <h3 class="text-5xl font-bold mt-4 mb-6">Sobre Nosotros</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg text-gray-300 mb-6 leading-relaxed">
                        En HairLab nos especializamos en ofrecer cortes de cabello y barba de calidad premium para
                        hombres modernos. Nuestro equipo combina técnicas tradicionales y tendencias actuales,
                        asegurando un estilo impecable y un servicio personalizado.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Más de 10 años de experiencia en la peluquería masculina nos avalan, con un ambiente acogedor
                        donde cada cliente se siente único.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                        <div class="text-4xl font-bold text-gold mb-2">10+</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Años de Experiencia</div>
                    </div>
                    <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                        <div class="text-4xl font-bold text-gold mb-2">5K+</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Clientes Satisfechos</div>
                    </div>
                    <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                        <div class="text-4xl font-bold text-gold mb-2">100%</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Premium Quality</div>
                    </div>
                    <div class="bg-medium-gray p-6 rounded-2xl border border-gold/10">
                        <div class="text-4xl font-bold text-gold mb-2">3</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Barberos Expertos</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICIOS -->
    <section id="servicios"
        class="reveal py-24 bg-dark opacity-0 translate-y-10 transition-all duration-700">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Lo Que Ofrecemos</span>
                <h3 class="text-5xl font-bold mt-4">Nuestros Servicios</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:transform hover:-translate-y-2 shadow-xl">
                    <h4 class="text-2xl font-bold mb-4 text-gold">Corte de Cabello</h4>
                    <p class="text-gray-400 mb-6">Cortes clásicos, modernos y personalizados según tu estilo y tipo de
                        cabello.</p>
                    <div class="text-gold font-bold text-sm uppercase tracking-wider">Desde 25€</div>
                </div>
                <div
                    class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:transform hover:-translate-y-2 shadow-xl">
                    <h4 class="text-2xl font-bold mb-4 text-gold">Barba & Afeitado</h4>
                    <p class="text-gray-400 mb-6">Diseñamos la barba a tu medida y ofrecemos afeitados de lujo con
                        toallas calientes.</p>
                    <div class="text-gold font-bold text-sm uppercase tracking-wider">Desde 20€</div>
                </div>
                <div
                    class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:transform hover:-translate-y-2 shadow-xl">
                    <h4 class="text-2xl font-bold mb-4 text-gold">Tratamientos Capilares</h4>
                    <p class="text-gray-400 mb-6">Cuidado intensivo para cabello y barba, hidratación y productos
                        premium.</p>
                    <div class="text-gold font-bold text-sm uppercase tracking-wider">Desde 35€</div>
                </div>
            </div>
        </div>
    </section>

    <!-- EQUIPO -->
    <section id="equipo"
        class="reveal py-24 bg-dark-gray opacity-0 translate-y-10 transition-all duration-700">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Conoce a los Expertos</span>
                <h3 class="text-5xl font-bold mt-4">Nuestro Equipo</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center">
                    <h4 class="text-2xl font-bold mb-2 text-gold">Juan Pérez</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3">Master Barber</p>
                    <p class="text-gray-400">Especializado en cortes clásicos y modernos con más de 10 años de
                        experiencia.</p>
                </div>
                <div
                    class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center">
                    <h4 class="text-2xl font-bold mb-2 text-gold">Carlos López</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3">Beard Specialist</p>
                    <p class="text-gray-400">Experto en barba y afeitado de lujo, atención al detalle garantizada.</p>
                </div>
                <div
                    class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center">
                    <h4 class="text-2xl font-bold mb-2 text-gold">Miguel Torres</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3">Hair Treatment Expert</p>
                    <p class="text-gray-400">Especialista en tratamientos capilares y cuidado premium para hombres.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section id="contacto"
        class="reveal py-24 bg-dark opacity-0 translate-y-10 transition-all duration-700">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Visítanos</span>
                <h3 class="text-5xl font-bold mt-4 mb-8">Contacto</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div
                    class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider">Ubicación</h5>
                    <p class="text-gray-400">Calle Real 25<br>Sevilla</p>
                </div>
                <div
                    class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider">Teléfono</h5>
                    <p class="text-gray-400">+34 612 345 678</p>
                </div>
                <div
                    class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider">Email</h5>
                    <p class="text-gray-400">contacto@hairlab.com</p>
                </div>
            </div>
        </div>
    </section>

    
@include('layouts.footer')

    <!-- SCROLL REVEAL SCRIPT -->
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
