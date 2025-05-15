<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        // Validation & Create User
        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password),
        ]);

        // Create User Profile
        UserProfile::create(['user_id' => $user->id]);

        // Send Welcome Email
        event(new UserRegisteredEvent($user->name, $user->email));

        // Auth
        Auth::login($user);

        // Redirect with session message
        return redirect()->route('home')->with('user_registered', 'You have successfully registered in our system!');
    }
}
