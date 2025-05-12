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
        // Check if user is authenticated
        // if so, get the user
        if (!$user = auth()->user()){
            return $this->redirect(route('login-page'));
        }

        // Check if user has already liked recipe
        // if true, then return unlike()
        $hasLiked = $this->recipe->isLikedBy($user);
        if ($hasLiked){
            $this->recipe->unlikeBy($user);
        }else{
            $this->recipe->likeBy($user);
        }

        return $this->dispatch('refresh-dislikes');
    }

    #[On('refresh-likes')]
    public function render()
    {
        return view('livewire.like-button');
    }
}
