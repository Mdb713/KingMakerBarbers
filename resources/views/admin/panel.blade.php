@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gold drop-shadow-lg">Usuarios Registrados</h1>
            <a href="{{ route('usuarios.create') }}"
                class="bg-gradient-to-r from-yellow-500 to-yellow-400 text-dark font-semibold px-4 py-2 rounded-lg shadow-md hover:scale-105 transition-all duration-200">
                Añadir Usuario
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-600 text-white font-semibold p-3 rounded-md shadow-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto border border-gray-700 rounded-xl shadow-lg">
            <table class="w-full min-w-[600px] text-left">
                <thead class="bg-dark-gray text-gold uppercase text-sm">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Rol</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($usuarios as $usuario)
                        <tr class="hover:bg-gray-800 transition">
                            <td class="p-3">{{ $usuario->id }}</td>
                            <td class="p-3 font-semibold">{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                            <td class="p-3">{{ $usuario->email }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs rounded bg-gray-700 text-gray-200">{{ $usuario->rol }}</span>
                            </td>
                            <td class="p-3">
                                <div class="flex flex-col sm:flex-row justify-center gap-2 sm:gap-3">
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                        class="bg-blue-500 hover:bg-blue-400 text-white font-medium px-3 py-1 rounded-md shadow transition-all duration-200">
                                        Editar
                                    </a>
                                    <button type="button"
                                        onclick="confirmDelete({{ $usuario->id }}, '{{ $usuario->nombre }} {{ $usuario->apellidos }}')"
                                        class="bg-red-600 hover:bg-red-500 text-white font-medium px-3 py-1 rounded-md shadow transition-all duration-200">
                                        Borrar
                                    </button>
                                    <form id="delete-form-{{ $usuario->id }}"
                                        action="{{ route('usuarios.delete', $usuario->id) }}" method="POST"
                                        class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($usuarios->isEmpty())
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-400">No hay usuarios registrados aún.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


        @if ($usuarios->hasPages())
            <div class="mt-6 flex justify-center">
                <nav role="navigation" aria-label="Pagination" class="inline-flex -space-x-px rounded-md shadow-sm">
                    @if ($usuarios->onFirstPage())
                        <span
                            class="inline-flex items-center px-3 py-2 text-gray-500 bg-dark-gray border border-gold/20 cursor-not-allowed rounded-l-md">
                            &laquo;
                        </span>
                    @else
                        <a href="{{ $usuarios->previousPageUrl() }}"
                            class="inline-flex items-center px-3 py-2 text-gold bg-dark-gray border border-gold/20 rounded-l-md hover:bg-gold hover:text-dark transition-all font-semibold">
                            &laquo;
                        </a>
                    @endif
                    @foreach ($usuarios->getUrlRange(1, $usuarios->lastPage()) as $page => $url)
                        @if ($page == $usuarios->currentPage())
                            <span
                                class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-dark bg-gold border border-gold/20 cursor-default">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gold bg-dark-gray border border-gold/20 hover:bg-gold hover:text-dark transition-all">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                    @if ($usuarios->hasMorePages())
                        <a href="{{ $usuarios->nextPageUrl() }}"
                            class="inline-flex items-center px-3 py-2 -ml-px text-gold bg-dark-gray border border-gold/20 rounded-r-md hover:bg-gold hover:text-dark transition-all font-semibold">
                            &raquo;
                        </a>
                    @else
                        <span
                            class="inline-flex items-center px-3 py-2 -ml-px text-gray-500 bg-dark-gray border border-gold/20 cursor-not-allowed rounded-r-md">
                            &raquo;
                        </span>
                    @endif
                </nav>
            </div>
        @endif


    </div>
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-60 hidden justify-center items-center z-50">
        <div
            class="bg-gray-900 p-6 rounded-xl shadow-xl max-w-md w-full text-center border border-yellow-500 animate-fade-in">
            <h2 class="text-2xl font-bold text-yellow-400 mb-4">¿Eliminar usuario?</h2>
            <p class="text-gray-300 mb-2">Vas a eliminar:</p>
            <p id="userNameToDelete" class="text-red-400 font-semibold mb-6"></p>
            <p class="text-gray-400 text-sm mb-6">Esta acción no se puede deshacer. ¿Seguro que quieres continuar?</p>
            <div class="flex justify-center gap-4">
                <button onclick="closeModal()"
                    class="bg-gray-600 hover:bg-gray-500 text-white font-semibold px-4 py-2 rounded-lg transition">
                    Cancelar
                </button>
                <button onclick="deleteUser()"
                    class="bg-red-600 hover:bg-red-500 text-white font-semibold px-4 py-2 rounded-lg transition">
                    Eliminar
                </button>
            </div>
        </div>
    </div>

    <script>
        let selectedUserId = null;

        function confirmDelete(userId, userName) {
            selectedUserId = userId;
            document.getElementById('userNameToDelete').textContent = userName;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
            selectedUserId = null;
        }

        function deleteUser() {
            if (selectedUserId) {
                document.getElementById('delete-form-' + selectedUserId).submit();
            }
        }
    </script>
@endsection
