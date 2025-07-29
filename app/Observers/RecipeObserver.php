<?php

namespace App\Observers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeObserver
{
    // Check after saving Recipe if image was changed
    // if it was changed delete the original (older image)
    public function saved(Recipe $recipe): void
    {
        if ($recipe->wasChanged('image')) {
            $originalImage = $recipe->getOriginal('image');

            if ($originalImage && $originalImage != Recipe::DEFAULT_IMAGE) {
                Storage::disk('public')->delete($originalImage);
            }
        }
    }

    // If Recipe was deleted, delete the image also
    public function deleted(Recipe $recipe): void
    {
        if (! is_null($recipe->image) && $recipe->image != Recipe::DEFAULT_IMAGE) {
            Storage::disk('public')->delete($recipe->image);
        }
    }
}
