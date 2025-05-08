<?php

namespace App;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Likable
{
    public function likeBy($user = null, $liked = true): bool
    {
        return (bool) $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislikeBy($user = null): bool
    {
        return $this->likeBy($user, false);
    }

    public function unlikeBy($user = null, $liked = true): bool
    {
        return (bool) $this->likes()
            ->where([
                'user_id' => $user ? $user->id : auth()->id(),
                'recipe_id' => $this->id,
                'liked' => $liked
            ])
            ->delete();
    }

    public function undislikeBy($user = null): bool
    {
        return $this->unlikeBy($user, false);
    }

    public function isLikedBy(User $user, $liked = true): bool
    {
        return (bool) $user->likes
            ->where([
                'recipe_id' => $this->id,
                'liked' => $liked
            ])
            ->count();
    }

    public function isDislikedBy(User $user): bool
    {
        return $this->isLikedBy($user, false);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
