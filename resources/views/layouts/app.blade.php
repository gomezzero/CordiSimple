<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CordiSimple')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (session()->has('success'))
        <meta name="message-success" content="{{ session('success') }}">
    @endif
    @if (session()->has('error'))
        <meta name="message-error" content="{{ session('error') }}">
    @endif

</head>

<body class="bg-gray-300">
    @include('layouts.partials.navbar')
    <!-- Main Content -->
    <div class="container mx-auto py-8 text-center">
        <h1 class=" py-4 text-4xl font-bold">@yield('title', 'All this events for you!')</h1>
        @yield('content')
    </div>
</body>

</html>
