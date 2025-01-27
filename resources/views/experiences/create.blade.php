@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    Add New Experience
                </h2>
                <p class="mt-2 text-gray-600">
                    Share details about your latest experience
                </p>
            </div>

            <form method="POST" action="{{ route('experiences.store') }}" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700">
                        Company Name
                    </label>
                    <input type="text"
                           name="company"
                           id="company"
                           value="{{ old('company') }}"
                           required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Enter company name">
                    @error('company')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">
                        Position
                    </label>
                    <input type="text"
                     name="role"
                              id="role"
                              required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              placeholder="What is your position?">{{ old('role') }}</>
                    @error('role')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">
                Description
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

                <!-- GitHub Link -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">
                        Start Date
                    </label>
                    <input type="date"
                           name="start_date"
                           id="start_date"
                           value="{{ old('start_date') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           >
                    @error('start_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Live Link -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">
                        End Date
                    </label>
                    <input type="date"
                           name="end_date"
                           id="end_date"
                           value="{{ old('end_date') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           >
                    @error('end_date')
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
