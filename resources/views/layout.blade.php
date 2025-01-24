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
        <div class="flex items-center space-x-4">
            <div class="space-x-4 mr-4">
                <a href="/dashboard" class="text-gray-600 hover:text-blue-600 transition">Home</a>
                <a href="/projects" class="text-gray-600 hover:text-blue-600 transition">Projects</a>
                <a href="/skills" class="text-gray-600 hover:text-blue-600 transition">Skills</a>
                <a href="/experience" class="text-gray-600 hover:text-blue-600 transition">Experience</a>
                <a href="/contact" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
            </div>

            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center focus:outline-none">
                        <img
                            src="{{ auth()->user()->profile_picture ? asset('storage/profile_pictures/' . auth()->user()->profile_picture) : asset('default-avatar.png') }}"
                            alt="Profile"
                            class="w-10 h-10 rounded-full object-cover border-2 border-gray-300"
                        >
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-20"
                    >
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                Edit Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
</header>

<main class="container mx-auto px-6 py-8">
    @yield('content')
</main>

<footer class="bg-white text-center py-4 text-gray-600">
    © {{ date('Y') }} Your Name. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
