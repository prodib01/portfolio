<div class="bg-gradient-to-br from-blue-50 to-white shadow-lg rounded-xl overflow-hidden p-8">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
        <p class="text-lg text-blue-600 mb-4">{{ $user->role }}</p>
        <p class="text-gray-600 max-w-2xl mx-auto">{{ $user->description }}</p>
    </div>

    <!-- Contact Bar -->
    <div class="flex flex-wrap justify-center gap-6 mb-12 text-sm text-gray-600">
        <a href="mailto:{{ $user->email }}" class="flex items-center gap-2 hover:text-blue-600">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            {{ $user->email }}
        </a>
        <span class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
            </svg>
            {{ $user->location }}
        </span>
        <a href="https://github.com/{{ $user->github_url }}" class="flex items-center gap-2 hover:text-blue-600">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2a10 10 0 0 0-3.16 19.5c.5.08.66-.23.66-.5v-1.69C6.73 19.91 6.14 18 6.14 18A2.69 2.69 0 0 0 5 16.5c-.91-.62.07-.6.07-.6a2.1 2.1 0 0 1 1.53 1 2.15 2.15 0 0 0 2.91.83c.05-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1-2.7a3.71 3.71 0 0 1 .1-2.71s.84-.27 2.75 1.02a9.5 9.5 0 0 1 5 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.71.65.7 1 1.59 1 2.7 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5A10 10 0 0 0 12 2Z"/>
            </svg>
            {{ $user->github_url }}
        </a>
        <a href="https://linkedin.com/in/{{ $user->linkedin_url }}" class="flex items-center gap-2 hover:text-blue-600">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                <rect x="2" y="9" width="4" height="12"/>
                <circle cx="4" cy="4" r="2"/>
            </svg>
            {{ $user->linkedin_url }}
        </a>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Skills -->
        <div class="lg:col-span-1">
            @if(count($skills) > 0)
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Skills & Expertise</h2>
                    <div class="space-y-3">
                        @foreach($skills as $skill)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">{{ $skill->name }}</span>
                                    <span class="text-sm text-gray-500">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Right Column: Experience and Education -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Experience Section -->
            @if(count($experiences) > 0)
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Professional Experience</h2>
                    <div class="space-y-6">
                        @foreach($experiences as $experience)
                            <div class="relative pl-8 pb-6 border-l-2 border-blue-600 last:pb-0">
                                <div class="absolute -left-2 top-0 w-4 h-4 bg-blue-600 rounded-full"></div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $experience->role }}</h3>
                                <p class="text-blue-600 mb-1">{{ $experience->company }}</p>
                                <p class="text-sm text-gray-500 mb-2">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                                <p class="text-gray-600">{{ $experience->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Education Section -->
            @if(count($educations) > 0)
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Education</h2>
                    <div class="space-y-6">
                        @foreach($educations as $edu)
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $edu->degree }}{{ $edu->major ? ', ' . $edu->major : '' }}
                                </h3>
                                <p class="text-blue-600">{{ $edu->institution }}</p>
                                <p class="text-sm text-gray-500">Graduated {{ $edu->graduation_year }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
