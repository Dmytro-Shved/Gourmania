<?php

namespace App\Http\Controllers;

use App\Models\DishCategory;
use App\Models\Recipe;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        return view('recipes.recipes');
    }
}
