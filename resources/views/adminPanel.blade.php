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

    @if(session('success'))
        <div class="bg-green-600 text-white font-semibold p-3 rounded-md shadow-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden border border-gray-700 rounded-xl shadow-lg">
        <table class="w-full text-left">
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
                @foreach($usuarios as $usuario)
                <tr class="hover:bg-gray-800 transition">
                    <td class="p-3">{{ $usuario->id }}</td>
                    <td class="p-3 font-semibold">{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                    <td class="p-3">{{ $usuario->email }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded bg-gray-700 text-gray-200">
                            {{ $usuario->rol }}
                        </span>
                    </td>

                    <td class="p-3">
                        <div class="flex justify-center gap-3">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                               class="bg-blue-500 hover:bg-blue-400 text-white font-medium px-3 py-1 rounded-md shadow transition-all duration-200">
                                Editar
                            </a>

                            <button type="button"
                                    onclick="confirmDelete({{ $usuario->id }}, '{{ $usuario->nombre }} {{ $usuario->apellidos }}')"
                                    class="bg-red-600 hover:bg-red-500 text-white font-medium px-3 py-1 rounded-md shadow transition-all duration-200">
                                Borrar
                            </button>


                            <form id="delete-form-{{ $usuario->id }}" action="{{ route('usuarios.delete', $usuario->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($usuarios->isEmpty())
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-400">
                        No hay usuarios registrados aún.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-60 hidden justify-center items-center z-50">
    <div class="bg-gray-900 p-6 rounded-xl shadow-xl max-w-md w-full text-center border border-yellow-500 animate-fade-in">

        <h2 class="text-2xl font-bold text-yellow-400 mb-4">
            ¿Eliminar usuario?
        </h2>

        <p class="text-gray-300 mb-2">Vas a eliminar:</p>
        <p id="userNameToDelete" class="text-red-400 font-semibold mb-6"></p>

        <p class="text-gray-400 text-sm mb-6">
            Esta acción no se puede deshacer. ¿Seguro que quieres continuar?
        </p>

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
