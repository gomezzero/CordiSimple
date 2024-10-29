@extends('Admin.personal')

@section('title', 'Lista de Eventos')

@section('content')
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-center mb-8">Lista de Eventos</h1>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de eventos -->
        @if($events->isEmpty())
            <p class="text-center text-gray-600">No hay eventos disponibles.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Hora</th>
                            <th class="px-4 py-2">Ubicación</th>
                            <th class="px-4 py-2">Capacidad Máxima</th>
                            <th class="px-4 py-2">Lugares Disponibles</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr class="text-gray-700 border-b hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $event->name }}</td>
                                <td class="px-4 py-3">{{ $event->description }}</td>
                                <td class="px-4 py-3">{{ $event->date }}</td>
                                <td class="px-4 py-3">{{ $event->time }}</td>
                                <td class="px-4 py-3">{{ $event->location }}</td>
                                <td class="px-4 py-3">{{ $event->max_capacity }}</td>
                                <td class="px-4 py-3">{{ $event->availableSports }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($event->status == 'Activo') bg-green-100 text-green-800
                                        @elseif($event->status == 'Cancelado') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ $event->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <a href="{{ route('events.show', $event->id) }}" class="text-blue-600 hover:text-blue-800">Ver</a>
                                    <a href="{{ route('events.edit', $event->id) }}" class="text-indigo-600 hover:text-indigo-800">Editar</a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este evento?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Botón para crear un nuevo evento -->
        <div class="mt-8 text-center">
            <a href="{{ route('events.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                Crear Nuevo Evento
            </a>
        </div>
    </div>
@endsection
