<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/2jPbxvC/logo-round.png">
    <title>Gourmania | Recipes and more</title>

    {{-- Inknut Antiqua --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- Inclusive Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital@0;1&display=swap" rel="stylesheet">

    {{-- Inria Serif --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body>
<nav class="bg-gourmania">
    <div>
        {{-- Logo --}}
        <a href="#" class="flex items-center">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="Gourmania"
            class="w-9 h-9 p-0.5 sm:w-12 sm:h-12 md:w-16 md:h-16 lg:w-20 lg:h-20 xl:w-24 xl:h-24 2xl:w-28 2xl:h-28">
            <h1 class="font-inknut text-sm text-white sm:text-md md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl">Gourmania</h1>
        </a>
    </div>

    {{-- Links --}}
    <div>
        <a href="#" class="nav-link md:text-lg lg:text-xl xl:text-2xl">Recipes</a>
        <a href="#" class="nav-link md:text-lg lg:text-xl xl:text-2xl">Authors</a>
        <a href="#" class="nav-link md:text-lg lg:text-xl xl:text-2xl">Basics</a>
        <a href="#" class="nav-link md:text-lg lg:text-xl xl:text-2xl">Cuisines</a>
    </div>

    {{-- Find a recipe --}}
    <div class="flex items-center ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-5 lg:size-6 xl:size-7 2xl:size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
        <input class="rounded-3xl text-sm xl:text-lg  font-inclusive focus:border-white focus:ring-0 outline-none w-32 h-8 sm:w-36 sm:h-10 md:w-40 lg:w-44 xl:w-48 2xl:w-52 2xl:h-12" placeholder="Find a recipe..." type="text">
    </div>

    {{-- My recipes --}}
    <a href="#"  class="flex text-center items-center text-white font-inclusive hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5" stroke="darkred" class="size-5 lg:size-6 xl:size-7 2xl:size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
        </svg>
        <h2 class="text-sm md:text-lg xl:text-2xl">My recipes</h2>
    </a>
</nav>







{{--<nav class="gourmania-bg flex items-center text-center text-white w-full">--}}
{{--    <div class="flex items-center">--}}
{{--        --}}{{-- Logo --}}
{{--        <a href="" class="flex items-center space-x-2">--}}
{{--            <img src="{{ asset('storage/logo/logo.png') }}" alt="" class="w-28 h-28 p-0.5">--}}
{{--            <h1 class="text-4xl text-white font-inknut">Gourmania</h1>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    --}}{{-- Links --}}
{{--    <div class="ml-8 flex space-x-6 items-center">--}}
{{--        <a class="nav-link" href="#">Recipes</a>--}}
{{--        <a class="nav-link" href="#">Authors</a>--}}
{{--        <a class="nav-link" href="#">Basics</a>--}}
{{--        <a class="nav-link" href="#">News</a>--}}
{{--        <a class="nav-link" href="#">Cuisines</a>--}}
{{--    </div>--}}

{{--    --}}{{-- Find a recipe --}}
{{--    <div class="flex items-center pl-5 p-3 m-5 space-x-1">--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">--}}
{{--            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />--}}
{{--        </svg>--}}

{{--        <input class="rounded-3xl font-inclusive text-black text-xl h-14 w-64 focus:border-white focus:ring-white focus:outline-none" placeholder="Find a recipe..." type="text">--}}
{{--    </div>--}}

{{--    --}}{{-- My recipes --}}
{{--    <a href="" class="font-inclusive text-2xl">--}}
{{--        <div class="flex items-center space-x-3 ">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5" stroke="darkred" class="size-8">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />--}}
{{--            </svg>--}}

{{--            <p class="space-x-3">My recipes</p>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--</nav>--}}
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
