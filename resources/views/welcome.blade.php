<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CordiSimple</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 relative pb-24">
    <header class="bg-white dark:bg-gray-900 py-4 shadow">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-gray-800 dark:text-white">CordiSimple</a>
            <div>
                <a href="{{ route('register') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white mr-4 transition">Register</a>
                <a href="{{ route('login') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white transition">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="relative h-[80vh]">
            <img src="{{ asset('banner.jpeg') }}" alt="Banner Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="absolute inset-0 flex items-center justify-center text-center text-white z-10">
                <div>
                    <h1 class="mb-4 text-6xl font-bold">Welcome to <span class="text-yellow-500">CordiSimple</span></h1>
                    <p class="text-lg mb-8">Effortlessly manage your events with our powerful platform</p>
                    <a href="{{ route('register') }}"
                        class="bg-white text-blue-500 hover:bg-yellow-500 hover:text-white border border-white rounded px-6 py-2 transition">Get Started</a>
                </div>
            </div>
        </section>
        
        

        <section class="py-8">
            <div class="container mx-auto text-center">
                <h2 class="text-5xl font-bold text-gray-800 dark:text-gray-800 mb-8">Why CordiSimple?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-white">Easy to Use</h3>
                        <p class="text-gray-600 dark:text-gray-400">Our intuitive interface makes event management a breeze.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-white">Powerful Features</h3>
                        <p class="text-gray-600 dark:text-gray-400">Streamline your event planning with our robust set of tools.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-white">Reliable Support</h3>
                        <p class="text-gray-600 dark:text-gray-400">Our dedicated team is here to help you every step of the way.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white dark:bg-gray-900 py-8 absolute bottom-0 w-full">
        <div class="container mx-auto text-center text-gray-600 dark:text-gray-400">
            &copy; CordiSimple 2024. All rights reserved.
        </div>
    </footer>
</body>
</html>