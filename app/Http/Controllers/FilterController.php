<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public  function filter(Request $request)
    {

        dd($request);



        // logic with searching for a recipes

        // if there is no parameters in filter, then give 20 last recipes + pagination

        // return page recipes with filtered recipes

        // ALSO TRY TO CREATE A LOGIC TO GENERATE A TITLE FOR recipes.blade.php

        return view('recipes.recipes');
    }
}
