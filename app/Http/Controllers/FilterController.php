<?php

namespace App\Http\Controllers;

use App\Models\DishCategory;
use App\Models\Recipe;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public  function filter(Request $request)
    {
        dump($request);

        return view('recipes.recipes');
    }
}

// 1. logic with searching for a recipes

// 2. if there is no parameters in filter, then give 20 last recipes + pagination

// 3. return page recipes with filtered recipes

// 4. ALSO TRY TO CREATE A LOGIC TO GENERATE A TITLE FOR recipes.blade.php
