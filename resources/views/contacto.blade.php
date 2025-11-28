<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Contacto</title>
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
   @extends('layouts.navigation')

    <section class="pt-32 pb-16 bg-gradient-to-br from-dark via-dark-gray to-medium-gray relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-96 h-96 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-yellow-600 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
            <span class="text-gold text-sm font-bold uppercase tracking-widest">Estamos Aquí Para Ti</span>
            <h1 class="text-6xl font-bold mt-4 mb-6">Ponte en <span class="text-gold">Contacto</span></h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Envíanos un mensaje o visítanos en nuestra barbería
            </p>
        </div>
    </section>


    <section class="py-16 bg-dark">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12">

                <div class="bg-medium-gray rounded-3xl border border-gold/10 p-8 md:p-10">
                    <h2 class="text-3xl font-bold mb-2 text-gold">Envíanos un Mensaje</h2>
                    <p class="text-gray-400 mb-8">Te responderemos lo antes posible</p>
                    
                    <form id="contactForm" class="space-y-6">
                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Nombre Completo</label>
                            <input type="text" placeholder="Tu nombre" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Email</label>
                                <input type="email" placeholder="tu@email.com" required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Teléfono</label>
                                <input type="tel" placeholder="+34 612 345 678" class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Asunto</label>
                            <select class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                                <option>Información sobre servicios</option>
                                <option>Consulta de precios</option>
                                <option>Modificar una reserva</option>
                                <option>Cancelar una reserva</option>
                                <option>Sugerencias</option>
                                <option>Otro</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-gray-400 text-sm mb-2 block font-bold">Mensaje</label>
                            <textarea rows="5" placeholder="Cuéntanos en qué podemos ayudarte..." required class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none resize-none transition"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gold text-dark font-bold py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>


                <div class="space-y-8">

                    <div class="bg-medium-gray rounded-2xl border border-gold/10 p-8">
                        <h3 class="text-2xl font-bold mb-6 text-gold">Información de Contacto</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center text-2xl flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold mb-1">Ubicación</h4>
                                    <p class="text-gray-400">Calle Real 25<br>41001 Sevilla, España</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center text-2xl flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold mb-1">Teléfono</h4>
                                    <p class="text-gray-400">+34 612 345 678</p>
                                    <p class="text-gray-500 text-sm">Lun - Sáb: 9:00 - 21:00</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center text-2xl flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold mb-1">Email</h4>
                                    <p class="text-gray-400">contacto@hairlab.com</p>
                                    <p class="text-gray-500 text-sm">Respuesta en 24h</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center text-2xl flex-shrink-0"></div>
                                <div>
                                    <h4 class="font-bold mb-1">Redes Sociales</h4>
                                    <div class="flex gap-3 mt-2">
                                        <a href="#" class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold/30 transition"></a>
                                        <a href="#" class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold/30 transition"></a>
                                        <a href="#" class="w-10 h-10 bg-gold/20 rounded-lg flex items-center justify-center hover:bg-gold/30 transition"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    
                    <div class="bg-medium-gray rounded-2xl border border-gold/10 p-8">
                        <h3 class="text-2xl font-bold mb-6 text-gold">Horario de Atención</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center pb-3 border-b border-gold/10">
                                <span class="text-gray-300">Lunes - Viernes</span>
                                <span class="font-bold">9:00 - 21:00</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gold/10">
                                <span class="text-gray-300">Sábado</span>
                                <span class="font-bold">10:00 - 20:00</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-300">Domingo</span>
                                <span class="text-gold font-bold">Cerrado</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-medium-gray rounded-2xl border border-gold/10 p-2 overflow-hidden">
                        <div class="bg-dark-gray rounded-xl h-64 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-6xl mb-4"></div>
                                <p class="text-gray-400">Mapa de ubicación</p>
                                <p class="text-gray-500 text-sm mt-2">Calle Real 25, Sevilla</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-dark-gray">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Preguntas <span class="text-gold">Frecuentes</span></h2>
                <p class="text-gray-400">Respuestas a las consultas más comunes</p>
            </div>

            <div class="space-y-4">
                <div class="bg-medium-gray rounded-xl border border-gold/10 overflow-hidden">
                    <button class="w-full text-left p-6 flex justify-between items-center hover:bg-dark-gray transition">
                        <h3 class="font-bold text-lg">¿Necesito cita previa?</h3>
                        <span class="text-gold text-2xl">+</span>
                    </button>
                    <div class="px-6 pb-6 text-gray-400 hidden">
                        Recomendamos hacer cita previa para garantizar tu horario preferido, aunque también aceptamos clientes sin cita según disponibilidad.
                    </div>
                </div>

                <div class="bg-medium-gray rounded-xl border border-gold/10 overflow-hidden">
                    <button class="w-full text-left p-6 flex justify-between items-center hover:bg-dark-gray transition">
                        <h3 class="font-bold text-lg">¿Qué métodos de pago aceptan?</h3>
                        <span class="text-gold text-2xl">+</span>
                    </button>
                    <div class="px-6 pb-6 text-gray-400 hidden">
                        Aceptamos efectivo, tarjetas de crédito/débito, Bizum y pagos contactless.
                    </div>
                </div>

                <div class="bg-medium-gray rounded-xl border border-gold/10 overflow-hidden">
                    <button class="w-full text-left p-6 flex justify-between items-center hover:bg-dark-gray transition">
                        <h3 class="font-bold text-lg">¿Puedo cancelar o modificar mi reserva?</h3>
                        <span class="text-gold text-2xl">+</span>
                    </button>
                    <div class="px-6 pb-6 text-gray-400 hidden">
                        Sí, puedes cancelar o modificar tu reserva hasta 24 horas antes sin ningún cargo. Contacta con nosotros por teléfono o email.
                    </div>
                </div>

                <div class="bg-medium-gray rounded-xl border border-gold/10 overflow-hidden">
                    <button class="w-full text-left p-6 flex justify-between items-center hover:bg-dark-gray transition">
                        <h3 class="font-bold text-lg">¿Tienen estacionamiento?</h3>
                        <span class="text-gold text-2xl">+</span>
                    </button>
                    <div class="px-6 pb-6 text-gray-400 hidden">
                        Hay parking público a 2 minutos caminando y varias zonas de estacionamiento regulado en las calles cercanas.
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

        // Funcionalidad de edición del perfil
        const editBtn = document.getElementById('editBtn');
        const saveBtn = document.getElementById('saveBtn');
        const profileForm = document.getElementById('profileForm');
        const inputs = profileForm.querySelectorAll('input');

        editBtn.addEventListener('click', function() {
            inputs.forEach(input => input.disabled = false);
            saveBtn.classList.remove('hidden');
            editBtn.textContent = 'Cancelar';
            
            if (editBtn.textContent === 'Cancelar') {
                editBtn.onclick = function() {
                    inputs.forEach(input => input.disabled = true);
                    saveBtn.classList.add('hidden');
                    editBtn.textContent = 'Editar';
                };
            }
        });

        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            inputs.forEach(input => input.disabled = true);
            saveBtn.classList.add('hidden');
            editBtn.textContent = 'Editar';
            alert('Cambios guardados correctamente');
        });
    </script>
</body>
</html>