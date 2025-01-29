@extends('layout')
@section('content')
    <main class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Template Selection & Download Section -->
            <div class="flex items-center justify-between mb-8 bg-white rounded-lg p-4 shadow-sm">
                <div class="flex items-center gap-6">
                    <span class="text-sm font-medium text-gray-700">Template Style:</span>
                    <div class="flex items-center gap-4">
                        <!-- Template 1 Radio -->
                        <label class="relative flex items-center gap-2 cursor-pointer group">
                            <input type="radio"
                                   name="template"
                                   value="template1"
                                   class="peer sr-only"
                                   onchange="selectTemplate('template1')"
                                {{ ($user->template ?? 'template1') === 'template1' ? 'checked' : '' }}>
                            <div class="w-4 h-4 border-2 border-gray-300 rounded-full peer-checked:border-blue-600 peer-checked:border-[5px] transition-all duration-200"></div>
                            <span class="text-sm text-gray-600 peer-checked:text-blue-600 group-hover:text-blue-600">Professional</span>
                        </label>

                        <!-- Template 2 Radio -->
                        <label class="relative flex items-center gap-2 cursor-pointer group">
                            <input type="radio"
                                   name="template"
                                   value="template2"
                                   class="peer sr-only"
                                   onchange="selectTemplate('template2')"
                                {{ $user->template === 'template2' ? 'checked' : '' }}>
                            <div class="w-4 h-4 border-2 border-gray-300 rounded-full peer-checked:border-blue-600 peer-checked:border-[5px] transition-all duration-200"></div>
                            <span class="text-sm text-gray-600 peer-checked:text-blue-600 group-hover:text-blue-600">Modern</span>
                        </label>

                        <!-- Template 3 Radio -->
                        <label class="relative flex items-center gap-2 cursor-pointer group">
                            <input type="radio"
                                   name="template"
                                   value="template3"
                                   class="peer sr-only"
                                   onchange="selectTemplate('template3')"
                                {{ $user->template === 'template3' ? 'checked' : '' }}>
                            <div class="w-4 h-4 border-2 border-gray-300 rounded-full peer-checked:border-blue-600 peer-checked:border-[5px] transition-all duration-200"></div>
                            <span class="text-sm text-gray-600 peer-checked:text-blue-600 group-hover:text-blue-600">Minimal</span>
                        </label>

                        <label class="relative flex items-center gap-2 cursor-pointer group">
                            <input type="radio"
                                   name="template"
                                   value="template4"
                                   class="peer sr-only"
                                   onchange="selectTemplate('template4')"
                                   {{ $user->template == 'template4' ? 'checked' : '' }}>
                            <div class="w-4 h-4 border-2 border-gray-300 rounded-full peer-checked:border-blue-600 peer-checked:border-[5px] transition-all duration-200"></div>
                            <span class="text-sm text-gray-600 peer-checked:text-blue-600 group-hover:text-blue-600">Expert</span>
                        </label>
                    </div>
                </div>

                <!-- Download Button -->
                <a href="{{ route('download.resume') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download PDF
                </a>
            </div>

            <!-- Resume Preview -->
            <div id="resume-preview">
                @include('resumes.templates.' . ($user->template ?? 'template1'), [
                    'user' => $user,
                    'experiences' => $experiences,
                    'educations' => $educations,
                    'projects' => $projects,
                    'skills' => $skills,
                ])
            </div>
        </div>
    </main>

    <script>
        function selectTemplate(template) {
            fetch('/update-template', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ template: template })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchResumePreview(template);
                    } else {
                        alert('Failed to update template.');
                    }
                });
        }

        function fetchResumePreview(template) {
            fetch(`/resume-preview?template=${template}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('resume-preview').innerHTML = html;
                });
        }
    </script>
@endsection
