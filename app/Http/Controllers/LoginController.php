<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), $request->remember)){
            $request->session()->regenerate();

            return redirect()->route('home')->with('logged_in', "Welcome back!");
        }else{
            return redirect()->back()->withErrors([
                'login-failed' => 'The provided credentials do not match our records'
            ]);
        }
    }
}
