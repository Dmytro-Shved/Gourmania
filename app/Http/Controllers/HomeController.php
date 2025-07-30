<?php

namespace App\Http\Controllers;

use App\Models\HomepageSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get visible and ordered homepage sections
         $homepageSections = HomepageSection::visible()->ordered()->get();

         // Map sections to get a new array of sections
         $sections = $homepageSections->map(function ($section){
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
