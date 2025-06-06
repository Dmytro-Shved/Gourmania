<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('logged_out', "You're out of the system! See you again soon!");
    }
}
