@extends('layout')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Education History</h1>
            <a href="{{ route('educations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Add Education
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-6">
            @forelse ($educations as $education)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $education->degree }}</h2>
                            <p class="text-gray-600">{{ $education->institution }}</p>
                            <p class="text-gray-500 text-sm">
                                {{ optional($education->start_date)->format('Y') }} - {{ $education->graduation_year }}
                            </p>


                            <div class="mt-4">
                                <p class="text-gray-700"><strong>Major:</strong> {{ $education->major }}</p>
                                @if($education->gpa)
                                    <p class="text-gray-700"><strong>GPA:</strong> {{ $education->gpa }}</p>
                                @endif
                            </div>

                            @if($education->honors)
                                <div class="mt-4">
                                    <h3 class="font-semibold text-gray-700">Honors & Achievements</h3>
                                    <p class="text-gray-600">{{ $education->honors }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="flex space-x-2">
                            <a href="{{ route('educations.edit', $education) }}" class="text-blue-600 hover:text-blue-800">
                                Edit
                            </a>
                            <form action="{{ route('educations.destroy', $education) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this entry?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-600">No education history added yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
