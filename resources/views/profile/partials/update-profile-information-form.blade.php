<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Profile Picture
        </h2>
    </header>

    <form method="POST" action="{{ route('profile.picture.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('POST')



        <div>
            <img
                src="{{ $profile_picture }}"
                alt="Profile Picture"
                class="w-32 h-32 rounded-full object-cover mb-4"
            >

            <input
                type="file"
                name="profile_picture"
                accept="image/*"
                class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100"
            >

            @error('profile_picture')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update Profile Picture') }}</x-primary-button>

            @if (session('status') === 'profile-picture-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Profile picture updated.') }}</p>
            @endif
        </div>
    </form>
</section>
