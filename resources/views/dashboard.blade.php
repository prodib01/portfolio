@extends('layout')

@section('content')
    <div class="min-h-screen flex flex-col">
        {{-- Hero Section --}}
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-20">
            <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        Hi, I'm {{ $user->name }}
                    </h1>
                    <p class="text-xl mb-6">
                        {{ $user->description }}
                    </p>
                    <div class="space-x-4">
                        <a href="{{ route('projects.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-full hover:bg-blue-100 transition">
                            View My Projects
                        </a>
                        <a href="{{ route('contact') }}" class="border-2 border-white px-6 py-3 rounded-full hover:bg-white hover:text-blue-600 transition">
                            Contact Me
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                    <img
                        src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('default-avatar.png') }}"
                        alt="Profile"
                        class="w-64 h-64 rounded-full object-cover border-4 border-white shadow-lg"
                    >
                </div>
            </div>
        </div>

        {{-- Skills Overview --}}
        <div class="container mx-auto px-6 py-16">
            <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">My Skills</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @forelse($skills as $skill)
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <div class="text-4xl mb-4 text-blue-600">
                            💻
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $skill->name }}</h3>
                        <p class="text-gray-600">{{ $skill->description ?? 'Skill description' }}</p>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-600">No skills added yet</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Projects --}}
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Recent Projects</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @forelse($recentProjects as $project)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img
                                src="{{ $project->image ?? 'placeholder.jpg' }}"
                                alt="{{ $project->title }}"
                                class="w-full h-48 object-cover"
                            >
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                                <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:underline">
                                    View Project
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-600">No projects added yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
