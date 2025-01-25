<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'My Portfolio') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-inter text-gray-900 antialiased leading-normal tracking-normal">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white shadow-md sticky top-0 z-50">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600">
                        {{ config('app.name', 'Portfolio') }}
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="space-x-6">
                        <a href="/dashboard" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">Home</a>
                        <a href="/projects" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">Projects</a>
                        <a href="/skills" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">Skills</a>
                        <a href="/experience" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">Experience</a>
                        <a href="/contact" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">Contact</a>
                    </div>

                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="focus:outline-none">
                                <img
                                    src="{{ auth()->user()->profile_picture ? asset('storage/profile_pictures/' . auth()->user()->profile_picture) : asset('default-avatar.png') }}"
                                    alt="Profile"
                                    class="w-10 h-10 rounded-full object-cover border-2 border-blue-500 transition transform hover:scale-110"
                                >
                            </button>

                            <div 
                                x-show="open" 
                                @click.away="open = false"
                                x-transition
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl overflow-hidden"
                            >
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 transition-colors">
                                        Edit Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-blue-50 transition-colors">
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

        <main class="flex-grow container mx-auto px-6 py-8">
            @yield('content')
        </main>

        <footer class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-6">
            <div class="container mx-auto px-6 text-center">
                <p>© {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. All rights reserved.</p>
                <div class="mt-4 space-x-4">
                    {{-- Add social media links if needed --}}
                    {{-- <a href="#" class="hover:text-blue-200">LinkedIn</a>
                    <a href="#" class="hover:text-blue-200">GitHub</a> --}}
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>