<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairLab - Mi Perfil</title>
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
            <span class="text-gold text-sm font-bold uppercase tracking-widest">Bienvenido de nuevo</span>
            <h1 class="text-5xl font-bold mt-4 mb-6">Mi <span class="text-gold">Perfil</span></h1>
            <p class="text-xl text-gray-400">Gestiona tu información personal y preferencias</p>
        </div>
    </section>

    <section class="py-16 bg-dark">
        <div class="max-w-5xl mx-auto px-6">
            <div class="space-y-8" data-aos="fade-up">

                    <div class="bg-medium-gray rounded-3xl border border-gold/10 p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gold">Información Personal</h2>
                            <button id="editBtn" class="px-4 py-2 bg-gold/20 text-gold rounded-lg hover:bg-gold hover:text-dark transition-all font-bold">
                                Editar
                            </button>
                        </div>

                        <form id="profileForm" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-gray-400 text-sm mb-2 block font-bold">Nombre</label>
                                    <input type="text"  disabled class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 disabled:opacity-60 focus:border-gold outline-none transition">
                                </div>
                                <div>
                                    <label class="text-gray-400 text-sm mb-2 block font-bold">Apellidos</label>
                                    <input type="text"  disabled class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 disabled:opacity-60 focus:border-gold outline-none transition">
                                </div>
                            </div>

                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Email</label>
                                <input type="email"  disabled class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 disabled:opacity-60 focus:border-gold outline-none transition">
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-gray-400 text-sm mb-2 block font-bold">Teléfono</label>
                                    <input type="tel"  disabled class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 disabled:opacity-60 focus:border-gold outline-none transition">
                                </div>
                                <div>
                                    <label class="text-gray-400 text-sm mb-2 block font-bold">Fecha de Nacimiento</label>
                                    <input type="date"  disabled class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 disabled:opacity-60 focus:border-gold outline-none transition">
                                </div>
                            </div>

                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Dirección</label>
                                <input type="text"  disabled class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 disabled:opacity-60 focus:border-gold outline-none transition">
                            </div>

                            <button type="submit" id="saveBtn" class="hidden w-full bg-gold text-dark font-bold py-4 rounded-lg hover:bg-yellow-500 transition-all transform hover:scale-105 shadow-lg shadow-gold/20">
                                Guardar Cambios
                            </button>
                        </form>
                    </div>

                    <div class="bg-medium-gray rounded-3xl border border-gold/10 p-8">
                        <h2 class="text-2xl font-bold mb-6 text-gold">Próximas Citas</h2>

                        <div class="space-y-4">
                            <!-- Cita 1 -->
                            {{-- <div class="bg-dark-gray rounded-xl border border-gold/20 p-6 hover:border-gold transition">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="font-bold text-lg mb-1">Corte + Barba</h3>
                                        <p class="text-gray-400 text-sm">Con Carlos Martínez (Senior)</p>
                                    </div>
                                    <span class="px-3 py-1 bg-gold/20 text-gold text-xs rounded-full font-bold">Confirmada</span>
                                </div>
                                <div class="flex items-center gap-6 text-sm text-gray-400">
                                    <span class="flex items-center gap-2">
                                        <span class="text-lg">📅</span>
                                        25 Nov 2024
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <span class="text-lg">⏰</span>
                                        16:00
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <span class="text-lg">💰</span>
                                        35€
                                    </span>
                                </div>
                                <div class="flex gap-3 mt-4">
                                    <button class="flex-1 bg-gold/20 text-gold py-2 rounded-lg hover:bg-gold hover:text-dark transition font-bold text-sm">
                                        Modificar
                                    </button>
                                    <button class="flex-1 bg-red-900/20 text-red-400 py-2 rounded-lg hover:bg-red-900/40 transition font-bold text-sm">
                                        Cancelar
                                    </button>
                                </div>
                            </div>

                            <!-- Cita 2 -->
                            <div class="bg-dark-gray rounded-xl border border-gold/20 p-6 hover:border-gold transition">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="font-bold text-lg mb-1">Corte de Pelo</h3>
                                        <p class="text-gray-400 text-sm">Con Javier López (Especialista)</p>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-900/20 text-yellow-400 text-xs rounded-full font-bold">Pendiente</span>
                                </div>
                                <div class="flex items-center gap-6 text-sm text-gray-400">
                                    <span class="flex items-center gap-2">
                                        <span class="text-lg">📅</span>
                                        2 Dic 2024
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <span class="text-lg">⏰</span>
                                        18:30
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <span class="text-lg"></span>
                                        25€
                                    </span>
                                </div>
                                <div class="flex gap-3 mt-4">
                                    <button class="flex-1 bg-gold/20 text-gold py-2 rounded-lg hover:bg-gold hover:text-dark transition font-bold text-sm">
                                        Modificar
                                    </button>
                                    <button class="flex-1 bg-red-900/20 text-red-400 py-2 rounded-lg hover:bg-red-900/40 transition font-bold text-sm">
                                        Cancelar
                                    </button>
                                </div>
                            </div> --}}
                        </div>

                        <button class="w-full mt-6 py-3 border-2 border-gold/20 text-gold rounded-lg hover:bg-gold/10 transition font-bold">
                            + Reservar Nueva Cita
                        </button>
                    </div>

                    <div class="bg-medium-gray rounded-3xl border border-gold/10 p-8">
                        <h2 class="text-2xl font-bold mb-6 text-gold">Seguridad</h2>

                        <form class="space-y-4">
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Contraseña Actual</label>
                                <input type="password" placeholder="••••••••" class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Nueva Contraseña</label>
                                <input type="password" placeholder="••••••••" class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm mb-2 block font-bold">Confirmar Nueva Contraseña</label>
                                <input type="password" placeholder="••••••••" class="w-full bg-dark-gray border border-gold/20 rounded-lg px-4 py-3 text-gray-100 focus:border-gold outline-none transition">
                            </div>
                            <button type="submit" class="w-full bg-gold text-dark font-bold py-3 rounded-lg hover:bg-yellow-500 transition-all">
                                Cambiar Contraseña
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        anime({
            targets: '.bg-medium-gray',
            translateY: [30, 0],
            opacity: [0, 1],
            delay: anime.stagger(100)
        });

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
      @extends('layouts.footer')
</body>
</html>
