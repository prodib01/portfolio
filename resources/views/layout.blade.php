<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'My Portfolio') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<header class="bg-white shadow-md">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800">
            {{ config('app.name', 'Portfolio') }}
        </div>
        <div class="space-x-4">
            <a href="/dashboard" class="text-gray-600 hover:text-blue-600 transition">Home</a>
            <a href="/projects" class="text-gray-600 hover:text-blue-600 transition">Projects</a>
            <a href="/skills" class="text-gray-600 hover:text-blue-600 transition">Skills</a>
            <a href="/education" class="text-gray-600 hover:text-blue-600 transition">Education</a>
            <a href="/experience" class="text-gray-600 hover:text-blue-600 transition">Experience</a>
            <a href="/contact" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
        </div>
    </nav>
</header>

<main class="container mx-auto px-6 py-8">
    @yield('content')
</main>

<footer class="bg-white text-center py-4 text-gray-600">
    © {{ date('Y') }} Your Name. All rights reserved.
</footer>
</body>
</html>
