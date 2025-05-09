<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Attributes\On;
use Livewire\Component;

class DislikeButton extends Component
{
    public Recipe $recipe;

    public function toggleDislike()
    {
        $this->dispatch('refresh-likes');

        // Check if user is authenticated
        if (auth()->guest()){
            return $this->redirect(route('login-page'));
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

        // return dislikeBy()
        return $this->recipe->dislikeBy($user);
    }

    #[On('refresh-dislikes')]
    public function render()
    {
        return view('livewire.dislike-button');
    }
}
