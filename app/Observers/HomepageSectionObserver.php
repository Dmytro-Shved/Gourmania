<?php

namespace App\Observers;

use App\Models\HomepageSection;
use Illuminate\Support\Str;

class HomepageSectionObserver
{
    // Generate slug based on unique HomepageSection name
    public function creating(HomepageSection $homepageSection): void
    {
        $homepageSection->slug = Str::slug($homepageSection->name);
    }

    // Update slug based on unique HomepageSection name
    public function updating(HomepageSection $homepageSection): void
    {
        if ($homepageSection->isDirty('name')){
            $homepageSection->slug = Str::slug($homepageSection->name);
        }
    }
}
