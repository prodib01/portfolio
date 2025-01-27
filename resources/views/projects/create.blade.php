@extends('layout')
@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">
                Create New Project
            </h2>
            <p class="mt-2 text-gray-600">
                Share details about your latest project
            </p>
        </div>

        <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
            @csrf
            
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">
                    Project Title
                </label>
                <input type="text" 
                       name="title" 
                       id="title"
                       value="{{ old('title') }}"
                       required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="Enter project title">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Project Description
                </label>
                <textarea name="description" 
                          id="description"
                          rows="4"
                          required
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                          placeholder="Describe your project">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Technologies -->
            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700">
                    Technologies Used
                </label>
                <input type="text" 
                       name="technologies" 
                       id="technologies"
                       value="{{ old('technologies') }}"
                       required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="e.g. Laravel, Vue.js, Tailwind (comma-separated)">
                <p class="mt-1 text-sm text-gray-500">
                    Separate technologies with commas
                </p>
                @error('technologies')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- GitHub Link -->
            <div>
                <label for="github_link" class="block text-sm font-medium text-gray-700">
                    GitHub Repository Link
                </label>
                <input type="url" 
                       name="github_link" 
                       id="github_link"
                       value="{{ old('github_link') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="https://github.com/username/repository">
                @error('github_link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Live Link -->
            <div>
                <label for="live_link" class="block text-sm font-medium text-gray-700">
                    Live Project Link
                </label>
                <input type="url" 
                       name="live_link" 
                       id="live_link"
                       value="{{ old('live_link') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="https://yourproject.com">
                @error('live_link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Hidden User ID -->
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-4">
                <a href="{{ route('projects.index') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection