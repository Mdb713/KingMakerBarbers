@extends('layouts.app')
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlUnhTtF8Yme6b156rc1fApa0BzfZnbGc&libraries=maps,marker&v=beta">
</script>
@section('content')
    <section id="contacto" class="py-24 relative overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/fondo2.webp') }}" alt="Fondo Contacto"
                class="w-full h-full object-cover object-center transform scale-110 transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-b from-dark/95 via-dark/85 to-dark/95"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-gold/5 via-transparent to-gold/5"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <div class="text-center mb-16 animate-fadeIn">
                <div class="inline-block mb-4">
                    <span
                        class="text-gold text-sm font-bold uppercase tracking-[0.3em] font-body px-6 py-2 border border-gold/30 rounded-full bg-gold/5 backdrop-blur-sm">
                        Visítanos
                    </span>
                </div>
                <h3 class="text-6xl md:text-7xl font-heading mt-6 mb-6 text-white drop-shadow-2xl tracking-tight">
                    Contacto
                </h3>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-gold to-transparent mx-auto mb-6"></div>
                <p class="text-gray-300 font-body text-xl max-w-3xl mx-auto leading-relaxed">
                    Encuentra toda la información para visitarnos o comunicarte con nosotros. Estamos aquí para ti.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mb-12">
                <div
                    class="group bg-gradient-to-br from-medium-gray/90 to-dark-gray/90 backdrop-blur-sm rounded-3xl border border-gold/20 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:border-gold/40 hover:shadow-2xl hover:shadow-gold/20">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-gold to-gold/70 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-gold/30 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-map-marker-alt text-dark text-2xl"></i>
                        </div>
                    </div>
                    <h4 class="text-3xl font-heading mb-6 text-gold drop-shadow-sm">Ubicación</h4>

                    <div class="rounded-2xl overflow-hidden shadow-2xl mb-6 border-2 border-gold/10 group-hover:border-gold/30 transition-all duration-300"
                        style="width:100%; height:250px;">
                        <gmp-map center="37.3880,-5.9840" zoom="16">
                            <gmp-advanced-marker position="37.3880,-5.9840" title="StreetMakerBarbers - Sevilla">
                            </gmp-advanced-marker>
                        </gmp-map>
                    </div>

                    <p class="text-gray-300 font-body text-lg leading-relaxed">
                        <i class="fas fa-location-dot text-gold mr-2"></i>
                        Calle Real 25, Sevilla
                    </p>
                    <a href="https://maps.google.com/?q=37.3880,-5.9840" target="_blank"
                        class="inline-block mt-4 text-gold hover:text-white transition-colors duration-300 text-sm font-semibold">
                        Ver en Google Maps →
                    </a>
                </div>

                <div
                    class="group bg-gradient-to-br from-medium-gray/90 to-dark-gray/90 backdrop-blur-sm rounded-3xl border border-gold/20 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:border-gold/40 hover:shadow-2xl hover:shadow-gold/20">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-gold to-gold/70 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-gold/30 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-phone text-dark text-2xl"></i>
                        </div>
                    </div>
                    <h4 class="text-3xl font-heading mb-8 text-gold drop-shadow-sm">Contacto</h4>

                    <div class="space-y-6">
                        <div
                            class="bg-dark/30 rounded-xl p-4 border border-gold/10 hover:border-gold/30 transition-all duration-300">
                            <p class="text-gray-400 text-sm mb-2 font-body uppercase tracking-wider">Teléfono</p>
                            <a href="tel:+34612345678"
                                class="text-white hover:text-gold transition-colors text-lg font-semibold">
                                +34 612 345 678
                            </a>
                        </div>

                        <div
                            class="bg-dark/30 rounded-xl p-4 border border-gold/10 hover:border-gold/30 transition-all duration-300">
                            <p class="text-gray-400 text-sm mb-2 font-body uppercase tracking-wider">Email</p>
                            <a href="mailto:contacto@hairlab.com"
                                class="text-white hover:text-gold transition-colors text-lg font-semibold break-all">
                                contacto@hairlab.com
                            </a>
                        </div>

                        <div class="bg-gold/10 rounded-xl p-3 border border-gold/30">
                            <p class="text-gold text-sm font-body">
                                <i class="fas fa-clock mr-2"></i>
                                Respuesta en 24h
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="group bg-gradient-to-br from-medium-gray/90 to-dark-gray/90 backdrop-blur-sm rounded-3xl border border-gold/20 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:border-gold/40 hover:shadow-2xl hover:shadow-gold/20">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-gold to-gold/70 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-gold/30 group-hover:rotate-6 transition-transform duration-300">
                            <i class="fas fa-hashtag text-dark text-2xl"></i>
                        </div>
                    </div>
                    <h4 class="text-3xl font-heading mb-8 text-gold drop-shadow-sm">Síguenos</h4>

                    <p class="text-gray-300 font-body mb-8 text-sm leading-relaxed">
                        Únete a nuestra comunidad y mantente al día con las últimas tendencias
                    </p>

                    <div class="grid grid-cols-2 gap-4">
                        <a href="https://www.instagram.com" target="_blank"
                            class="group/social bg-dark/30 hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 rounded-xl p-6 border border-gold/10 hover:border-transparent transition-all duration-300 hover:scale-110 hover:shadow-lg">
                            <i
                                class="fab fa-instagram text-3xl text-gold group-hover/social:text-white transition-colors"></i>
                            <p class="text-xs text-gray-400 group-hover/social:text-white mt-2 font-body">Instagram</p>
                        </a>
                        <a href="https://www.facebook.com" target="_blank"
                            class="group/social bg-dark/30 hover:bg-blue-600 rounded-xl p-6 border border-gold/10 hover:border-transparent transition-all duration-300 hover:scale-110 hover:shadow-lg">
                            <i
                                class="fab fa-facebook-f text-3xl text-gold group-hover/social:text-white transition-colors"></i>
                            <p class="text-xs text-gray-400 group-hover/social:text-white mt-2 font-body">Facebook</p>
                        </a>
                        <a href="https://www.tiktok.com" target="_blank"
                            class="group/social bg-dark/30 hover:bg-black rounded-xl p-6 border border-gold/10 hover:border-transparent transition-all duration-300 hover:scale-110 hover:shadow-lg">
                            <i class="fab fa-tiktok text-3xl text-gold group-hover/social:text-white transition-colors"></i>
                            <p class="text-xs text-gray-400 group-hover/social:text-white mt-2 font-body">TikTok</p>
                        </a>
                        <a href="https://www.twitter.com" target="_blank"
                            class="group/social bg-dark/30 hover:bg-sky-500 rounded-xl p-6 border border-gold/10 hover:border-transparent transition-all duration-300 hover:scale-110 hover:shadow-lg">
                            <i
                                class="fab fa-twitter text-3xl text-gold group-hover/social:text-white transition-colors"></i>
                            <p class="text-xs text-gray-400 group-hover/social:text-white mt-2 font-body">Twitter</p>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="mt-12 bg-gradient-to-br from-medium-gray/90 to-dark-gray/90 backdrop-blur-sm rounded-3xl border border-gold/20 p-10 max-w-3xl mx-auto transform transition-all duration-500 hover:scale-105 hover:border-gold/40 hover:shadow-2xl hover:shadow-gold/20">
                <div class="text-center mb-8">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-gold to-gold/70 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-gold/30 mb-6">
                        <i class="fas fa-clock text-dark text-3xl"></i>
                    </div>
                    <h4 class="text-4xl font-heading text-gold drop-shadow-sm">Horario de Atención</h4>
                </div>

                <div class="space-y-4 font-body">
                    <div
                        class="flex justify-between items-center bg-dark/30 rounded-xl px-8 py-5 border border-gold/10 hover:border-gold/30 transition-all duration-300 group">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-gold rounded-full group-hover:scale-150 transition-transform"></div>
                            <span class="text-gray-200 text-lg">Lunes - Viernes</span>
                        </div>
                        <span class="font-bold text-white text-xl">9:00 - 21:00</span>
                    </div>
                    <div
                        class="flex justify-between items-center bg-dark/40 rounded-xl px-8 py-5 border border-gold/20 hover:border-gold/40 transition-all duration-300 group">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-red-500 rounded-full group-hover:scale-150 transition-transform"></div>
                            <span class="text-gray-200 text-lg">Sábado - Domingo</span>
                        </div>
                        <span class="text-gold font-bold text-xl flex items-center gap-2">
                            <i class="fas fa-door-closed text-sm"></i>
                            Cerrado
                        </span>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <p class="text-gray-400 text-sm font-body">
                        <i class="fas fa-info-circle text-gold mr-2"></i>
                        Recomendamos reservar tu cita con anticipación
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
