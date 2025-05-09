<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Attributes\On;
use Livewire\Component;

class LikeButton extends Component
{
    public Recipe $recipe;

    public function toggleLike()
    {
        $this->dispatch('refresh-dislikes');

        // Check if user is authenticated
        // if so, get the user
        if (! $user = auth()->user()){
            return $this->redirect(route('login-page'));
        }

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

    #[On('refresh-likes')]
    public function render()
    {
        return view('livewire.like-button');
    }
}
