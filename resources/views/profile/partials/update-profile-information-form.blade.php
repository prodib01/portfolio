<section class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-sm">
    <header class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">
            Profile & Description
        </h2>
    </header>

    <form method="POST" action="{{ route('profile.picture.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('POST')

        <!-- Profile Picture -->
        <div class="flex flex-col items-center">
            <div class="relative group">
                <img
                    src="{{ $profile_picture }}"
                    alt="Profile Picture"
                    class="w-40 h-40 rounded-full object-cover border-4 border-white shadow-lg"
                >
                <div class="absolute inset-0 rounded-full bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <span class="text-white text-sm">Change Picture</span>
                </div>
            </div>

            <input
                type="file"
                name="profile_picture"
                accept="image/*"
                class="mt-4 block w-full text-sm text-gray-600
                    file:mr-4 file:py-2.5 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-medium
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100
                    transition duration-150 ease-in-out"
            >
            @error('profile_picture')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-700">
                Description
            </label>
            <textarea
                id="description"
                name="description"
                rows="4"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm resize-none"
                placeholder="Write something about yourself..."
            >{{ old('description', $description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email Address
            </label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $email) }}"
                class="mt-1 block w-full rounded-md border-gray-300"
            >
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Full Name
            </label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $name) }}"
                class="mt-1 block w-full rounded-md border-gray-300"
            >
            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Profile Fields Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Role -->
            <div class="space-y-2">
                <label for="role" class="block text-sm font-medium text-gray-700">
                    Current Role
                </label>
                <input
                    type="text"
                    id="role"
                    name="role"
                    value="{{ old('role', $role) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                    placeholder="What is your current role?"
                >
                @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="space-y-2">
                <label for="phone" class="block text-sm font-medium text-gray-700">
                    Phone Number
                </label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $phone) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                    placeholder="+1 (555) 000-0000"
                >
                @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Github -->
            <div class="space-y-2">
                <label for="github_url" class="block text-sm font-medium text-gray-700">
                    GitHub Profile
                </label>
                <input
                    type="url"
                    id="github_url"
                    name="github_url"
                    value="{{ old('github_url', $github_url) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                    placeholder="https://github.com/username"
                >
                @error('github_url')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- LinkedIn -->
            <div class="space-y-2">
                <label for="linkedin_url" class="block text-sm font-medium text-gray-700">
                    LinkedIn Profile
                </label>
                <input
                    type="url"
                    id="linkedin_url"
                    name="linkedin_url"
                    value="{{ old('linkedin_url', $linkedin_url) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                    placeholder="https://linkedin.com/in/username"
                >
                @error('linkedin_url')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button and Status -->
        <div class="flex items-center gap-4 pt-4">
            <x-primary-button class="px-6">
                {{ __('Update Profile') }}
            </x-primary-button>

            @if (session('status') === 'profile-picture-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >{{ __('Profile updated successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
