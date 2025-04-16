<x-layout>
    @section('title',  'Recipes and more')

    @if(session()->has('user_registered'))
        <!-- User Registered -->
        <div x-data="{ show : true }" class="absolute self-end end-1 z-30">
            <div x-show="show" x-transition
                class="bg-green-500 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Success!</p>
                <span class="block sm:inline">{{ session('user_registered') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  @click="show = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @elseif(session()->has('logged_out'))
        <!-- Logged Out -->
        <div x-data="{ show : true }" class="absolute self-end end-1 z-30">
            <div x-show="show" x-transition
                 class="bg-red-500 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Logged out!</p>
                <span class="block sm:inline">{{ session('logged_out') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  @click="show = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @elseif(session()->has('logged_in'))
        <!-- Logged In -->
        <div x-data="{ show : true }" class="absolute self-end end-1 z-30">
            <div x-show="show" x-transition
                 class="bg-green-500 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Logged in!</p>
                <span class="block sm:inline">{{ session('logged_in') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  @click="show = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @endif

    {{-- Main page--}}
    <div class="font-inclusive text-xl">
        {{-- Slogan --}}
        <div class="title-container select-none">
            <span class="flex-grow border-t border-black"></span>
            <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                BEST CHOICE FOR GOURMETS
            </small>
            <span class="flex-grow border-t border- border-black"></span>
        </div>

        {{-- Stats --}}
        <div class="flex justify-between items-center">
            <img class="max-sm:size-10 max-sm:hidden sm:size-14 md:size-16 lg:size-20 select-none"
                 src="{{ asset('storage/objects/leaf.svg')  }}" alt="" rel="preload">
            <img class="max-sm:size-4 xs:size-5 sm:hidden select-none"
                 src="{{ asset('storage/objects/leave_right_mobile.svg')  }}" alt="" rel="preload">

            <div class="stats-text">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#88C9CB" class="bi bi-circle-fill stats-ball"
                     viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
                <span>999 original recipes</span>
            </div>

            <div class="stats-text">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#CCD5AE" class="bi bi-circle-fill stats-ball"
                     viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
                <span>1000 authors</span>
            </div>

            <div class="stats-text">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FEDC56" class="bi bi-circle-fill stats-ball"
                     viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
                <span>Explore 50+ world cuisines</span>
            </div>

            <img class="max-sm:size-10 max-sm:hidden sm:size-14 md:size-16 lg:size-20 transform scale-x-[-1] select-none"
                 src="{{ asset('storage/objects/leaf.svg')  }}" alt="" rel="preload">
            <img class="max-sm:size-4 xs:size-5 sm:hidden transform scale-x-[-1] select-none"
                 src="{{ asset('storage/objects/leave_right_mobile.svg')  }}" alt="" rel="preload">
        </div>

        {{-- Filter --}}
        <livewire:filter/>

        <br>

        {{-- Popular recipes --}}
        <div class="title-container">
            <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                POPULAR RECIPES
            </small>
            <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        </div>

        {{-- Carousel --}}
        <div x-data="{
                        slides: [
                            {
                                {{-- Image 1 --}}
                                imgSrc: '{{ asset('storage/recipes-images/steak_mushrooms_asparagus_103375_1920x1080-min-opt.webp') }}',
                                imgAlt: 'A perfectly grilled steak served with potatoes and greens.',
                                title: 'Delicious Steak',
                                description: 'A tender and juicy steak, cooked to perfection, paired with crispy potatoes.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                            {
                                {{-- Image 2 --}}
                                imgSrc: '{{ asset('storage/recipes-images/salmon_teriyaki_fish_108544_1920x1080-min-opt.webp') }}',
                                imgAlt: 'Fresh fish fillet served on a plate with soy sauce and sesame seeds.',
                                title: 'Grilled Fish',
                                description: 'A delicate and flavorful grilled fish, perfect for any seafood lover.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                            {
                                {{-- Image 3--}}
                                imgSrc: '{{ asset('storage/recipes-images/pizza_pastry_appetizing_117398_1920x1080-min-opt.webp') }}',
                                imgAlt: 'Hot pizza with cheese and toppings, sliced and ready to eat.',
                                title: 'Hot Pizza',
                                description: 'A delicious pizza with crispy crust, melted cheese, and your favorite toppings.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                        ],
                        currentSlideIndex: 1,
                        previous() {
                            if (this.currentSlideIndex > 1) {
                                this.currentSlideIndex = this.currentSlideIndex - 1
                            } else {
                                this.currentSlideIndex = this.slides.length
                            }
                        },
                        next() {
                            if (this.currentSlideIndex < this.slides.length) {
                                this.currentSlideIndex = this.currentSlideIndex + 1
                            } else {
                                this.currentSlideIndex = 1
                            }
                        },
                    }" class="relative w-full overflow-hidden">

            {{-- previous button --}}
            <button type="button"
                    class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                    aria-label="previous slide"
                    x-on:click="previous()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                     stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </button>

            {{-- next button --}}
            <button type="button"
                    class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                    aria-label="next slide"
                    x-on:click="next()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                     stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </button>

            {{-- slides --}}
            {{-- Change min-h-[50svh] to your preferred height size --}}
            <div class="relative min-h-[50svh] w-full">
                <template
                    x-for="(slide, index) in slides">
                    <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                         x-transition.opacity.duration.1000ms

                    >
                        <div
                            class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                            <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white"
                                x-text="slide.title"
                                x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                            <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300"
                               x-text="slide.description" x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                            <button type="button" x-cloak x-show="slide.ctaUrl !== null"
                                    class="mt-2 cursor-pointer whitespace-nowrap rounded-md border border-white bg-transparent px-4 py-2 text-center text-xs font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-onSurfaceDarkStrong active:opacity-100 active:outline-offset-0 md:text-sm"
                                    x-text="slide.ctaText"></button>
                        </div>

                        <img
                            class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                            x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt"/>
                    </div>
                </template>
            </div>

            {{-- indicators --}}
            <div
                class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2"
                role="group" aria-label="slides">
                <template x-for="(slide, index) in slides">
                    <button class="size-2 cursor-pointer rounded-full transition"
                            x-on:click="currentSlideIndex = index + 1"
                            x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-300' : 'bg-neutral-300/50']"
                            x-bind:aria-label="'slide ' + (index + 1)"></button>
                </template>
            </div>
        </div>

        <br>

        {{-- Latest recipes title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                LATEST RECIPES
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Latest recipes grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/meat_stake_cuts_10247_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Delicious meat steak</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pizza_food_glass_73012_800x1200-min-opt.webp') }} "
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh hot pizza</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/french_fries_appetizing_greens_112053_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Crispy french fries</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_vegetables_leaves_88299_800x1200-min-opt.webp')  }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">A salad full of vitamins</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/noodles_sauce_cheese_112659_800x1200-min-opt.webp') }}"
                         alt="Image 5">

                    <div class="hover-overlay">
                        <span class="overlay-text">Pasta with vegetables and grated cheese</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pancakes_berries_dessert_157035_800x1200-min-opt.webp') }}"
                         alt="Image 6">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fluffy pancakes with sour cream and raspberries</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/food_fish_herbs_108877_800x1200-min-opt.webp') }}"
                         alt="Image 7">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh fish with rice and herbs</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/soup_toast_dish_208792_800x1200-min-opt.webp') }}"
                         alt="Image 8">

                    <div class="hover-overlay">
                        <span class="overlay-text">Flavorful soup with crispy toast</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Meat dishes title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                MEAT DISHES
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Meat dishes grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/meat_stake_cuts_10247_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Delicious meat steak</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pork_vegetables_meat_109770_800x1200-min-opt.webp') }}"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh pork with vegetables</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/meat_baking_vegetables_88477_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Hot backed meat with vegetables</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/meat_pork_dinner_112587_800x1200-min-opt.webp') }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">Pork with sauce</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Salads title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                SALADS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Salads grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_vegetables_leaves_108329_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Salad with vegetables, leaves, spinach and cucumbers</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_vegetables_eggs_114547_800x1200-min-opt.webp') }}"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Healthy salad with vegetables, eggs and carrots</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_cheese_fruit_107087_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Aromatic cheese, fruits and vegetables</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_lemon_cherry_tomatoes_107795_800x1200-min-opt.webp') }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">Sour lemon with fresh cherry tomatoes and fresh herbs</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Breakfasts title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                BREAKFASTS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Breakfasts grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pancakes_raspberries_syrup_115255_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Pancakes with raspberries and syrup</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/fried_eggs_bacon_toast_102470_800x1200-min-opt.webp') }}"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh scrambled eggs and meat</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/belgian_waffle_waffle_berries_873742_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fluffy waffles</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/granola_strawberry_berries_207990_800x1200-min-opt.webp') }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">Granola with strawberry</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Bakery title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                BAKERY
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Bakery grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/bread_almonds_cakes_112884_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Soft, flavorful bread</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/donut_icing_still_life_163211_800x1200-min-opt.webp') }}"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Doughnuts with glaze and sprinkles </span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/croissant_berries_strawberries_180033_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Delicious croissants</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cookies_chocolate_dessert_874621_800x1200-min-opt.webp') }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">Chocolate chip cookie</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Desserts title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                DESSERTS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Desserts grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/tartlet_berries_cream_111477_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Tartalette with berries and cream</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/icecream_balls_bilberry_45151_800x1200-min-opt.webp') }}"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Chilled ice cream</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cake_souffles_cream_114050_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Tender tiramisu</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cupcake_cherry_berries_289705_800x1200-min-opt.webp') }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">Cupcake with cream and berries</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Drinks title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                DRINKS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Drinks grid --}}
        {{-- All images are 800 x 1200 --}}
        <div class="section-container">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/tea_cup_lemon_209994_800x1200-min-opt.webp') }}"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Warming flavored tea</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/coffee_drink_cup_207326_800x1200-min-opt.webp') }}"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Invigorating coffee</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/mojito_drink_lemon_177472_800x1200-min-opt.webp') }}"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">A refreshing mojito</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cocktail_mint_glass_272604_800x1200-min-opt.webp') }}"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">Mint Cocktail</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Basics title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                BASICS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Basics section --}}
        <div class="w-full md:max-w-[768px] lg:max-w-[1024px] xl:max-w-[1280px] mx-auto sm:px-5">
            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img
                        class="w-full h-auto transform transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('storage/images/basics.webp') }}"
                        alt="Basics"
                    >
                    <div
                        class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-medium px-4 text-center">
                                Having the right tools can make cooking and food preparation much more enjoyable
                            </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Techniques title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                TECHNIQUES
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Techniques section --}}
        <div class="w-full md:max-w-[768px] lg:max-w-[1024px] xl:max-w-[1280px] mx-auto sm:px-5">
            <video class="w-full h-auto" controls autoplay loop>
                <source src="{{ asset('storage/video/video-optimized.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        <br>

        {{-- Authors of the week title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                AUTHORS OF THE WEEK
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Authors of the week section --}}
        <section id="authors" class="bg-gray-100">
            <div class="container mx-auto px-4 lg:px-20 xl:px-52 2xl:px-80">
                <div class="grid grid-cols-3 gap-3">
                    <!-- Author 1 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 1" class="author-image">
                            <h3 class="author-name">Zlatan Ibrahimovic</h3>
                        </a>
                    </div>

                    <!-- Author 2 -->
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyWZYVXCeOjQRWl6iQxGJatl7HqVTqW2Imeg&s"
                                alt="Team Member 2" class="author-image">
                            <h3 class="author-name">Drew Peterson</h3>
                        </a>
                    </div>

                    <!-- Author 3 -->
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFXBWELSJOytVPVMyycXAQRwpU0SDCY_ylHA&s"
                                alt="Team Member 3" class="author-image">
                            <h3 class="author-name">Jane McIntosh</h3>
                        </a>
                    </div>

                    <!-- Author 4 -->
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://static.vecteezy.com/system/resources/thumbnails/000/364/628/small_2x/Chef_Avatar_Illustration-03.jpg"
                                alt="Team Member 4" class="author-image">
                            <h3 class="author-name">Peter Johnson</h3>
                        </a>
                    </div>

                    <!-- Author 5 -->
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfWjzc8VJEvch8Q0OfClMZ9dxtj6jvkNFQog&s"
                                alt="Team Member 5" class="author-image">
                            <h3 class="author-name">Emily Brown</h3>
                        </a>
                    </div>

                    <!-- Author 6 -->
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz9rBL0A1tN-LBsNdCgl_ZSPNH2ffSOIzDRw&s"
                                alt="Team Member 6" class="author-image">
                            <h3 class="author-name">Anna Cook</h3>
                        </a>
                    </div>

                    <!-- Author 7 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 7" class="author-image">
                            <h3 class="author-name">Sarah Johnson</h3>
                        </a>
                    </div>

                    <!-- Author 8 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 8" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    <!-- Author 9 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 9" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    <!-- Author 10 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 10" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    <!-- Author 11 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 11" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    <!-- Author 12 -->
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 12" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <br>
    </div>
</x-layout>
