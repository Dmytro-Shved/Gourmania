<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show Profile
    public function show_profile(User $user)
    {
        return view('user.user-profile', compact('user'));
    }

    // Show Edit Profile Page
    public function edit_profile(User $user)
    {
        return view('user.edit-profile', compact('user'));
    }

    // Update Profile Data
    public function update_profile(UpdateProfileRequest $request, User $user)
    {
        // Validate

        // Update User + Profile

        // redirect
    }

}
