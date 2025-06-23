<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\Role;
use App\Models\User;

class RecipePolicy
{
    public function edit(User $user, Recipe $recipe): bool
    {
        return $user->role_id == Role::IS_ADMIN || $recipe->user_id == $user->id;
    }

    public function delete(User $user, Recipe $recipe): bool
    {
        return $user->role_id == Role::IS_ADMIN || $recipe->user_id == $user->id;
    }
}
