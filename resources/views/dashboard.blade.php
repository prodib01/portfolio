@extends('layout')

@section('content')
    <div class="space-y-16">
        {{-- Hero Section --}}
        <section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg overflow-hidden">
            <div class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left space-y-6">
                    <h1 class="text-4xl md:text-5xl font-bold">
                        Hi, I'm {{ $user->name }}, <br>
                        <span class="text-3xl text-blue-200">{{ $user->role }}</span>
                    </h1>
                    <p class="text-xl text-blue-100">
                        {{ $user->description }}
                    </p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="{{ route('projects.index') }}" class="btn btn-primary">
                            View My Projects
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline">
                            Contact Me
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                    <img
                        src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('default-avatar.png') }}"
                        alt="Profile"
                        class="w-64 h-64 rounded-full object-cover border-4 border-white shadow-xl transform transition hover:scale-105"
                    >
                </div>
            </div>
        </section>

        {{-- Education Details --}}
        <section>
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800">My Education</h2>
                <p class="text-gray-500 mt-4">Academic journey and qualifications</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                @forelse($educations as $education)
                    <div class="bg-white rounded-lg shadow-md p-6 transition transform hover:-translate-y-2 hover:shadow-xl">
                        <div class="flex items-center mb-4">
                            <div class="mr-4 text-4xl text-blue-600 opacity-80">🎓</div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">{{ $education->degree }}</h3>
                                <p class="text-gray-600">{{ $education->institution }}</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2">
                            <p class="text-gray-700">
                                <strong>Graduation Year:</strong> {{ $education->graduation_year }}
                            </p>
                            <p class="text-gray-700">
                                <strong>Major:</strong> {{ $education->major }}
                            </p>
                            @if($education->gpa)
                                <p class="text-gray-700">
                                    <strong>GPA:</strong> {{ $education->gpa }}
                                </p>
                            @endif
                            @if($education->honors)
                                <div class="mt-2">
                                    <h4 class="font-semibold text-blue-600">Honors & Achievements</h4>
                                    <p class="text-gray-600">{{ $education->honors }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-600">No educational details added yet</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
