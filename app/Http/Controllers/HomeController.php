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
        $sections = cache()->remember('homepage-sections', 60*60*24, function (){
            // 1. Get all homepage sections
            $homepageSections = HomepageSection::visible()->ordered()->get();

            // 2. Collect category slugs & limits
            $categorySlugs = $homepageSections
                ->where('type', 'category')
                ->pluck('category_slug')
                ->unique()
                ->toArray();

            $popularLimit = $homepageSections->where('type', 'popular')->max('limit') ?? 4;
            $latestLimit  = $homepageSections->where('type', 'latest')->max('limit') ?? 4;

            // 3. Batch load recipes for each type

            // Popular recipes
            $popularRecipes = Recipe::with(['dishCategory', 'cuisine'])
                ->popular()
                ->limit($popularLimit)
                ->get();

            // Latest recipes
            $latestRecipes = Recipe::with(['dishCategory', 'cuisine'])
                ->latest()
                ->limit($latestLimit)
                ->get();

            // All category recipes in one query
            $categoryRecipes = collect();
            if (!empty($categorySlugs)) {
                $categoryRecipes = Recipe::with(['dishCategory', 'cuisine'])
                    ->whereHas('dishCategory', fn($q) => $q->whereIn('slug', $categorySlugs))
                    ->get()
                    ->groupBy(fn($recipe) => $recipe->dishCategory->slug);
            }

            // 4. Assign recipes to sections
            return $homepageSections->map(function ($section) use ($popularRecipes, $latestRecipes, $categoryRecipes) {
                return [
                    'id' => $section->slug,
                    'title' => $section->name,
                    'recipes' => match ($section->type) {
                        'popular' => $popularRecipes->take($section->limit),
                        'latest' => $latestRecipes->take($section->limit),
                        'category' => $categoryRecipes->get($section->category_slug, collect())->take($section->limit),
                        default => collect(),
                    },
                    'visible' => $section->visible,
                    'order'   => $section->order,
                ];
            });
        });

        $statistics = cache()->remember('statistics-section', 60*60*24, function (){
           return [
               'recipesCount' => Recipe::count(),
               'authorsCount' => User::count(),
               'cuisinesCount' => Cuisine::count(),
           ];
        });

        $authorsOfTheWeek = cache()->remember('authors-section', 60*60*24, function (){
            return User::select(['id','name', 'photo'])->withCount([
                'recipes as popular_recipes_count' => fn($query) => $query->popular()
            ])
                ->having('popular_recipes_count', '>', 0)
                ->orderByDesc('popular_recipes_count')
                ->get();
        });

        return view('index', compact('sections', 'statistics', 'authorsOfTheWeek'));
    }
}
