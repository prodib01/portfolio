@extends('layout')
@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-5xl mx-auto">
            <!-- Download Button -->
            <div class="flex justify-end mb-6 px-8">
                <a href="{{ route('download.resume') }}"
                   class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download PDF
                </a>
            </div>

            <!-- Resume Container -->
            <div class="bg-white shadow-lg mx-8 p-8 rounded-lg">
                <!-- Header Section -->
                <header class="border-b border-gray-200 pb-6 mb-6">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                    <div class="text-gray-600 space-y-1">
                        <p>{{ $user->title ?? 'Professional Title' }}</p>
                        <p>{{ $user->email }}</p>
                        @if($user->phone)
                            <p>{{ $user->phone }}</p>
                        @endif
                        @if($user->location)
                            <p>{{ $user->location }}</p>
                        @endif
                    </div>
                </header>

                <!-- Experience Section -->
                @if(count($experiences) > 0)
                    <section class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Work Experience</h2>
                        <div class="space-y-6">
                            @foreach($experiences as $experience)
                                <div>
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 class="text-xl font-semibold text-gray-800">{{ $experience->role }}</h3>
                                            <p class="text-gray-600">{{ $experience->company }}</p>
                                        </div>
                                        <p class="text-gray-500">
                                            {{ $experience->start_date ? (is_string($experience->start_date) ? $experience->start_date : $experience->start_date->format('M Y')) : '' }}
                                            -
                                            {{ $experience->end_date ? (is_string($experience->end_date) ? $experience->end_date : $experience->end_date->format('M Y')) : 'Present' }}
                                        </p>
                                    </div>
                                    <div class="text-gray-700 ml-4">
                                        {!! nl2br(e($experience->description)) !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Education Section -->
                @if(count($educations) > 0)
                    <section class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Education</h2>
                        <div class="space-y-4">
                            @foreach($educations as $education)
                                <div>
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-xl font-semibold text-gray-800">{{ $education->degree }}</h3>
                                            <p class="text-gray-600">{{ $education->institution }}</p>
                                        </div>
                                        <p class="text-gray-500">{{ $education->graduation_year }}</p>
                                    </div>
                                    @if($education->description)
                                        <p class="text-gray-700 mt-1">{{ $education->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Skills Section -->
                @if(count($skills) > 0)
                    <section>
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Skills</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm">
                            {{ $skill->name }}
                        </span>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
@endsection
