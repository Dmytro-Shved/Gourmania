<?php

namespace App\Observers;

use App\Models\DishCategory;
use Illuminate\Support\Str;

class DishCategoryObserver
{
    // Generate slug based on unique DishCategory name
    public function creating(DishCategory $dishCategory): void
    {
        $dishCategory->slug = Str::slug($dishCategory->name);
    }

    // Update slug based on unique DishCategory name
    public function updating(DishCategory $dishCategory): void
    {
        if ($dishCategory->isDirty('name')){
            $dishCategory->slug = Str::slug($dishCategory->name);
        }
    }
}
