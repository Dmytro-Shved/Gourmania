<?php

namespace App\Models;

use App\Observers\RecipeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

#[ObservedBy(RecipeObserver::class)]
class Recipe extends Model
{
    public const DEFAULT_IMAGE = 'recipes-images/default/default_photo.png';

    protected $fillable = [
        'name',
        'description',
        'image',
        'cook_time',
        'servings',
        'dish_category_id',
        'dish_subcategory_id',
        'user_id',
        'cuisine_id',
        'menu_id'
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function cuisine(): BelongsTo
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relation for the Filament Repeater
    public function ingredientRecipe(): HasMany
    {
        return $this->hasMany(IngredientRecipe::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)
            ->using(IngredientRecipe::class)
            ->withTimestamps()
            ->withPivot(['quantity', 'unit_id']);
    }

    public function dishCategory(): BelongsTo
    {
        return $this->belongsTo(DishCategory::class);
    }

    public function dishSubcategory(): BelongsTo
    {
        return $this->belongsTo(DishSubcategory::class);
    }

    public function guideSteps(): HasMany
    {
        return $this->hasMany(GuideStep::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function userVote(): HasOne
    {
        return $this->votes()->one()->where('user_id', auth()->id());
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'saved_recipes')
            ->withTimestamps()
            ->as('saved_recipes');
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->whereHas('votes', fn ($q) => $q->where('vote', 1))
            ->orWhereHas('savedByUsers')
            ->withCount([
            'votes as likesCount' => fn (Builder $query) => $query->where('vote', 1),
            'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', -1),
            'savedByUsers as savedCount',
        ])
            ->orderByDesc('savedCount')
            ->orderByDesc('likesCount')
            ->orderBy('dislikesCount')
            ->orderByDesc('created_at');
    }

    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }
}
