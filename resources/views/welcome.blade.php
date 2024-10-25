<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CordiSimple</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>

<body>
    <header>
        <nav>
            <a href="{{ route('register') }}">Register</a>
        </nav> 
    </header>

    <main class="mt-6">
        <h1 class="center">CordiSimple</h1>
    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Rights reserved ©CordiSimple 2024
    </footer>
</body>

</html>