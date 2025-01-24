<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'My Portfolio') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    <nav>
        <a href="/">Home</a>
        <a href="/projects">Projects</a>
        <a href="/skills">Skills</a>
        <a href="/contact">Contact</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    © {{ date('Y') }} Your Name
</footer>
</body>
