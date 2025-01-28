@extends('layout')
@section('content')
    <main class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Download Button -->
            <div class="flex justify-end mb-8">
                <a href="{{ route('download.resume') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    <span class="font-medium">Download PDF</span>
                </a>
            </div>

            <!-- Resume Content -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="grid grid-cols-12 divide-x divide-gray-200">
                    <!-- Sidebar -->
                    <aside class="col-span-4 bg-gray-50">
                        <!-- Profile Section -->
                        <section class="p-8 border-b border-gray-200">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                            <p class="text-lg font-medium text-blue-600 mb-8">{{ $user->role }}</p>

                            <!-- Contact Information -->
                            <ul class="space-y-6">
                                <li class="flex items-center gap-3 text-gray-700 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm">{{ $user->email }}</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-700 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span class="text-sm">{{ $user->phone }}</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-700 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-sm">{{ $user->location }}</span>
                                </li>
                                <li class="flex items-center gap-3 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                    <a href="https://github.com/{{ $user->github_url }}"
                                       target="_blank"
                                       class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                                        {{ $user->github_url }}
                                    </a>
                                </li>
                                <li class="flex items-center gap-3 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <a href="https://www.linkedin.com/in/{{ $user->linkedin_url }}"
                                       target="_blank"
                                       class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                                        {{ $user->linkedin_url }}
                                    </a>
                                </li>
                            </ul>
                        </section>

                        <!-- Skills Section -->
                        @if(count($skills) > 0)
                            <section class="p-8">
                                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-gray-200">Skills</h2>
                                <div class="space-y-4">
                                    @foreach($skills as $skill)
                                        <div class="space-y-2">
                                            <div class="flex items-center justify-between">
                                                <span class="text-sm font-medium text-gray-900">{{ $skill->name }}</span>
                                                <div class="flex gap-1.5">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="w-2.5 h-2.5 rounded-full transition-colors duration-200
                                                            {{ $i <= ceil($skill->proficiency / 20)
                                                                ? 'bg-blue-600'
                                                                : 'bg-gray-200' }}">
                                                        </span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    </aside>

                    <!-- Main Content -->
                    <main class="col-span-8 p-8">
                        <!-- About Section -->
                        <section class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-gray-200">Professional Summary</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $user->description }}</p>
                        </section>

                        <!-- Experience Section -->
                        @if(count($experiences) > 0)
                            <section class="mb-12">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-gray-200">Professional Experience</h2>
                                <div class="space-y-8">
                                    @foreach($experiences as $experience)
                                        <article class="relative pl-6 border-l-2 border-gray-200 hover:border-blue-600 transition-colors duration-200">
                                            <div class="absolute -left-[9px] top-1.5 w-4 h-4 bg-blue-600 rounded-full ring-4 ring-white"></div>
                                            <!-- Role -->
                                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $experience->role }}</h3>
                                            <!-- Company -->
                                            <p class="text-base text-gray-800 mb-1">{{ $experience->company }}</p>
                                            <!-- Dates -->
                                            <p class="text-sm text-gray-600 mb-3">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                                            <!-- Description -->
                                            <p class="text-gray-700 leading-relaxed">{{ $experience->description }}</p>
                                        </article>
                                    @endforeach
                                </div>
                            </section>
                        @endif

                        <!-- Education Section -->
                        @if(count($educations) > 0)
                            <section>
                                <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-gray-200">Education</h2>
                                <div class="space-y-6">
                                    @foreach($educations as $edu)
                                        <article class="p-6 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                            <!-- Degree and Major -->
                                            <h3 class="text-xl font-bold text-gray-900 mb-1">
                                                {{ $edu->degree }}{{ $edu->major ? ', ' . $edu->major : '' }}
                                            </h3>
                                            <!-- Institution -->
                                            <p class="text-base text-gray-800 mb-1">{{ $edu->institution }}</p>
                                            <!-- Graduation Year -->
                                            <p class="text-sm text-gray-600">Graduated {{ $edu->graduation_year }}</p>
                                        </article>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    </main>
                </div>
            </div>
        </div>
    </main>
@endsection
