<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class DislikeButton extends Component
{
    public Recipe $recipe;

    public function toggleDislike(): bool
    {
        // Check if user is authenticated
        if (auth()->guest()){
            $this->redirect(route('login-page'));
        }

        // Get authenticated user
        $user = auth()->user();

        // Check if user has already disliked recipe
        // if true, then return undislike()
        $hasDisliked = $user->likes()->where([
           'recipe_id' => $this->recipe->id,
           'liked' => false
        ])->exists();

        if ($hasDisliked){
            return $this->recipe->undislikeBy($user);
        }

        // return like()
        return $this->recipe->dislikeBy($user);
    }

    public function render()
    {
        return view('livewire.dislike-button');
    }
}
