<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\HomepageSection;
use App\Models\Recipe;
use App\Models\User;

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

        $statisticsData = cache()->remember('hero-section', 60*60*24, function (){
           return [
               'recipesCount' => Recipe::count(),
               'authorsCount' => User::count(),
               'cuisinesCount' => Cuisine::count(),
           ];
        });

        $authorsOfTheWeek = User::select(['id','name', 'photo'])->withCount([
            'recipes as popular_recipes_count' => fn($query) => $query->popular()
        ])
            ->having('popular_recipes_count', '>', 0)
            ->orderByDesc('popular_recipes_count')
            ->get();

        return view('index', compact('sections', 'statisticsData', 'authorsOfTheWeek'));
    }
}
