<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
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
}

