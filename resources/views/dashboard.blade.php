<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('title', 'Dashboard') <!-- Establece el título aquí -->

    @section('content') <!-- Define el contenido de la sección -->


        @if ($events->isEmpty())
    <p class="text-center text-gray-600">No hay eventos disponibles.</p>
@else
    <div class="flex flex-wrap justify-center gap-4">
        @foreach ($events as $event)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-event-available_90146.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$event->name}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->description }}</p>
                    <a href="{{ route('events.usershow', $event->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ver más
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                ©2024 CordiSimple. All Rights reserved.
            </footer>
        @endsection
</x-app-layout>
