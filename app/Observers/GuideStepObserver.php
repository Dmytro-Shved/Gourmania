<?php

namespace App\Observers;

use App\Models\GuideStep;
use Illuminate\Support\Facades\Storage;

class GuideStepObserver
{
    // Check after saving step if image was changed
    // if it was changed delete the original (older image)
    public function saved(GuideStep $guideStep): void
    {
        if ($guideStep->wasChanged('step_image')) {
            $originalImage = $guideStep->getOriginal('step_image');

            if ($originalImage && $originalImage != GuideStep::DEFAULT_IMAGE) {
                Storage::disk('public')->delete($originalImage);
            }
        }
    }

    // If step was deleted, delete the image also
    public function deleted(GuideStep $guideStep): void
    {
        if (! is_null($guideStep->step_image) && $guideStep->step_image != GuideStep::DEFAULT_IMAGE) {
            Storage::disk('public')->delete($guideStep->step_image);
        }
    }
}
