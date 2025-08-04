<?php

namespace App\Http\Controllers;

use App\Models\HomepageSection;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Get visible & ordered by 'order' column sections
        $homepageSections = HomepageSection::visible()->ordered()->get();

        // Map homepageSections to get a new array of sections
        $sections = $homepageSections->map(function ($section) {
            return [
                'id' => $section->slug,
                'title' => $section->name,
                'recipes' => $section->getRecipes(),
                'visible' => $section->visible,
                'order' => $section->order,
            ];
        });

        return view('index', compact('sections'));
    }
}
