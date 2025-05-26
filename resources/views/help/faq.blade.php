<x-layout>
    @section('title',  'Frequently asked questions')

    <livewire:filter/>

    {{-- FAQ --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
           FAQ
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- FAQ Card --}}
    <div class="relative w-full bg-white px-6 pt-10 pb-8 mt-8 shadow-lg ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10 font-inclusive">
        <div class="mx-auto px-5">
            <div class="mx-auto mt-8 grid max-w-xl divide-y divide-neutral-200">
                <div class="py-5">
                    <details class="group">
                        <summary class="faq-question">
                             <span>How to add recipe?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                     stroke="#AE763E" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="group-open:animate-fadeIn mt-3 text-neutral-600">
                            <p><span class="bg-gourmania rounded-full px-2.5 py-1 text-white text-sm">1</span> Enter the name of the recipe. It should be clear and reflect the type and ingredients of your dish. Note the hint: if the name of your recipe matches any of the recipe names in our catalog, it’s likely that the dish already exists on the gourmania website. If your dish is still different from the existing ones, change the name. For example, instead of “Pepperoni Pizza,” write “Pepperoni Pizza with Cheddar Cheese.”</p>
                            <br>
                            <p><span class="bg-gourmania rounded-full px-2.5 py-1 text-white text-sm">2</span> Specify the ingredients, their quantities, and units of measurement. Do not include the names of prepared dishes as ingredients, and be sure to use the correct units of measurement: do not measure liquids in grams, and vegetables in milliliters.</p>
                            <br>
                            <p><span class="bg-gourmania rounded-full px-2.5 py-1 text-white text-sm">3</span> Specify the cooking time, number of servings, and dish category.</p>
                            <br>
                            <p><span class="bg-gourmania rounded-full px-2.5 py-1 text-white text-sm">4</span> Check your recipe for any errors and, if necessary, edit it.</p>
                        </div>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="faq-question">
                            <span>How can I save my favorite recipes?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                     stroke="#AE763E" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">You can save your favorite recipe to your recipe book using the red bookmark on each recipe.</p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="faq-question">
                            <span>Do I need to create an account to access recipes?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                     stroke="#AE763E" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Yes, to create your own recipe you must be logged in to our website, if you haven't registered yet,
                            <a class="underline text-[#AE763E]" href="{{ route('register-page') }}">you can do it now!</a></p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="faq-question">
                            <span>Is it free?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                     stroke="#AE763E" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Of course, you can use the site and its resources without paying for anything.</p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="faq-question">
                            <span> How do I contact support?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                     stroke="#AE763E" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">If you need help with our platform or
                            have any other questions, you can contact the company's support team by submitting a support
                            request through the website or by emailing <span class="text-[#AE763E]">support@gourmania.com</span>.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                            <span>What recipes are on our website?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                     stroke="#AE763E" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Our site contains a wide variety of recipes from different cuisines and different categories, find out more in our
                            <a class="underline text-[#AE763E]" href="{{ route('recipes.index') }}">catalog</a>
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    {{-- Useful links title --}}
    <div class="title-container text-center">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            USEFUL LINKS
        </small>
    </div>

    {{-- Useful links section --}}
    <div class="w-[320px] sm:w-[400px] md:w-[500px] lg:md:w-[550px] xl:md:w-[600px] mx-auto px-5">
        <div class="flex flex-row">
            <div>
                <button class="relative block overflow-hidden group w-full">
                    <a class="block">
                        <img
                            class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                            src="{{ asset('storage/images/useful-link-basics-min-opt.webp') }}"
                            alt="Basics"
                        >
                    </a>
                </button>
                <span class="flex justify-center pt-1 font-inclusive text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]">BASICS</span>
            </div>
            <div>
                <button class="relative block overflow-hidden group w-full">
                    <a class="block">
                        <img
                            class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                            src="{{ asset('storage/images/useful-link-techniques-min-opt.webp') }}"
                            alt="Techniques"
                        >
                    </a>
                </button>
                <span class="flex justify-center pt-1 font-inclusive text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]">TECHNIQUES</span>
            </div>
        </div>
    </div>

    <br>
    <br>
</x-layout>
