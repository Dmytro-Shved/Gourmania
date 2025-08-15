<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{
    public function __invoke(HomeService $homeService)
    {
        return view('index', $homeService->getHomeData());
    }
}
