<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Sobre Nosotros</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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

    <!-- NAVIGATION -->
    @extends('layouts.navigation')

    <!-- HERO -->
    <section class="pt-32 pb-16 bg-gradient-to-br from-dark via-dark-gray to-medium-gray relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-96 h-96 bg-gold rounded-full blur-3xl" data-aos="zoom-in"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10" data-aos="fade-down">
            <span class="text-gold text-sm font-bold uppercase tracking-widest">Nuestra Historia</span>
            <h1 class="text-6xl font-bold mt-4 mb-6">Sobre <span class="text-gold">Nosotros</span></h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Más que una barbería, somos artesanos del estilo masculino
            </p>
        </div>
    </section>

    <!-- NUESTRA HISTORIA -->
    <section class="py-24 bg-dark-gray">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold mb-6">Nuestra Historia</h2>
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        HairLab nació en 2013 con una visión clara: revolucionar la experiencia de la barbería masculina en Sevilla. Lo que comenzó como un pequeño local en el centro de la ciudad, hoy se ha convertido en un referente de estilo y calidad.
                    </p>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        Fusionamos las técnicas tradicionales de barbería con las últimas tendencias en estilismo masculino. Cada corte es una obra de arte, cada afeitado una experiencia de lujo.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Nuestro compromiso es simple: hacer que cada hombre que cruza nuestras puertas salga sintiéndose más seguro, más elegante y listo para conquistar el mundo.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6" data-aos="fade-left">
                    <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center">
                        <div class="text-5xl font-bold text-gold mb-2">10+</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Años de Experiencia</div>
                    </div>
                    <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center">
                        <div class="text-5xl font-bold text-gold mb-2">5K+</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Clientes Satisfechos</div>
                    </div>
                    <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center">
                        <div class="text-5xl font-bold text-gold mb-2">100%</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Premium Quality</div>
                    </div>
                    <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center">
                        <div class="text-5xl font-bold text-gold mb-2">3</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wider">Barberos Expertos</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VALORES -->
    <section class="py-24 bg-dark">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">Nuestros Valores</h2>
                <p class="text-gray-400">Lo que nos define y nos hace únicos</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-5xl mb-4">✂️</div>
                    <h3 class="text-xl font-bold text-gold mb-3">Excelencia</h3>
                    <p class="text-gray-400">Cada corte es ejecutado con precisión y dedicación absoluta</p>
                </div>
                <div class="bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-5xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold text-gold mb-3">Personalización</h3>
                    <p class="text-gray-400">Tu estilo es único, nuestro servicio también lo es</p>
                </div>
                <div class="bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-5xl mb-4">💎</div>
                    <h3 class="text-xl font-bold text-gold mb-3">Lujo</h3>
                    <p class="text-gray-400">Experiencia premium en cada detalle y servicio</p>
                </div>
            </div>
        </div>
    </section>

    <!-- EQUIPO -->
    <section class="py-24 bg-dark-gray">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Conoce a los Expertos</span>
                <h2 class="text-4xl font-bold mt-4">Nuestro Equipo</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-32 h-32 bg-gold/20 rounded-full mx-auto mb-6 flex items-center justify-center text-5xl">
                        👨
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gold">Juan Pérez</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-4">Master Barber</p>
                    <p class="text-gray-400 mb-4">Especializado en cortes clásicos y modernos con más de 10 años de experiencia.</p>
                    <div class="flex justify-center gap-4 text-gold">
                        <span>✂️</span>
                        <span>🏆</span>
                        <span>⭐</span>
                    </div>
                </div>

                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-32 h-32 bg-gold/20 rounded-full mx-auto mb-6 flex items-center justify-center text-5xl">
                        👨‍🦱
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gold">Carlos López</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-4">Beard Specialist</p>
                    <p class="text-gray-400 mb-4">Experto en barba y afeitado de lujo, atención al detalle garantizada.</p>
                    <div class="flex justify-center gap-4 text-gold">
                        <span>🪒</span>
                        <span>💈</span>
                        <span>⭐</span>
                    </div>
                </div>

                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-32 h-32 bg-gold/20 rounded-full mx-auto mb-6 flex items-center justify-center text-5xl">
                        👨‍🦰
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gold">Miguel Torres</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-4">Hair Treatment Expert</p>
                    <p class="text-gray-400 mb-4">Especialista en tratamientos capilares y cuidado premium para hombres.</p>
                    <div class="flex justify-center gap-4 text-gold">
                        <span>✨</span>
                        <span>💆</span>
                        <span>⭐</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @extends('layouts.footer')

    <script>
        // Inicializar AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Animaciones con Anime.js
        anime({
            targets: '.bg-medium-gray',
            translateY: [30, 0],
            opacity: [0, 1],
            delay: anime.stagger(100)
        });
    </script>

</body>

</html>
