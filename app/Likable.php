<?php

namespace App;

use App\Models\Like;
use App\Models\User;

trait Likable
{
    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function unlike($user = null, $liked = true)
    {
        $this->likes()
            ->where([
                'user_id' => $user ? $user->id : auth()->id(),
                'recipe_id' => $this->id,
                'liked' => $liked
            ])
            ->delete();
    }

    public function undislike($user = null)
    {
        $this->unlike($user, false);
    }

    public function isLikedBy(User $user, $liked = true)
    {
        return (bool) $user->likes
            ->where([
                'recipe_id' => $this->id,
                'liked' => $liked
            ])
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return $this->isLikedBy($user, false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
