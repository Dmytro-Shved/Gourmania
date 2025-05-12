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
        // Check if user is authenticated
        // if so, get the user
        if (!$user = auth()->user()){
            return $this->redirect(route('login-page'));
        }

        // Check if user has already disliked recipe
        // if true, then return undislike()
        $hasDisliked = $this->recipe->isDislikedBy($user);
        if ($hasDisliked){
            $this->recipe->undislikeBy($user);
        }else{
            $this->recipe->dislikeBy($user);
        }

        return $this->dispatch('refresh-likes');
    }

    #[On('refresh-dislikes')]
    public function render()
    {
        return view('livewire.dislike-button');
    }
}
