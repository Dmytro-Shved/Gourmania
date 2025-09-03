<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class BasicsController extends Controller
{
    public function tools()
    {
        $toolsFile = resource_path('markdown/basics/tools.md');

        return view('basics.tools', [
            'tools' => Str::markdown(file_get_contents($toolsFile))
        ]);
    }

    public function techniques()
    {
        $techniquesFile = resource_path('markdown/basics/techniques.md');

        return view('basics.techniques', [
           'techniques' => Str::markdown(file_get_contents($techniquesFile))
        ]);
    }
}
