<div class="min-h-full bg-[#FAFAFA]">
    <!-- Header with Geometric Pattern -->
    <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%">
                <pattern id="pattern-hex" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse">
                    <rect width="16" height="16" fill="none"/>
                    <path d="M8 1L15 4.5V11.5L8 15L1 11.5V4.5L8 1Z" stroke="currentColor" fill="none"/>
                </pattern>
                <rect width="100%" height="100%" fill="url(#pattern-hex)"/>
            </svg>
        </div>

        <div class="relative text-center text-white">
            <h1 class="text-5xl font-bold mb-2">{{ $user->name }}</h1>
            <p class="text-xl text-blue-100">{{ $user->role }}</p>
        </div>
    </div>

    <!-- Contact & Social Links -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-5xl mx-auto px-6 py-4">
            <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-gray-600">
                <a href="mailto:{{ $user->email }}" class="flex items-center gap-2 hover:text-blue-600">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                    </svg>
                    {{ $user->email }}
                </a>

                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    {{ $user->location }}
                </span>

                <a href="https://github.com/{{ $user->github_url }}"
                   target="_blank"
                   class="flex items-center gap-2 hover:text-blue-600">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a10 10 0 0 0-3.16 19.5c.5.08.66-.23.66-.5v-1.69C6.73 19.91 6.14 18 6.14 18A2.69 2.69 0 0 0 5 16.5c-.91-.62.07-.6.07-.6a2.1 2.1 0 0 1 1.53 1 2.15 2.15 0 0 0 2.91.83c.05-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1-2.7a3.71 3.71 0 0 1 .1-2.71s.84-.27 2.75 1.02a9.5 9.5 0 0 1 5 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.71.65.7 1 1.59 1 2.7 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5A10 10 0 0 0 12 2Z"/>
                    </svg>
                    Github
                </a>

                <a href="https://linkedin.com/in/{{ $user->linkedin_url }}"
                   target="_blank"
                   class="flex items-center gap-2 hover:text-blue-600">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                        <rect x="2" y="9" width="4" height="12"/>
                        <circle cx="4" cy="4" r="2"/>
                    </svg>
                    LinkedIn
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="space-y-8">
                <!-- About Section -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">About Me</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $user->description }}</p>
                </div>

                <!-- Skills Section -->
                @if(count($skills) > 0)
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Skills</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <div class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-sm">
                                    {{ $skill->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="md:col-span-2 space-y-8">
                <!-- Experience Section -->
                @if(count($experiences) > 0)
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Experience</h2>
                        <div class="space-y-6">
                            @foreach($experiences as $experience)
                                <div class="relative pl-8 pb-6 border-l-2 border-blue-200 last:pb-0">
                                    <div class="absolute -left-[9px] top-2 w-4 h-4 bg-white border-2 border-blue-500 rounded-full"></div>
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mb-2">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $experience->role }}</h3>
                                        <span class="text-blue-600">•</span>
                                        <span class="text-gray-600">{{ $experience->company }}</span>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-2">{{ $experience->start_date }} — {{ $experience->end_date }}</p>
                                    <p class="text-gray-600">{{ $experience->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Education Section -->
                @if(count($educations) > 0)
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Education</h2>
                        <div class="space-y-6">
                            @foreach($educations as $edu)
                                <div class="relative pl-8 pb-6 border-l-2 border-blue-200 last:pb-0">
                                    <div class="absolute -left-[9px] top-2 w-4 h-4 bg-white border-2 border-blue-500 rounded-full"></div>
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mb-2">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $edu->degree }}{{ $edu->major ? ', ' . $edu->major : '' }}</h3>
                                    </div>
                                    <p class="text-gray-600 mb-1">{{ $edu->institution }}</p>
                                    <p class="text-sm text-gray-500">Graduated {{ $edu->graduation_year }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
