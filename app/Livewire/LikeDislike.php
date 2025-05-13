<?php

namespace App\Livewire;

use App\Models\Recipe;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class LikeDislike extends Component
{
    public Recipe $recipe;
    public ?Vote $userVote = null;
    public int $likes = 0;
    public int $dislikes = 0;
    public int $lastUserVote = 0;

    public function mount(Recipe $recipe): void
    {
        $this->recipe = $recipe;
        $this->userVote = $recipe->userVote;
        $this->likes = $recipe->likesCount;
        $this->dislikes = $recipe->dislikesCount;
        $this->lastUserVote =  $this->userVote->vote ?? 0;
    }

    // Like
    public function like()
    {
        $this->validateAccess();

        if ($this->hasVoted(1)){
            $this->updateVote(0);
            return;
        }

        $this->updateVote(1);
    }

    // Dislike
    public function dislike()
    {
        $this->validateAccess();

        if ($this->hasVoted(-1)){
            $this->updateVote(0);
            return;
        }

        $this->updateVote(-1);
    }

    public function render()
    {
        return view('livewire.like-dislike');
    }

    private function updateVote(int $val): void
    {
        if ($this->userVote){
            $this->recipe->votes()->update(['user_id' => auth()->id(), 'vote' => $val]);
        }else{
            $this->userVote = $this->recipe->votes()->create(['user_id' => auth()->id(), 'vote' => $val]);
        }

        $this->setLikesAndDislikesCount($val);

        $this->lastUserVote = $val;
    }

    private function setLikesAndDislikesCount(int $val): void
    {
        match (true){
            $this->lastUserVote === 0 && $val === 1 => $this->likes++, // default => like
            $this->lastUserVote === 0 && $val === -1 => $this->dislikes++, // default => dislike
            $this->lastUserVote === 1 && $val === 0 => $this->likes--, // like => default
            $this->lastUserVote === -1 && $val === 0 => $this->dislikes--, // dislike => default
            // dislike => like
            $this->lastUserVote === -1 && $val === 1 => call_user_func(function (){
                $this->dislikes--;
                $this->likes++;
            }),
            // like => dislike
            $this->lastUserVote === 1 && $val === -1 => call_user_func(function (){
                $this->dislikes++;
                $this->likes--;
            }),
        };
    }

    // Check if user has voted already
    private  function hasVoted($val): bool
    {
        return $this->userVote && $this->userVote->vote === $val;
    }

    // Check if user is authenticated to be able to vote
    private function validateAccess(): bool
    {
        return (bool) throw_if(
            auth()->guest(),
            ValidationException::withMessages(['unauthenticated' => 'You need to <a href="' . route('login-page') . '" class="underline">login</a> to click like/dislike'])
        );
    }
}
