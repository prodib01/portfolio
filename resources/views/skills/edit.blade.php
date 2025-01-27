@extends('layout')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-bold mb-6">Edit Skill</h2>

                <form action="{{ route('skills.update', $skill) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Skill Name</label>
                        <input type="text" name="name" id="name"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                               value="{{ old('name', $skill->name) }}" required>
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="proficiency" class="block text-gray-700 text-sm font-bold mb-2">
                            Proficiency (%)
                        </label>
                        <input type="range" name="proficiency" id="proficiency"
                               class="w-full" min="0" max="100" step="5"
                               value="{{ old('proficiency', $skill->proficiency) }}" required>
                        <div class="text-center text-sm text-gray-600">
                            <span id="proficiencyValue">{{ $skill->proficiency }}</span>%
                        </div>
                        @error('proficiency')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hoover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Update Skill
                        </button>
                        <a href="{{ route('skills.index') }}" class="text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const proficiencyInput = document.getElementById('proficiency');
        const proficiencyValue = document.getElementById('proficiencyValue');

        proficiencyInput.addEventListener('input', function() {
            proficiencyValue.textContent = this.value;
        });
    </script>
@endsection
