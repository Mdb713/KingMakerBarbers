<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Estilo Masculino</title>
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

    <!-- NAVBAR -->
    <nav class="bg-dark-gray/95 backdrop-blur-sm shadow-2xl fixed top-0 left-0 w-full z-50 border-b border-gold/20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#inicio" class="flex items-center gap-3 group">
            <div class="w-14 h-14 bg-gradient-to-br from-gold to-yellow-600 rounded-lg flex items-center justify-center transform group-hover:rotate-6 transition-transform">
                    <span class="text-2xl font-bold text-dark" ><img src="{{ asset('images/logo.png') }}"></span>
                </div>
                <h1 class="text-3xl font-bold">
                    <span class="text-gold">Hair</span><span class="text-white">Lab</span>
                </h1>
            </a>
            <ul class="hidden md:flex gap-8 text-sm font-medium uppercase tracking-wider">
                <li><a href="#inicio" class="hover:text-gold transition-colors">Inicio</a></li>
                <li><a href="#sobre-nosotros" class="hover:text-gold transition-colors">Nosotros</a></li>
                <li><a href="#servicios" class="hover:text-gold transition-colors">Servicios</a></li>
                <li><a href="#equipo" class="hover:text-gold transition-colors">Equipo</a></li>
                <li><a href="#contacto" class="hover:text-gold transition-colors">Contacto</a></li>
                <li><a href="#" class="text-gold hover:text-yellow-500 transition-colors">Iniciar Sesión</a></li>
            </ul>
            <button class="md:hidden bg-gold text-dark px-4 py-2 rounded-lg font-bold">☰</button>
        </div>
    </nav>

    <!-- HERO -->
    <section id="inicio" class="pt-32 pb-24 bg-gradient-to-br from-dark via-dark-gray to-medium-gray relative overflow-hidden">
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
                    Cortes de precisión, afeitados clásicos y tratamientos exclusivos. Donde la tradición encuentra la modernidad.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="bg-gold text-dark font-bold px-8 py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                        Reserva Ahora
                    </a>
                    <a href="#servicios" class="border-2 border-gold text-gold font-bold px-8 py-4 rounded-lg hover:bg-gold hover:text-dark transition-all">
                        Ver Servicios
                    </a>
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-gold to-yellow-600 rounded-3xl blur-2xl opacity-20"></div>
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
    <section id="sobre-nosotros" class="py-24 bg-dark-gray relative">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold to-transparent"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Nuestra Historia</span>
                <h3 class="text-5xl font-bold mt-4 mb-6">Sobre Nosotros</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg text-gray-300 mb-6 leading-relaxed">
                        En HairLab nos especializamos en ofrecer cortes de cabello y barba de calidad premium para hombres modernos. Nuestro equipo combina técnicas tradicionales y tendencias actuales, asegurando un estilo impecable y un servicio personalizado.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Más de 10 años de experiencia en la peluquería masculina nos avalan, con un ambiente acogedor donde cada cliente se siente único.
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
    <section id="servicios" class="py-24 bg-dark">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Lo Que Ofrecemos</span>
                <h3 class="text-5xl font-bold mt-4">Nuestros Servicios</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:transform hover:-translate-y-2 shadow-xl">
                    <div class="text-5xl mb-6 group-hover:scale-110 transition-transform"></div>
                    <h4 class="text-2xl font-bold mb-4 text-gold">Corte de Cabello</h4>
                    <p class="text-gray-400 mb-6">Cortes clásicos, modernos y personalizados según tu estilo y tipo de cabello.</p>
                    <div class="text-gold font-bold text-sm uppercase tracking-wider group-hover:tracking-widest transition-all">Desde 25€</div>
                </div>
                <div class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:transform hover:-translate-y-2 shadow-xl">
                    <div class="text-5xl mb-6 group-hover:scale-110 transition-transform"></div>
                    <h4 class="text-2xl font-bold mb-4 text-gold">Barba & Afeitado</h4>
                    <p class="text-gray-400 mb-6">Diseñamos la barba a tu medida y ofrecemos afeitados de lujo con toallas calientes.</p>
                    <div class="text-gold font-bold text-sm uppercase tracking-wider group-hover:tracking-widest transition-all">Desde 20€</div>
                </div>
                <div class="group bg-gradient-to-br from-medium-gray to-dark-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all hover:transform hover:-translate-y-2 shadow-xl">
                    <div class="text-5xl mb-6 group-hover:scale-110 transition-transform"></div>
                    <h4 class="text-2xl font-bold mb-4 text-gold">Tratamientos Capilares</h4>
                    <p class="text-gray-400 mb-6">Cuidado intensivo para cabello y barba, hidratación y productos premium.</p>
                    <div class="text-gold font-bold text-sm uppercase tracking-wider group-hover:tracking-widest transition-all">Desde 35€</div>
                </div>
            </div>
        </div>
    </section>

    <!-- EQUIPO -->
    <section id="equipo" class="py-24 bg-dark-gray">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Conoce a los Expertos</span>
                <h3 class="text-5xl font-bold mt-4">Nuestro Equipo</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-gold rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 mx-auto bg-gradient-to-br from-gold/20 to-yellow-600/20 rounded-full flex items-center justify-center border-2 border-gold/30">
                            <span class="text-6xl"></span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gold">Juan Pérez</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3">Master Barber</p>
                    <p class="text-gray-400">Especializado en cortes clásicos y modernos con más de 10 años de experiencia.</p>
                </div>
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-gold rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 mx-auto bg-gradient-to-br from-gold/20 to-yellow-600/20 rounded-full flex items-center justify-center border-2 border-gold/30">
                            <span class="text-6xl"></span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gold">Carlos López</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3">Beard Specialist</p>
                    <p class="text-gray-400">Experto en barba y afeitado de lujo, atención al detalle garantizada.</p>
                </div>
                <div class="group bg-medium-gray p-8 rounded-2xl border border-gold/10 hover:border-gold/30 transition-all text-center">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-gold rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 mx-auto bg-gradient-to-br from-gold/20 to-yellow-600/20 rounded-full flex items-center justify-center border-2 border-gold/30">
                            <span class="text-6xl"></span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gold">Miguel Torres</h4>
                    <p class="text-sm text-gray-400 uppercase tracking-wider mb-3">Hair Treatment Expert</p>
                    <p class="text-gray-400">Especialista en tratamientos capilares y cuidado premium para hombres.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section id="contacto" class="py-24 bg-dark">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-gold text-sm font-bold uppercase tracking-widest">Visítanos</span>
                <h3 class="text-5xl font-bold mt-4 mb-8">Contacto</h3>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <div class="text-4xl mb-4 group-hover:scale-110 transition-transform"></div>
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider">Ubicación</h5>
                    <p class="text-gray-400">Calle Real 25<br>Sevilla</p>
                </div>
                <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <div class="text-4xl mb-4 group-hover:scale-110 transition-transform"></div>
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider">Teléfono</h5>
                    <p class="text-gray-400">+34 612 345 678</p>
                </div>
                <div class="bg-medium-gray p-8 rounded-2xl border border-gold/10 text-center group hover:border-gold/30 transition-all">
                    <div class="text-4xl mb-4 group-hover:scale-110 transition-transform"></div>
                    <h5 class="text-gold font-bold mb-2 uppercase text-sm tracking-wider">Email</h5>
                    <p class="text-gray-400">contacto@hairlab.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark-gray border-t border-gold/10 py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 text-center md:text-left mb-8">
                <div>
                    <div class="flex items-center gap-3 justify-center md:justify-start mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-gold to-yellow-600 rounded-lg flex items-center justify-center">
                            <span class="text-xl font-bold text-dark">HL</span>
                        </div>
                        <h5 class="text-2xl font-bold">
                            <span class="text-gold">Hair</span><span class="text-white">Lab</span>
                        </h5>
                    </div>
                    <p class="text-gray-400 text-sm">Tu barbería masculina de confianza. Estilo, calidad y atención personalizada.</p>
                </div>
                <div>
                    <h5 class="text-gold font-bold mb-4 uppercase text-sm tracking-wider">Horario</h5>
                    <p class="text-gray-400 text-sm">Lunes - Viernes: 9:00 - 20:00</p>
                    <p class="text-gray-400 text-sm">Sábado: 10:00 - 18:00</p>
                    <p class="text-gray-400 text-sm">Domingo: Cerrado</p>
                </div>
                <div>
                    <h5 class="text-gold font-bold mb-4 uppercase text-sm tracking-wider">Síguenos</h5>
                    <div class="flex gap-4 justify-center md:justify-start mb-4">
                        <a href="#" class="w-10 h-10 bg-medium-gray rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition-all">📷</a>
                        <a href="#" class="w-10 h-10 bg-medium-gray rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition-all">📘</a>
                        <a href="#" class="w-10 h-10 bg-medium-gray rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition-all">🎵</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gold/10 pt-8 text-center">
                <p class="text-gray-500 text-sm">© 2025 HairLab. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>