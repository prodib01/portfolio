<div class="bg-white shadow-lg rounded-xl overflow-hidden">
    <!-- Header -->
    <div class="border-b border-gray-100 px-8 py-12">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-light text-gray-900 mb-4">{{ $user->name }}</h1>
            <p class="text-lg text-gray-600 mb-6">{{ $user->role }}</p>
            <div class="flex flex-wrap justify-center gap-x-8 gap-y-2 text-sm text-gray-500">
                <span>{{ $user->email }}</span>
                <span>{{ $user->phone }}</span>
                <span>{{ $user->location }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-8 py-12">
        <!-- About -->
        <div class="mb-16 text-center">
            <p class="text-gray-600 leading-relaxed">{{ $user->description }}</p>
        </div>

        <!-- Experience -->
        @if(count($experiences) > 0)
            <div class="mb-16">
                <h2 class="text-2xl font-light text-gray-900 mb-8 text-center">Experience</h2>
                <div class="space-y-12">
                    @foreach($experiences as $experience)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-right text-gray-500">
                                <p>{{ $experience->start_date }} — {{ $experience->end_date }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 mb-1">{{ $experience->role }}</h3>
                                <p class="text-gray-600 mb-2">{{ $experience->company }}</p>
                                <p class="text-gray-500 text-sm">{{ $experience->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Education -->
        @if(count($educations) > 0)
            <div class="mb-16">
                <h2 class="text-2xl font-light text-gray-900 mb-8 text-center">Education</h2>
                <div class="space-y-8">
                    @foreach($educations as $edu)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-right text-gray-500">
                                <p>{{ $edu->graduation_year }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 mb-1">
                                    {{ $edu->degree }}{{ $edu->major ? ', ' . $edu->major : '' }}
                                </h3>
                                <p class="text-gray-600">{{ $edu->institution }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Skills -->
        @if(count($skills) > 0)
            <div>
                <h2 class="text-2xl font-light text-gray-900 mb-8 text-center">Skills</h2>
                <div class="flex flex-wrap justify-center gap-2">
                    @foreach($skills as $skill)
                        <span class="px-4 py-2 bg-gray-50 text-gray-700 rounded-full text-sm">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
