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
        $sections = cache()->remember('homepage-sections', now()->addDay(), function (){
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
                    'type' => $section->type,
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

        $stats = cache()->remember('statistics-section', now()->addDay(), function (){
           return [
               'recipesCount' => Recipe::count(),
               'authorsCount' => User::count(),
               'cuisinesCount' => Cuisine::count(),
           ];
        });

        $authorsOfTheWeek = cache()->remember('authors-of-the-week', now()->addDay(), function (){
            return User::query()
                ->select([
                    'id',
                    'name',
                    'photo',
                ])
                ->selectSub(function ($query) {
                    $query->selectRaw(
                        'COUNT(CASE WHEN votes.vote = 1 THEN 1 END) * 1 + ' .
                        'COUNT(CASE WHEN votes.vote = -1 THEN 1 END) * 1 + ' .
                        'COUNT(DISTINCT saved_recipes.id) * 2'
                    )
                        ->from('recipes')
                        ->leftJoin('votes', 'votes.recipe_id', '=', 'recipes.id')
                        ->leftJoin('saved_recipes', 'saved_recipes.recipe_id', '=', 'recipes.id')
                        ->whereColumn('recipes.user_id', 'users.id');
                }, 'popularity_score')
                ->having('popularity_score', '>', 0)
                ->orderByDesc('popularity_score')
                ->limit(12)
                ->get();
        });

        return view('index', compact('sections', 'stats', 'authorsOfTheWeek'));
    }
}
