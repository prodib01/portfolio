<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Existing methods...

    /**
     * Update profile picture and description.
     */
    public function updateProfilePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable|string|max:500',
            'role' => 'nullable|string',
            'phone' => 'nullable|string',
            'github_url' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'emails' => 'nullable|emails',
        ]);

        $user = $request->user();

        // Remove old profile picture if exists and is valid
        if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture)) {
            Storage::delete('public/profile_pictures/' . $user->profile_picture);
        }

        // Store new profile picture
        $filename = uniqid() . '.' . $request->file('profile_picture')->getClientOriginalExtension();
        $request->file('profile_picture')->storeAs('public/profile_pictures', $filename);

        // Update user's profile picture and description
        $user->profile_picture = $filename;
        $user->description = $request->input('description');
        $user->role = $request->input('role');
        $user->github_url = $request->input('github_url');
        $user->linkedin_url = $request->input('linkedin_url');
        $user->phone = $request->input('phone');
        $user->email = $request->input('emails');
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-picture-updated');
    }

    /**
     * Edit user profile.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'description' => $request->user()->description,
            'role' => $request->user()->role,
            'github_url' => $request->user()->github_url,
            'linkedin_url' => $request->user()->linkedin_url,
            'phone' => $request->user()->phone,
            'emails' => $request->user()->email,
            'profile_picture' => $request->user()->profile_picture
                ? asset('storage/profile_pictures/' . $request->user()->profile_picture)
                : asset('default-avatar.png'),
        ]);
    }
}
