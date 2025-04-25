<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DishCategory extends Model
{
    protected $fillable = [
      'name'
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
