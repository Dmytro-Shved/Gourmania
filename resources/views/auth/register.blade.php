<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/vPsLc1c/gourmania-favicon.png">
    <title>Gourmania | Register</title>

    {{-- Inknut Antiqua --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Inclusive Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital@0;1&display=swap" rel="stylesheet">

    {{-- Inria Serif --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4 font-inclusive">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-10 text-center">Sign Up</h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input
                    name="username"
                    type="text"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]"
                    placeholder="Gordon"
                    value="{{ old('username') }}"
                />
                @error('username')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    name="email"
                    type="text"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]"
                    placeholder="your@email.com"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 ">Password</label>
                <input
                    name="password"
                    type="password"
                    class="@error('password') border-red-500 @enderror w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]"
                    placeholder="••••••••"
                />
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 ">Password Confirmation</label>
                <input
                    name="password_confirmation"
                    type="password"
                    class="@error('password') border-red-500 @enderror w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]"
                    placeholder="••••••••"
                />
            </div>

            <button type="submit" class="w-full bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                Continue
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600 sm:flex sm:justify-center sm:gap-2">
            <p>Already have an account?</p>
            <a href="{{ route('login-page') }}" class="text-[#AE763E] hover:underline">Log In here</a>
        </div>

        <div class="flex justify-center mt-5">
            <img class="size-14" src="{{ asset('storage/objects/unopened-dish.svg') }}" alt="">
        </div>
    </div>

</div>

{{--<script src="../path/to/flowbite/dist/flowbite.min.js"></script>--}}
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@livewireScripts
</body>
</html>
