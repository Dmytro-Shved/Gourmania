<?php

namespace App\Livewire;

use App\Models\Recipe;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Bookmark extends Component
{
    public Recipe $recipe;
    public bool $isSaved = false;

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe;
        $this->isSaved = $recipe->savedByUsers->contains('id', auth()->id());
    }

    public function toggleSave(): void
    {
        $this->validateAccess();

        if ($this->isSaved){
            $this->recipe->savedByUsers()->detach(auth()->id());
            $this->isSaved = false;
        }else{
            $this->recipe->savedByUsers()->attach(auth()->id());
            $this->isSaved = true;
        }
    }

    public function render()
    {
        return view('livewire.bookmark');
    }

    // Check if user is authenticated to be able to save recipe
    private function validateAccess(): bool
    {
        return (bool) throw_if(
            auth()->guest(),
            ValidationException::withMessages(['unauthenticated' => 'You need to <a href="' . route('login-page') . '" class="underline">login</a> to save recipes'])
        );
    }
}
