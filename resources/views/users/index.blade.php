<x-app-layout>
    @section('title', 'Lista de Usuarios')

    @section('content')
        <div class="container mx-auto py-8 px-4 min-h-screen" >

            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabla de usuarios -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Rol</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="{{ $user->role === 'admin' ? 'bg-yellow-100' : '' }} text-gray-700 border-b">
                                <td class="px-4 py-3">{{ $user->name }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">{{ $user->role }}</td>
                                <td class="px-4 py-3 flex space-x-2 justify-center">
                                    <!-- Show Button -->
                                    <a href="{{ route('users.show', $user->id) }}" class="text-green-600 hover:text-green-800">
                                        Ver Detalles
                                    </a>
                                    

                                    <!-- Change Role Button -->
                                    <form action="{{ route('users.role', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="role" value="{{ $user->role === 'admin' ? 'user' : 'admin' }}">
                                        <button type="submit" class="{{ $user->role === 'admin' ? 'text-blue-600 hover:text-blue-800' : 'text-yellow-600 hover:text-yellow-800' }}">
                                            Cambiar a {{ $user->role === 'admin' ? 'Usuario' : 'Admin' }}
                                        </button>
                                    </form>

                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            Eliminar
                                        </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-app-layout>
@include('layouts.partials.footer')