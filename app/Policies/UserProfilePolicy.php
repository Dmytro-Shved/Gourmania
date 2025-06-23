<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;

class UserProfilePolicy
{
    public function edit(User $user, UserProfile $userProfile): bool
    {
        return $user->role_id == Role::IS_ADMIN || $user->id == $userProfile->user_id ;
    }

    public function update(User $user, UserProfile $userProfile): bool
    {
        return $user->role_id == Role::IS_ADMIN || $user->id == $userProfile->user_id;
    }

    public function viewSavedRecipes(User $user, UserProfile $userProfile): bool
    {
        return $user->role_id == Role::IS_ADMIN || $user->id == $userProfile->user_id;
    }

    public function viewLikedRecipes(User $user, UserProfile $userProfile): bool
    {
        return $user->role_id == Role::IS_ADMIN || $user->id == $userProfile->user_id;
    }
}
