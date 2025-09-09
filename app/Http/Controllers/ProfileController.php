<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show Profile
    public function showProfile(User $user)
    {
        // requires package: composer require ajcastro/eager-load-pivot-relation
        $userRecipes = $user->recipes()
            ->with(['user', 'ingredients.pivot.unit', 'cuisine', 'dishCategory', 'savedByUsers'])
            ->withCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
                'savedByUsers as savedCount'
            ])
            ->get();

        return view('user.user-profile', compact('user', 'userRecipes'));
    }

    // Show Edit Profile Page
    public function edit(User $user)
    {
        // Authorizing the action
        Gate::authorize('edit', $user->profile);

        return view('user.edit-profile', compact('user'));
    }

    // Update Profile Data
    public function update(UpdateProfileRequest $request, User $user)
    {
        // Authorizing the action
        Gate::authorize('update', $user->profile);

        // Old photo
        $path = $user->photo;

        // If we have new image, delete old image and save the new one
        if ($request->hasFile('photo')){
            if ($user->photo && $user->photo != User::DEFAULT_IMAGE ){
                Storage::disk('public')->delete($user->photo);
            }
            $path = Storage::disk('public')->put('user_logo', $request->photo);
        }

        // If there is a new password in request, update it
        if ($request->validated('password')){
            $user->update(['password' => Hash::make($request->password)]);
        }

        $oldEmail = $user->email;

        // Validation
        $user->update([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'photo' => $path
        ]);

        // If olf email is not was the validated one, send email verification message again
        if ($oldEmail != $request->validated('email')){
            $user->update(['email_verified_at' => null]);
            $user->sendEmailVerificationNotification();
        }

        $user->profile->update($request->only(['gender', 'birth_date', 'description']));

        // redirect
        return redirect()->back()->with('profile_updated', 'Profile updated!');
    }

    // Delete Profile
    public function destroy(Request $request, User $user)
    {
        // Authorizing the action
        Gate::authorize('delete', $user->profile);

        $request->session()->regenerateToken();

        $user->delete();

        // redirect
        return redirect()->route('home')->with('profile_deleted', 'Profile deleted');
    }

    public function savedRecipes(User $user)
    {
        // Authorizing the action
        Gate::authorize('viewSavedRecipes', $user->profile);

        return view('user.saved-recipes');
    }

    public function likedRecipes(User $user)
    {
        // Authorizing the action
        Gate::authorize('viewLikedRecipes', $user->profile);

        return view('user.liked-recipes');
    }
}
