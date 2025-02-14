<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Old photo
        $path = $user->photo;

        // If we have new image, delete old image and save the new one
        if ($request->hasFile('photo')){
            if ($user->photo){
                Storage::disk('public')->delete($user->photo);
            }
            $path = Storage::disk('public')->put('user_logo', $request->photo);
        }

        // Validation
        $user->update([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'photo' => $path
        ]);

        $user->profile->update($request->only(['gender', 'birth_date', 'description']));

        // redirect
        return redirect()->back()->with('profile_updated', 'Your profile was successfully updated!');
    }

}
