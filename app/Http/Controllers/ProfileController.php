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
     * Update profile picture
     */
    public function updateProfilePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif'
        ]);

        $user = $request->user();

        // Remove old profile picture if exists
        if ($user->profile_picture) {
            Storage::delete('public/profile_pictures/' . $user->profile_picture);
        }

        // Store new profile picture
        $filename = uniqid() . '.' . $request->file('profile_picture')->getClientOriginalExtension();
        $request->file('profile_picture')->storeAs('public/profile_pictures', $filename);

        // Update user's profile picture
        $user->profile_picture = $filename;
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-picture-updated');
    }
}
