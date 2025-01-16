<x-layout>
    {{-- Main page--}}
    <div class="font-inclusive text-xl">
        {{-- Slogan --}}
        <div class="title-container">
            <span class="flex-grow border-t border-black"></span>
            <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                BEST CHOICE FOR GOURMETS
            </small>
            <span class="flex-grow border-t border- border-black"></span>
        </div>

        {{-- Stats --}}
        <div class="flex justify-between items-center">
            <img class="max-sm:size-10 max-sm:hidden sm:size-14 md:size-16 lg:size-20"
                 src="{{ asset('storage/objects/leaf.svg')  }}" alt="" rel="preload">
            <img class="max-sm:size-4 xs:size-5 sm:hidden"
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

            <img class="max-sm:size-10 max-sm:hidden sm:size-14 md:size-16 lg:size-20 transform scale-x-[-1]"
                 src="{{ asset('storage/objects/leaf.svg')  }}" alt="" rel="preload">
            <img class="max-sm:size-4 xs:size-5 sm:hidden transform scale-x-[-1]"
                 src="{{ asset('storage/objects/leave_right_mobile.svg')  }}" alt="" rel="preload">
        </div>

        <div class="title-container">
            <span class="flex-grow border-b border-black"></span>
            <small
                class="font-inclusive text-xs xs:text-[14px] sm:text-[16px] md:text-[18px] lg:text-xl xl:text-2xl text-black px-4">
                Filter recipes
            </small>
            <span class="flex-grow border-t border-black"></span>
        </div>

        {{-- Filter --}}
        <div x-data="{
            firstValue: '',
            secondValue: ''
            }"
             class="flex flex-col items-center px-2 gap-2 md:flex-row md:justify-center md:gap-0.5 md:items-center">

            {{-- Icon --}}
            <img class="size-10 sm:size-12 md:size-24 md:rotate-45" src="{{ asset('storage/objects/piper.svg') }}"
                 alt="" rel="preload">

            {{-- Double select --}}
            <div class="flex flex-col w-full max-w-xs items-center gap-1 md:w-1/4 md:px-2 md:py-2">
                {{-- Dish --}}
                <div class="relative w-full">
                    <select id="modelName"
                            name="modelName"
                            class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"
                            x-model="firstValue"

                            @change="secondValue = ''"

                    >
                        <option value="Any dish" selected>Any dish</option>
                        <option value="Broth">Broth</option>
                        <option value="Cookies">Cookies</option>
                        <option value="Steak">Steak</option>
                        <option value="Cheeseburger">Cheeseburger</option>
                        <option value="Mohito">Mohito</option>
                    </select>
                </div>
            </div>

            {{-- Dish type --}}
            <div class="flex flex-col w-full max-w-xs items-center gap-2 md:w-1/4 md:px-2 md:py-2">
                <div class="relative w-full">
                    <select id="dish-type" name="dish-type"
                            class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"
                            x-model="secondValue"
                            :disabled="!firstValue"
                    >
                        <option value="" :selected="!firstValue"
                                x-text="firstValue ? 'Any type' : 'Any type'"></option>
                        <option value="-">Type 1</option>
                        <option value="-">Type 2</option>
                        <option value="-">Type 3</option>
                        <option value="-">Type 4</option>
                    </select>
                </div>
            </div>

            {{-- Select cuisine --}}
            <div class="w-full max-w-xs md:w-1/4  md:py-2">
                <select id="country" name="country"
                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white md:px-4 md:py-2 md:text-sm">
                    <option value="Any" selected>Any cuisine</option>
                    <option value="Australia">Australian</option>
                    <option value="Belgium">Belgian</option>
                    <option value="China">Chinese</option>
                    <option value="France">French</option>
                    <option value="Germany">German</option>
                    <option value="Italy">Italian</option>
                    <option value="Mexico">Mexican</option>
                    <option value="Poland">Polish</option>
                    <option value="Portugal">Portuguese</option>
                    <option value="Spain">Spanish</option>
                    <option value="Turkey">Turkish</option>
                    <option value="Ukraine">Ukrainian</option>
                    <option value="United Kingdom">British</option>
                    <option value="United States">American</option>
                </select>
            </div>

            {{-- Select menu --}}
            <div class="w-full max-w-xs md:w-1/4 md:px-1 md:py-2">
                <select id="country" name="country"
                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white md:px-4 md:py-2 md:text-sm">
                    <option value="Any" selected>Any menu</option>
                    <option value="Ketogenic">Ketogenic</option>
                    <option value="Gluten-free">Gluten-free</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Paleo">Paleo</option>
                </select>
            </div>

            {{-- Filter button --}}
            <div class="w-full max-w-xs md:w-auto md:px-4 md:py-2 md:text-base">
                <button
                    class="font-inclusive text-neutral-200 text-sm bg-gourmania hover:gourmania-hover transition rounded-xl px-4 py-1 w-full md:px-4 md:py-2 md:text-base">
                    Filter
                </button>
            </div>
        </div>

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
                                imgSrc: 'https://images.wallpaperscraft.com/image/single/steak_mushrooms_asparagus_103375_1920x1080.jpg',
                                imgAlt: 'A perfectly grilled steak served with potatoes and greens.',
                                title: 'Delicious Steak',
                                description: 'A tender and juicy steak, cooked to perfection, paired with crispy potatoes.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                            {
                                {{-- Image 2 --}}
                                imgSrc: 'https://images.wallpaperscraft.com/image/single/salmon_teriyaki_fish_108544_1920x1080.jpg',
                                imgAlt: 'Fresh fish fillet served on a plate with soy sauce and sesame seeds.',
                                title: 'Grilled Fish',
                                description: 'A delicate and flavorful grilled fish, perfect for any seafood lover.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                            {
                                {{-- Image 3--}}
                                imgSrc: 'https://images.wallpaperscraft.com/image/single/pizza_pastry_appetizing_117398_1920x1080.jpg',
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
                         src="https://images.wallpaperscraft.com/image/single/meat_stake_cuts_10247_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Delicious meat steak</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/pizza_food_glass_73012_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh hot pizza</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/french_fries_appetizing_greens_112053_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Crispy french fries</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/salad_vegetables_leaves_88299_800x1200.jpg"
                         alt="Image 4">

                    <div class="hover-overlay">
                        <span class="overlay-text">A salad full of vitamins</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/noodles_sauce_cheese_112659_800x1200.jpg"
                         alt="Image 5">

                    <div class="hover-overlay">
                        <span class="overlay-text">Pasta with vegetables and grated cheese</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/pancakes_berries_dessert_157035_800x1200.jpg"
                         alt="Image 6">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fluffy pancakes with sour cream and raspberries</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/food_fish_herbs_108877_800x1200.jpg"
                         alt="Image 7">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh fish with rice and herbs</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/soup_toast_dish_208792_800x1200.jpg"
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
                         src="https://images.wallpaperscraft.com/image/single/meat_stake_cuts_10247_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Delicious meat steak</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/pork_vegetables_meat_109770_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh pork with vegetables</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/meat_baking_vegetables_88477_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Hot backed meat with vegetables</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/meat_pork_dinner_112587_800x1200.jpg"
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
                         src="https://images.wallpaperscraft.com/image/single/salad_vegetables_leaves_108329_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Salad with vegetables, leaves, spinach and cucumbers</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/salad_vegetables_eggs_114547_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Healthy salad with vegetables, eggs and carrots</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/salad_cheese_fruit_107087_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Aromatic cheese, fruits and vegetables</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/salad_lemon_cherry_tomatoes_107795_800x1200.jpg"
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
                         src="https://images.wallpaperscraft.com/image/single/pancakes_raspberries_syrup_115255_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Pancakes with raspberries and syrup</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/fried_eggs_bacon_toast_102470_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fresh scrambled eggs and meat</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/belgian_waffle_waffle_berries_873742_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Fluffy waffles</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/granola_strawberry_berries_207990_800x1200.jpg"
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
                         src="https://images.wallpaperscraft.com/image/single/bread_almonds_cakes_112884_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Soft, flavorful bread</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/donut_icing_still_life_163211_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Doughnuts with glaze and sprinkles </span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/croissant_berries_strawberries_180033_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Delicious croissants</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/cookies_chocolate_dessert_874621_800x1200.jpg"
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
                         src="https://images.wallpaperscraft.com/image/single/tartlet_berries_cream_111477_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Tartalette with berries and cream</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/icecream_balls_bilberry_45151_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Chilled ice cream</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/cake_souffles_cream_114050_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">Tender tiramisu</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/cupcake_cherry_berries_289705_800x1200.jpg"
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
                         src="https://images.wallpaperscraft.com/image/single/tea_cup_lemon_209994_800x1200.jpg"
                         alt="Image 1">

                    <div class="hover-overlay">
                        <span class="overlay-text">Warming flavored tea</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/coffee_drink_cup_207326_800x1200.jpg"
                         alt="Image 2">

                    <div class="hover-overlay">
                        <span class="overlay-text">Invigorating coffee</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/mojito_drink_lemon_177472_800x1200.jpg"
                         alt="Image 3">

                    <div class="hover-overlay">
                        <span class="overlay-text">A refreshing mojito</span>
                    </div>
                </a>
            </div>

            <div class="relative block overflow-hidden group w-full">
                <a href="#" class="block">
                    <img class="section-image"
                         src="https://images.wallpaperscraft.com/image/single/cocktail_mint_glass_272604_800x1200.jpg"
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



