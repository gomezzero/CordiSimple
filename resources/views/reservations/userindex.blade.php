<x-app-layout>
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Mis Reservas</h1>

        @if ($reservations->isEmpty())
            <p class="text-center text-gray-500">No tienes eventos reservados.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($reservations as $reservation)

                    @if ($reservation->event != null)

                    <div class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <h5 class="text-2xl font-semibold mb-2 text-gray-800">{{ $reservation->event->name }}</h5>
                        <h5 class="text-2xl font-semibold mb-2 text-gray-800">{{ $reservation->event->availableSpots }}</h5>
                        <p class="text-gray-600 mb-4">{{ Str::limit($reservation->event->description, 100) }}</p>
                        <div class="text-sm text-gray-500 mb-2">
                            <span class="font-semibold">Fecha:</span>
                            {{ \Carbon\Carbon::parse($reservation->event->date)->format('d-m-Y') }} |
                            <span class="font-semibold">Hora:</span>
                            {{ \Carbon\Carbon::parse($reservation->event->time)->format('H:i') }}
                        </div>
                        <div class="text-sm text-gray-500 mb-2 flex justify-between items-center">
                            <span class="font-semibold">Estado de la Reserva:</span> {{ ucfirst($reservation->status) }}

                            <!-- Formulario para cancelar la reserva -->
                            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar esta reserva?');">
                                @csrf
                                @method('PUT') <!-- Cambia el método a PUT -->
                                <button type="submit" class="w-20 h-10 rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none">
                                    <span class="material-icons">Cancelar</span>
                                </button>
                            </form>
                        </div>

                        <div class="text-sm text-gray-500 mb-4">
                            <span class="font-semibold">Ubicación: </span>
                            <span>{{ $reservation->event->location }}</span>
                        </div>
                    </div>
                        </a>
                    @else
                        <a href="{{ route('events.show', $reservation->id) }}"
                            class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">

                            <h5 class="text-2xl font-semibold mb-2 text-gray-800">ESTE EVENTO HA SIDO ELIMINADO</h5>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
</x-app-layout>
@include('layouts.partials.footer')
