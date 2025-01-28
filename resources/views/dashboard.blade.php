@extends('layout')

@section('content')
    <div class="space-y-16">
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg overflow-hidden">
            <div class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center">
                <!-- Hero Text -->
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
                        <a href="{{ route('contacts.index') }}" class="btn btn-outline">
                            Contact Me
                        </a>
                    </div>
                </div>
                <!-- Hero Image -->
                <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                    <img
                        src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('default-avatar.png') }}"
                        alt="Profile"
                        class="w-64 h-64 rounded-full object-cover border-4 border-white shadow-xl transform transition hover:scale-105">
                </div>
            </div>
        </section>

        <!-- Education Section -->
        <section>
            <div class="flex justify-between items-center mb-12">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-gray-800">My Education</h2>
                    <p class="text-gray-500 mt-4">Academic journey and qualifications</p>
                </div>
                <a href="{{ route('educations.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Add Education
                </a>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Education Entries -->
                @forelse($educations as $education)
                    <div class="bg-white rounded-lg shadow-md p-6 transition transform hover:-translate-y-2 hover:shadow-xl">
                        <!-- Header -->
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center">
                                <div class="mr-4 text-4xl text-blue-600 opacity-80">🎓</div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $education->degree }}</h3>
                                    <p class="text-gray-600">{{ $education->institution }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('educations.edit', $education) }}" class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('educations.destroy', $education) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Are you sure you want to delete this education entry?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Details -->
                        <div class="space-y-2">
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
                    <!-- No Education Entries -->
                    <p class="col-span-full text-center text-gray-600">
                        No educational details added yet.
                        <a href="{{ route('educations.create') }}" class="text-blue-600 hover:text-blue-800 ml-2">
                            Add your first education entry
                        </a>
                    </p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
