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
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2a10 10 0 0 0-3.16 19.5c.5.08.66-.23.66-.5v-1.69C6.73 19.91 6.14 18 6.14 18A2.69 2.69 0 0 0 5 16.5c-.91-.62.07-.6.07-.6a2.1 2.1 0 0 1 1.53 1 2.15 2.15 0 0 0 2.91.83c.05-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1-2.7a3.71 3.71 0 0 1 .1-2.71s.84-.27 2.75 1.02a9.5 9.5 0 0 1 5 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.71.65.7 1 1.59 1 2.7 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5A10 10 0 0 0 12 2Z"/>
                        </svg>
                        <a href="https://github.com/{{ $user->github_url }}"
                           target="_blank"
                           class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                            {{ $user->github_url }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                            <rect x="2" y="9" width="4" height="12"/>
                            <circle cx="4" cy="4" r="2"/>
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
                                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $experience->role }}</h3>
                                <p class="text-base text-gray-800 mb-1">{{ $experience->company }}</p>
                                <p class="text-sm text-gray-600 mb-3">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
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
                                <h3 class="text-xl font-bold text-gray-900 mb-1">
                                    {{ $edu->degree }}{{ $edu->major ? ', ' . $edu->major : '' }}
                                </h3>
                                <p class="text-base text-gray-800 mb-1">{{ $edu->institution }}</p>
                                <p class="text-sm text-gray-600">Graduated {{ $edu->graduation_year }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </main>
    </div>
</div>
