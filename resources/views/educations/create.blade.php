@extends('layout')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Add Education</h1>
                <a href="{{ route('educations.index') }}" class="text-blue-600 hover:text-blue-800">
                    Back to List
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('educations.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6">
                        <div>
                            <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                            <input type="text" name="institution" id="institution" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('institution') }}" required>
                            @error('institution')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                            <input type="text" name="degree" id="degree" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('degree') }}" required>
                            @error('degree')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="major" class="block text-sm font-medium text-gray-700">Major</label>
                            <input type="text" name="major" id="major" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('major') }}" required>
                            @error('major')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('start_date') }}">
                                @error('start_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="graduation_year" class="block text-sm font-medium text-gray-700">Graduation Year</label>
                                <input type="number" name="graduation_year" id="graduation_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('graduation_year') }}" required min="1900" max="{{ date('Y') + 10 }}">
                                @error('graduation_year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="gpa" class="block text-sm font-medium text-gray-700">GPA</label>
                            <input type="number" name="gpa" id="gpa" step="0.01" min="0" max="4.0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('gpa') }}">
                            @error('gpa')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="honors" class="block text-sm font-medium text-gray-700">Honors & Achievements</label>
                            <textarea name="honors" id="honors" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('honors') }}</textarea>
                            @error('honors')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Additional Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                Save Education
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
