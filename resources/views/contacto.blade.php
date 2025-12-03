@extends('layouts.app')

@section('content')
    <section id="contacto" class="reveal py-24 relative translate-y-10 transition-all duration-700">
        <div class="absolute inset-0">
            <img src="{{ asset('images/fondo2.webp') }}" alt="Fondo Contacto"
                class="w-full opacity-40 h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-dark via-transparent to-dark"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-12">
                <span class="text-gold text-sm font-bold uppercase tracking-widest font-body">Visítanos</span>
                <h3 class="text-5xl font-heading mt-4 mb-8 text-white drop-shadow-md">Contacto</h3>
                <p class="text-gray-400 font-body text-lg max-w-3xl mx-auto">
                    Encuentra toda la información para visitarnos o comunicarte con nosotros. Estamos aquí para ti.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">

                <!-- Ubicación -->
                <div
                    class="bg-medium-gray rounded-2xl border border-gold/10 p-8 text-center md:text-left transform transition-all duration-300 hover:scale-105 hover:bg-dark-gray hover:shadow-lg">
                    <h4 class="text-2xl font-heading mb-4 text-gold drop-shadow-sm">Ubicación</h4>
                    <div style="width:100%; height:300px;" class="rounded-lg overflow-hidden">
                        <gmp-map center="37.3880,-5.9840" zoom="16">
                            <gmp-advanced-marker position="37.3880,-5.9840" title="StreetMakerBarbers - Sevilla"
                                icon="https://maps.google.com/mapfiles/ms/icons/red-dot.png">
                            </gmp-advanced-marker>
                        </gmp-map>
                    </div>
                    <p class="text-gray-400 mt-4 font-body">Calle Real 25, Sevilla</p>
                </div>

                <!-- Teléfono y Email -->
                <div
                    class="bg-medium-gray rounded-2xl border border-gold/10 p-8 text-center md:text-left transform transition-all duration-300 hover:scale-105 hover:bg-dark-gray hover:shadow-lg">
                    <h4 class="text-2xl font-heading mb-4 text-gold drop-shadow-sm">Contacto</h4>
                    <p class="text-gray-400 mb-2 font-body"><strong>Teléfono:</strong> +34 612 345 678</p>
                    <p class="text-gray-400 mb-2 font-body"><strong>Email:</strong> contacto@hairlab.com</p>
                    <p class="text-gray-500 text-sm font-body">Horario de respuesta: 24h</p>
                </div>

                <!-- Redes Sociales -->
                <div
                    class="bg-medium-gray rounded-2xl border border-gold/10 p-8 text-center md:text-left transform transition-all duration-300 hover:scale-105 hover:bg-dark-gray hover:shadow-lg">
                    <h4 class="text-2xl font-heading mb-4 text-gold drop-shadow-sm">Síguenos</h4>
                    <div class="flex justify-center md:justify-start gap-4">
                        <a href="https://www.instagram.com" target="_blank"
                            class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition text-lg">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com" target="_blank"
                            class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition text-lg">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.tiktok.com" target="_blank"
                            class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition text-lg">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://www.twitter.com" target="_blank"
                            class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold hover:text-dark transition text-lg">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Horario -->
            <div
                class="mt-12 bg-medium-gray rounded-2xl border border-gold/10 p-8 max-w-2xl mx-auto transform transition-all duration-300 hover:scale-105 hover:bg-dark-gray hover:shadow-lg">
                <h4 class="text-2xl font-heading mb-6 text-gold text-center drop-shadow-sm">Horario de Atención</h4>
                <div class="space-y-3 font-body text-center">
                    <div class="flex justify-between items-center border-b border-gold/10 px-6 py-2">
                        <span class="text-gray-300">Lunes - Viernes</span>
                        <span class="font-bold">9:00 - 21:00</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-gold/10 px-6 py-2">
                        <span class="text-gray-300">Sábado</span>
                        <span class="font-bold">10:00 - 20:00</span>
                    </div>
                    <div class="flex justify-between items-center px-6 py-2">
                        <span class="text-gray-300">Domingo</span>
                        <span class="text-gold font-bold">Cerrado</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlUnhTtF8Yme6b156rc1fApa0BzfZnbGc&libraries=maps,marker&v=beta">
</script>
