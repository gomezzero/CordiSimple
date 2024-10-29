<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CordiSimple</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        .hero-bg {
            background-image: linear-gradient(to right, #6166B3, #B5C5FF), url('/banner.jpg');
            background-size: cover;
            background-position: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 600;
            color: white;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: white;
        }

        .btn-primary {
            background-color: #16194F;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #252A5F;
        }

        .feature-card {
            background-color: #F0F0F0;
            color: #333;
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .feature-card h3 {
            color: #16194F;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            color: #555;
        }

        .hero-bg {
            background-image: linear-gradient(to right, #6166B3, #B5C5FF), url('/banner.jpeg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <header class="bg-white dark:bg-gray-900 py-4 shadow">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-gray-800 dark:text-white">CordiSimple</a>
            <div>
                <a href="{{ route('register') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white mr-4">Register</a>
                <a href="{{ route('login') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero-bg py-24">
            <div class="container mx-auto flex flex-col items-center justify-center">
                <img src="{{ asset('banner.jpeg') }}" alt="Banner Hero">
                <h1 class="hero-title mb-4">Welcome to CordiSimple</h1>
                <p class="hero-subtitle mb-8">Effortlessly manage your events with our powerful platform</p>
                <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Why CordiSimple?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="feature-card">
                        <h3>Easy to Use</h3>
                        <p>Our intuitive interface makes event management a breeze.</p>
                    </div>
                    <div class="feature-card">
                        <h3>Powerful Features</h3>
                        <p>Streamline your event planning with our robust set of tools.</p>
                    </div>
                    <div class="feature-card">
                        <h3>Reliable Support</h3>
                        <p>Our dedicated team is here to help you every step of the way.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white dark:bg-gray-900 py-8">
        <div class="container mx-auto text-center text-gray-600 dark:text-gray-400">
            &copy; CordiSimple 2024. All rights reserved.
        </div>
    </footer>
</body>

</html>
