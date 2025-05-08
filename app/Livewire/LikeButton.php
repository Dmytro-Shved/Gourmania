<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class LikeButton extends Component
{
    public Recipe $recipe;

    public function toggleLike(): bool
    {
        // Check if user is authenticated
        if (auth()->guest()){
            $this->redirect(route('login-page'));
        }

        // Get authenticated user
        $user = auth()->user();

        // Check if user has already liked recipe
        // if true, then return unlike()
        $hasLiked = $user->likes()->where([
            'recipe_id' => $this->recipe->id,
            'liked' => true
        ])->exists();

        if ($hasLiked){
            return $this->recipe->unlikeBy($user);
        }

        // return like()
        return $this->recipe->likeBy($user);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
