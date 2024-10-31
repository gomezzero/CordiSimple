@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav class="container mx-auto flex justify-between items-center h-16">
    <a href="{{ route('welcome') }}" class="text-2xl font-bold text-gray-800 dark:text-white">CordiSimple</a>
    <div>
        <a href="{{ route('register') }}"
            class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white mr-4 transition">Register</a>
        <a href="{{ route('login') }}"
            class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white transition">Login</a>
    </div>
</nav>