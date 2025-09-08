<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class LegalController extends Controller
{
    public function privacy()
    {
        $privacyFile = resource_path('markdown/legal/privacy.md');

        return view('legal.privacy', [
            'privacy' => Str::markdown(file_get_contents($privacyFile))
        ]);
    }

    public function terms()
    {
        $termsFile = resource_path('markdown/legal/terms.md');

        return view('legal.terms', [
            'terms' => Str::markdown(file_get_contents($termsFile))
        ]);
    }
}
