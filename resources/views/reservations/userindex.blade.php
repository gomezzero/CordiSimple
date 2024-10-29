@extends('Admin.personal')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Mis Reservas</h1>

        @if ($reservations->isEmpty())
            <p class="text-center text-gray-500">No tienes eventos reservados.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($reservations as $reservation)
                    @if ($reservation->event != null)
                        <a href="{{ route('events.show', $reservation->event->id) }}"
                            class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                            <h5 class="text-2xl font-semibold mb-2 text-gray-800">{{ $reservation->event->name }}</h5>
                            <p class="text-gray-600 mb-4">{{ Str::limit($reservation->event->description, 100) }}</p>
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold">Fecha:</span>
                                {{ \Carbon\Carbon::parse($reservation->event->date)->format('d-m-Y') }} |
                                <span class="font-semibold">Hora:</span>
                                {{ \Carbon\Carbon::parse($reservation->event->time)->format('H:i') }}
                            </div>
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold">Ubicación:</span> {{ $reservation->event->location }}
                            </div>
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Estado de la Reserva:</span>
                                {{ ucfirst($reservation->event->status) }}
                            </div>
                        </a>
                    @else
                        <a href="{{ route('events.show', $reservation->id) }}"
                            class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                            <h5 class="text-2xl font-semibold mb-2 text-gray-800">{{ $reservation->name }}</h5>
                            <p class="text-gray-600 mb-4">{{ Str::limit($reservation->description, 100) }}</p>
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold">Fecha:</span>
                                {{ \Carbon\Carbon::parse($reservation->date)->format('d-m-Y') }} |
                                <span class="font-semibold">Hora:</span>
                                {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}
                            </div>
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold">Ubicación:</span> {{ $reservation->location }}
                            </div>
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Estado de la Reserva:</span>
                                {{ ucfirst($reservation->status) }}
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
