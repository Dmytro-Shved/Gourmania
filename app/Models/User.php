<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function booted(): void
    {
        // Create profile after user creation
        static::created(function ($user){
            $user->profile()->create();
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role_id == Role::IS_ADMIN;
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function savedRecipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'saved_recipes');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function likedRecipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'votes')
            ->withPivot('vote')
            ->wherePivot('vote', 1);
    }
}
