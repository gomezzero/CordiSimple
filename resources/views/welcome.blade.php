<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CordiSimple</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-white dark:bg-gray-900 shadow">
        @include('layouts.partials.navbar')
    </header>

    <main class="flex-grow">
        <section class="relative h-[100vh]">
            <img src="{{ asset('banner.jpeg') }}" alt="Banner Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="absolute inset-0 flex items-center justify-center text-center text-white z-10">
                <div>
                    <h1 class="mb-4 text-6xl font-bold">Welcome to <span class="text-yellow-500">CordiSimple</span></h1>
                    <p class="text-lg mb-8">Effortlessly manage your events with our powerful platform</p>
                    @if (!Auth::check())
                        <a href="{{ route('register') }}"
                            class="inline-flex h-12 animate-shimmer items-center justify-center rounded-md border border-slate-800 bg-[linear-gradient(110deg,#000103,45%,#1e2631,55%,#000103)] bg-[length:200%_100%] px-6 font-medium text-green-400 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50">Get
                            Started</a>
                    @endif
                </div>
            </div>
        </section>

        <section class="py-8">
            <div class="container mx-auto text-center">
                <h2 class="text-5xl font-bold text-gray-800 dark:text-gray-800 mb-8">Why CordiSimple?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-white">Easy to Use</h3>
                        <p class="text-gray-600 dark:text-gray-400">Our intuitive interface makes event management a
                            breeze.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-white">Powerful Features</h3>
                        <p class="text-gray-600 dark:text-gray-400">Streamline your event planning with our robust set
                            of tools.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-white">Reliable Support</h3>
                        <p class="text-gray-600 dark:text-gray-400">Our dedicated team is here to help you every step of
                            the way.</p>
                    </div>
                </div>
            </div>
        </section>

        @if ($events->isEmpty())
            <p class="text-center text-gray-600">No hay eventos disponibles.</p>
        @else
        <h2 class="text-5xl font-bold text-gray-800 dark:text-gray-800 mb-8 mx auto text-center">Events near to you</h2>
            <div class="flex flex-wrap justify-center gap-4 py-8">
                @foreach ($events as $event)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg"
                                src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-event-available_90146.png"
                                alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $event->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->description }}</p>
                            <a href="{{ route('events.usershow', $event->id) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver más
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    @include('layouts.partials.footer')
</body>
</html>
