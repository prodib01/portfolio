@extends('layout')
@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
            <div class="text-center sm:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Experiences
                </h2>
            </div>
            <div class="mt-6 sm:mt-0">
                <a href="{{ route('experiences.create') }}"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add New Experience
                </a>
            </div>
        </div>

        <div class="mt-12 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($experiences as $experience)
                <div class="bg-white shadow-md rounded-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="px-6 py-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">
                                {{ $experience->company }}
                            </h3>
                            <span class="px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full">
                                {{ $experience->role }}
                            </span>
                        </div>

                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} -
                            @if($experience->end_date)
                                {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                            @else
                                Present
                            @endif
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $experience->description }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No experiences found. Add your first experience!</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
