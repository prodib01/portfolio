@extends('layout')
@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
            <div class="text-center sm:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    My Projects
                </h2>
                <p class="mt-3 text-lg text-gray-600">
                    Explore some of my recent work and projects.
                </p>
            </div>
            <div class="mt-6 sm:mt-0">
                <a href="{{ route('projects.create') }}"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add New Project
                </a>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="mt-12 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($projects as $project)
                <div class="bg-white shadow-md rounded-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    @if($project->image)
                        <img src="{{ asset('storage/project_images/' . $project->image) }}"
                             alt="{{ $project->title }}"
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="px-6 py-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            {{ $project->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            {{ Str::limit($project->description, 100, '...') }}
                        </p>

                        @if($project->technologies)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(explode(',', $project->technologies) as $tech)
                                    <span class="px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex flex-col gap-2">
                            @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" class="text-blue-500 text-sm hover:underline">
                                    GitHub Repository
                                </a>
                            @endif
                            @if($project->live_link)
                                <a href="{{ $project->live_link }}" target="_blank" class="text-blue-500 text-sm hover:underline">
                                    Live Preview
                                </a>
                            @endif
                        </div>

                        <div class="mt-6 flex items-center justify-between">
                            <a href="{{ route('projects.edit', $project) }}"
                               class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Edit
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 text-sm font-medium text-red-600 bg-red-100 hover:bg-red-200 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <div class="bg-white p-12 rounded-lg shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h3 class="mt-4 text-lg font-semibold text-gray-900">No projects yet</h3>
                        <p class="mt-2 text-gray-500">Start by creating your first project now.</p>
                        <a href="{{ route('projects.create') }}" class="inline-flex items-center mt-6 px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Your First Project
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
