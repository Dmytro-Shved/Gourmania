<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserProfile;

class UserProfilePolicy
{
    public function modify(User $user, UserProfile $userProfile): bool
    {
        return $user->id === $userProfile->user_id;
    }
}
