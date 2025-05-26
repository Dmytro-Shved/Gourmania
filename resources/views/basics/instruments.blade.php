<x-layout>
    @section('title',  'Instruments')

    <livewire:filter/>

    {{-- Instruments --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            INSTRUMENTS
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Instruments Card --}}
    <div class="relative w-full bg-white px-6 pt-10 pb-8 mt-8 shadow-lg ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10 font-inclusive text-lg">
        <div class="mx-auto px-0">
            <p class="mb-3 text-black">
                <strong class="text-xl">The best kitchen tools and accessories for your home</strong><br>
                Properly selected tools significantly enhance the cooking experience and simplify food preparation. A high-quality, sharpened chef’s knife drastically improves efficiency in the kitchen, while a garlic press can save valuable time when preparing large batches of food.
            </p>

            <p class="mb-3 text-black">
                Over the years, kitchen tools may come and go, but there is a core selection of utensils we recommend using on a daily basis. If you're looking for more information about non-toxic and safe cooking utensils, please refer to the dedicated section on our website.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/main-instruments.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">High-quality chef’s knife</strong><br>
                We do not recommend using cheap knives, as they tend to dull quickly, rust, and negatively impact your workflow. Investing in a full-tang carbon steel chef’s knife will significantly enhance your kitchen efficiency. Look for a model that feels right in your hand, and make sure to sharpen and hone it regularly.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/high-quality-chefs-knife.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Affordable paring knives</strong><br>
                Lightweight and easy to clean, paring knives are ideal for quick slicing tasks. We recommend keeping several on hand. Budget-friendly options such as Kiwi brand knives offer excellent performance at a low price and are perfect for small tasks where a chef’s knife is not needed.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/paring-knives.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Durable cutting boards</strong><br>
                Epicurean cutting boards are a practical middle ground between plastic and heavy wooden boards. Made from compressed paper, they are lightweight, knife-friendly, and easy to clean by hand. For added safety, choose models with silicone grips for extra stability.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/cutting-boards.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Precise digital kitchen scale</strong><br>
                A digital kitchen scale is essential not only for baking but for any precise recipe. Whether you're brewing coffee or scaling up recipes, a scale accurate to at least 1g—or even 0.1g—is invaluable. This allows for repeatable results and easier adjustments.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/digital-kitchen-scale.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl ">Measuring cups and spoons</strong><br>
                Proper measurement is key to recipe success. We recommend using dry measuring cups for solids and liquid measuring cups for liquids. For organization and accuracy, we prefer the magnetic dry cups and ergonomic liquid cups by OXO.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/measuring-cups-spoons.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Instant-read thermometer</strong><br>
                Ensure food safety and consistency with an instant-read thermometer. It helps prevent under- or overcooked meals, especially for meats, coffee brewing, yogurt, and bread. Even budget models today offer great accuracy and speed.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/instant-read-thermometer.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Silicone spatulas</strong><br>
                These versatile tools are ideal for scraping bowls, stirring batters, and sautéing. Opt for heat-resistant silicone options with ergonomic handles. Models from OXO are long-lasting and easy to clean.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/spatulas.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Metal spatulas and turners</strong><br>
                Metal turners offer excellent control for flipping burgers, fish, and more. We suggest models compatible with your cookware—metal for cast iron, silicone for non-stick. OXO and Sur La Table offer reliable, comfortable designs.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/food-turners.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Stainless steel and silicone-tipped tongs</strong><br>
                Tongs provide safe and precise handling of hot food. For best results, choose spring-loaded tongs with pull-tab locks. Use silicone tips for non-stick cookware and bare stainless steel for better grip in cast iron or stainless pans.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/stainless-steel-tongs.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>

            <p class="mt-10 mb-3 text-black">
                <strong class="text-xl">Efficient garlic press</strong><br>
                A garlic press streamlines prep work for garlic-heavy dishes. Look for models with ergonomic handles and easy-to-clean components. The OXO garlic press stands out for its ease of use and built-in cleaning tool.
            </p>

            <div class="my-6 overflow-hidden rounded-md">
                <img src="{{ asset('storage/basics/instruments/garlic-press.webp') }}" alt="Best kitchen tools" class="w-full h-auto object-cover rounded-md" />
            </div>
        </div>
    </div>

    <br>
    <br>

   @include('partials.useful-links')

    <br>
    <br>
</x-layout>
