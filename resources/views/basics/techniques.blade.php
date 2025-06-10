<x-layout>
    @section('title',  'Techniques')

    <livewire:filter/>

    {{-- Techniques --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            TECHNIQUES
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Techniques Card --}}
    <div class="relative w-full bg-white px-6 pt-10 pb-8 mt-8 shadow-lg ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10 font-inclusive text-lg">
        <div class="mx-auto px-0">
            {{-- Title --}}
            <p class="mb-3 text-black">
                <strong class="text-xl">Practice the Fundamental Cooking Methods and Techniques</strong><br>
                The “cooking” part of cooking is really a long list of different techniques. Boiling, simmering, poaching, steaming, roasting, baking, grilling, broiling, frying, sauteing, and combination techniques like braising are all unique methods used for different results.
            </p>

            {{-- Boiling --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Boiling</strong><br>
                Boiling is perhaps the simplest of all cooking methods, cooking food in hot liquid like water or stock at a temperature of at least 212°F.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/boiling.webp') }}" alt="Boiling" class="w-full h-auto object-cover rounded-md" />
            </div>

            {{-- Simmering and poaching --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Simmering and poaching </strong><br>
                Simmering and poaching are methods similar to boiling, in that they are moist-heat methods achieved in hot liquid, however they are executed at lower temperatures. Simmering is achieved at a temperature of around 180°F- 200°F, and poaching is done at a temperature between 160°F and 180°F.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/simmering-and-poaching.webp') }}" alt="Simmering and poaching" class="w-full h-auto object-cover rounded-md" />
            </div>

            {{-- Steaming --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Steaming</strong><br>
                Steaming is a fourth moist-heat method that is achieved by allowing hot vapor generated from liquid to cook the food, and it’s considered one of the gentlest cooking methods.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/steammed_veggies.webp') }}" alt="Steaming" class="w-full h-auto object-cover rounded-md" />
            </div>

            {{-- Baking and Roasting --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Baking and Roasting</strong><br>
                Steaming is a fourth moist-heat method that is achieved by allowing hot vapor generated from liquid to cook the food, and it’s considered one of the gentlest cooking methods.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/baking-and-roasting.webp') }}" alt="Baking and Roasting" class="w-full h-auto object-cover rounded-md" />
            </div>

            {{-- Grilling and broiling  --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Grilling and broiling</strong><br>
                Steaming is a fourth moist-heat method that is achieved by allowing hot vapor generated from liquid to cook the food, and it’s considered one of the gentlest cooking methods.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/grilling-and-broiling.webp') }}" alt="Grilling and broiling" class="w-full h-auto object-cover rounded-md" />
            </div>

            {{-- Frying --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Frying</strong><br>
                Steaming is a fourth moist-heat method that is achieved by allowing hot vapor generated from liquid to cook the food, and it’s considered one of the gentlest cooking methods.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/frying.webp') }}" alt="Frying" class="w-full h-auto object-cover rounded-md" />
            </div>

            {{-- Sautéeing --}}
            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Sautéeing</strong><br>
                Sautéeing is done in a pan with just a small amount of oil, usually on the stovetop.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/techniques/sauteeing.webp') }}" alt="Sautéeing" class="w-full h-auto object-cover rounded-md" />
            </div>
        </div>
    </div>
    <div class="my-16">
        @include('partials.useful-links')
    </div>
</x-layout>
