<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        // Validation & Create User
        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password),
        ]);

        // Auth
        Auth::login($user);

        // Dispatch Registered Event for Email Verification
        event(new Registered($user));

        // Redirect with session message
        return redirect()->route('home')->with('user_registered', 'Check your inbox to verify your email!');
    }
}
