<?php

namespace App\Models;

use App\Observers\DishCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(DishCategoryObserver::class)]
class DishCategory extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function dishSubcategories(): HasMany
    {
        return $this->hasMany(DishSubcategory::class);
    }
}
