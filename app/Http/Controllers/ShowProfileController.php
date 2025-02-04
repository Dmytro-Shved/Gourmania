<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class ShowProfileController extends Controller
{
    // Show the users profile
    public function show_profile($id)
    {
        // Find the user with related profile
        $user = User::with('profile')->findOrFail($id);

        return view('user.user-profile', compact('user'));
    }
}
