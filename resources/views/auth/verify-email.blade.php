<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/vPsLc1c/gourmania-favicon.png">
    <title>Gourmania | Verify Email</title>

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
    @livewireStyles
</head>
<body>

@if(session()->has('email_verification_resend'))
    {{-- Email Verification Resend --}}
    <x-session.message :message="session('email_verification_resend')" type="info" />
@endif

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4 font-inclusive">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl mt-12 font-bold text-gray-900 mb-6 text-center">Verify your email through the email we've sent you</h2>

        <div class="mt-10 text-center text-sm text-gray-600 sm:flex sm:justify-center sm:gap-2">
            <p>Didn't get the message?</p>
        </div>

        {{-- Send email again form --}}
        <form action="{{ route('verification.send') }}" method="POST" class="space-y-4">
            @csrf
            <button type="submit" class="w-full bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                Send again
            </button>
        </form>

        <div class="flex justify-center mt-[30.5px]">
            <img class="size-48" src="{{ asset('storage/objects/bread.svg') }}" alt="Bread">
        </div>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@livewireScripts
</body>
</html>
