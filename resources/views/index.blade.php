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
            <small class="font-inknut text-lg sm:text-2xl md:text-3xl text-black px-4 break-words text-center block">
                BEST CHOICE FOR GOURMETS
            </small>
            <span class="flex-grow border-t border-black"></span>
        </div>

        {{-- Stats --}}
        <div class="relative py-4 px-6 sm:px-8">
            {{-- Left big leaf --}}
            <img src="{{ asset('storage/objects/leaf.svg') }}" alt="Big leaf" rel="preload" class="stats-big-leaf-left">

            {{-- Left mobile leaf --}}
            <img src="{{ asset('storage/objects/leave_right_mobile.svg') }}" alt="Small leaf" rel="preload" class="stats-mobile-leaf-left">

            {{-- Stats text --}}
            <div class="flex flex-col sm:flex-row justify-center items-center gap-2 sm:gap-3 md:gap-4 mx-auto max-w-max">

                {{-- 1 stats item --}}
                <div class="stats-text">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#88C9CB" class="inline-block w-3 h-3 sm:w-3 sm:h-3" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    <span class="ml-1 sm:ml-[0.375rem]">999 original recipes</span>
                </div>

                {{-- 2 stats item --}}
                <div class="stats-text">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#CCD5AE" class="inline-block w-3 h-3 sm:w-3 sm:h-3" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    <span class="ml-1 sm:ml-[0.375rem]">1800 authors</span>
                </div>

                {{-- 3 stats item --}}
                <div class="stats-text">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FEDC56" class="inline-block w-3 h-3 sm:w-3 sm:h-3" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    <span class="ml-1 sm:ml-[0.375rem]">Explore 50+ cuisines</span>
                </div>
            </div>

            {{-- Right big leaf --}}
            <img src="{{ asset('storage/objects/leaf.svg') }}" alt="Big leaf" rel="preload" class="stats-big-leaf-right">

            {{-- Right mobile leaf --}}
            <img src="{{ asset('storage/objects/leave_right_mobile.svg') }}" alt="Small leaf" rel="preload" class="stats-mobile-leaf-right">
        </div>

        {{-- Filter --}}
        <livewire:filter/>

        {{-- Popular recipes --}}
        <div class="title-container">
            <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            <small class="section-title">
                POPULAR RECIPES
            </small>
            <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        </div>

        <div
            x-data="{
        slides: [
            {
                imgSrc: '{{ asset('storage/recipes-images/steak_mushrooms_asparagus_103375_1920x1080-min-opt.webp') }}',
                imgAlt: 'Grilled steak with vegetables',
                title: 'Flavour Steak',
                location: 'Ukraine',
                ctaUrl: '#',
                ctaText: 'See more'
            },
            {
                imgSrc: '{{ asset('storage/recipes-images/pizza_pastry_appetizing_117398_1920x1080-min-opt.webp') }}',
                imgAlt: 'Grilled steak with vegetables',
                title: 'Hot Pizza',
                location: 'United Kingdom',
                ctaUrl: '#',
                ctaText: 'See more'
            },
            {
                imgSrc: '{{ asset('storage/recipes-images/salmon_teriyaki_fish_108544_1920x1080-min-opt.webp') }}',
                imgAlt: 'Grilled salmon with sauce',
                title: 'Fresh Fish',
                location: 'Norway',
                ctaUrl: '#',
                ctaText: 'See more'
            },
        ],
        currentSlideIndex: 0,
        isReady: false,
        init() {
            this.currentSlideIndex = 0;
            this.$nextTick(() => {
                this.isReady = true;
            });
        },
        next() {
            this.currentSlideIndex = (this.currentSlideIndex + 1) % this.slides.length;
        },
        previous() {
            this.currentSlideIndex = (this.currentSlideIndex - 1 + this.slides.length) % this.slides.length;
        }
    }"
            :class="{'opacity-100': isReady}"
            class="relative w-full h-[70vh] max-h-[800px] overflow-hidden bg-gray-900 group opacity-0 transition-opacity duration-300"
        >
            <div class="relative w-full h-full mx-auto max-w-[1920px]">
                <template x-for="(slide, index) in slides" :key="index">
                    <div
                        x-show="currentSlideIndex === index && isReady"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 flex items-center justify-center"
                    >
                        <div class="absolute inset-0 z-0">
                            <img
                                :src="slide.imgSrc"
                                :alt="slide.imgAlt"
                                class="w-full h-full object-cover object-center"
                            />
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent z-10"></div>

                        <div class="relative z-20 w-full px-6 text-center pb-20 sm:pb-28 max-w-2xl mx-auto space-y-2">
                            <p class="text-white/80 text-sm uppercase tracking-widest mb-2" x-text="slide.category"></p>
                            <h2 class="text-3xl sm:text-4xl font-bold text-white group-hover:text-amber-300 transition-colors duration-300" x-text="slide.title"></h2>
                            <p x-show="slide.location" class="text-white/80 text-lg" x-text="slide.location"></p>

                            <div class="mt-6">
                                <a
                                    :href="slide.ctaUrl"
                                    class="inline-block px-8 py-3 border border-white text-white font-medium text-sm uppercase relative overflow-hidden rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300"
                                >
                                    <span x-text="slide.ctaText"></span>
                                    <span class="absolute bottom-0 left-0 w-full h-[1px] bg-white transform scale-x-0 origin-right hover:origin-left transition-transform duration-300"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <button
                @click="previous()"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 flex items-center justify-center bg-black/30 hover:bg-black/50 text-white rounded-full transition"
                x-show="isReady"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <button
                @click="next()"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 flex items-center justify-center bg-black/30 hover:bg-black/50 text-white rounded-full transition"
                x-show="isReady"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 flex space-x-2 z-30" x-show="isReady">
                <template x-for="(slide, index) in slides" :key="index">
                    <button
                        @click="currentSlideIndex = index"
                        class="w-2 h-2 rounded-full transition-all duration-300"
                        :class="{
                    'bg-white w-4': currentSlideIndex === index,
                    'bg-white/30': currentSlideIndex !== index
                }"
                    ></button>
                </template>
            </div>
        </div>

        {{-- Latest recipes title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                LATEST RECIPES
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Latest recipes grid --}}
        <div class="section-container">
            {{-- Card 1 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/meat_stake_cuts_10247_800x1200-min-opt.webp') }}"
                         alt="Delicious meat steak">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Delicious meat steak</span>
                    </div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pizza_food_glass_73012_800x1200-min-opt.webp') }}"
                         alt="Fresh hot pizza">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Fresh hot pizza</span>
                    </div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/french_fries_appetizing_greens_112053_800x1200-min-opt.webp') }}"
                         alt="Crispy french fries">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Crispy french fries</span>
                    </div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_vegetables_leaves_88299_800x1200-min-opt.webp') }}"
                         alt="A salad full of vitamins">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">A salad full of vitamins</span>
                    </div>
                </a>
            </div>

            {{-- Card 5 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/noodles_sauce_cheese_112659_800x1200-min-opt.webp') }}"
                         alt="Pasta with vegetables and grated cheese">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Pasta with vegetables and grated cheese</span>
                    </div>
                </a>
            </div>

            {{-- Card 6 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pancakes_berries_dessert_157035_800x1200-min-opt.webp') }}"
                         alt="Fluffy pancakes with sour cream and raspberries">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Fluffy pancakes with sour cream and raspberries</span>
                    </div>
                </a>
            </div>

            {{-- Card 7 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pancakes_berries_dessert_157035_800x1200-min-opt.webp') }}"
                         alt="Fluffy pancakes with sour cream and raspberries">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Fluffy pancakes with sour cream and raspberries</span>
                    </div>
                </a>
            </div>

            {{-- Card 8 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pancakes_berries_dessert_157035_800x1200-min-opt.webp') }}"
                         alt="Fluffy pancakes with sour cream and raspberries">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Fluffy pancakes with sour cream and raspberries</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        {{-- Meat dishes title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                MEAT DISHES
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Meat dishes grid --}}
        <div class="section-container">
             {{--Card 1--}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('https://eda.ru/images/RecipePhoto/1280x960/mjaso-s-ajvoj_15909_photo_1143.webp') }}"
                         alt="Chicken broth">

                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Chicken broth</span>
                    </div>
                </a>
            </div>

            {{--Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('https://eda.ru/images/RecipePhoto/1280x960/steyk_53097_photo_63350.webp') }}"
                         alt="Premium steak">
                    <div class="hover-overlay">
                        <div class="country-label">Australia</div>
                        <span class="overlay-text">Premium steak</span>
                    </div>
                </a>
            </div>

             {{--Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('https://eda.ru/images/RecipePhoto/1280x960/steyk-ramp_188917_photo_196993.webp') }}"
                         alt="Ramp steak">
                    <div class="hover-overlay">
                        <div class="country-label">Ukraine</div>
                        <span class="overlay-text">Ramp steak</span>
                    </div>
                </a>
            </div>

             {{--Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('https://eda.ru/images/RecipePhoto/1280x960/steyk-na-skovorode_175094_photo_182874.webp') }}"
                         alt="Pan-seared steak">
                    <div class="hover-overlay">
                        <div class="country-label">Poland</div>
                        <span class="overlay-text">Pan-seared steak</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="see-more-container">
            <button class="see-more-btn">
                See more
            </button>
        </div>

        {{-- Salads title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                SALADS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Salads grid --}}
        <div class="section-container">
            {{-- Card 1 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_vegetables_leaves_108329_800x1200-min-opt.webp') }}"
                         alt="Salad with vegetables, leaves, spinach and cucumbers">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Salad with vegetables, leaves, spinach and cucumbers</span>
                    </div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_vegetables_eggs_114547_800x1200-min-opt.webp') }}"
                         alt="Healthy salad with vegetables, eggs and carrots">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Healthy salad with vegetables, eggs and carrots</span>
                    </div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_cheese_fruit_107087_800x1200-min-opt.webp') }}"
                         alt="Aromatic cheese, fruits and vegetables">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Aromatic cheese, fruits and vegetables</span>
                    </div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/salad_lemon_cherry_tomatoes_107795_800x1200-min-opt.webp') }}"
                         alt="Sour lemon with fresh cherry tomatoes and fresh herbs">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
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

        {{-- Breakfasts title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                BREAKFASTS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Breakfasts grid --}}
        <div class="section-container">
            {{-- Card 1 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/pancakes_raspberries_syrup_115255_800x1200-min-opt.webp') }}"
                         alt="Pancakes with raspberries and syrup">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Pancakes with raspberries and syrup</span>
                    </div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/fried_eggs_bacon_toast_102470_800x1200-min-opt.webp') }}"
                         alt="Fresh scrambled eggs and meat">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Fresh scrambled eggs and meat</span>
                    </div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/belgian_waffle_waffle_berries_873742_800x1200-min-opt.webp') }}"
                         alt="Fluffy waffles">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Fluffy waffles</span>
                    </div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/granola_strawberry_berries_207990_800x1200-min-opt.webp') }}"
                         alt="Granola with strawberry">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
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

        {{-- Bakery title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                BAKERY
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Bakery grid --}}
        <div class="section-container">
            {{-- Card 1 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/bread_almonds_cakes_112884_800x1200-min-opt.webp') }}"
                         alt="Soft, flavorful bread">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Soft, flavorful bread</span>
                    </div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/donut_icing_still_life_163211_800x1200-min-opt.webp') }}"
                         alt="Doughnuts with glaze and sprinkles">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Doughnuts with glaze and sprinkles</span>
                    </div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/croissant_berries_strawberries_180033_800x1200-min-opt.webp') }}"
                         alt="Delicious croissants">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Delicious croissants</span>
                    </div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cookies_chocolate_dessert_874621_800x1200-min-opt.webp') }}"
                         alt="Chocolate chip cookie">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
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

        {{-- Desserts title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                DESSERTS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Desserts grid --}}
        <div class="section-container">
            {{-- Card 1 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/tartlet_berries_cream_111477_800x1200-min-opt.webp') }}"
                         alt="Tartalette with berries and cream">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Tartalette with berries and cream</span>
                    </div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/icecream_balls_bilberry_45151_800x1200-min-opt.webp') }}"
                         alt="Chilled ice cream">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Chilled ice cream</span>
                    </div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cake_souffles_cream_114050_800x1200-min-opt.webp') }}"
                         alt="Tender tiramisu">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Tender tiramisu</span>
                    </div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cupcake_cherry_berries_289705_800x1200-min-opt.webp') }}"
                         alt="Cupcake with cream and berries">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
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

        {{-- Drinks title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                DRINKS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Drinks grid --}}
        <div class="section-container">
            {{-- Card 1 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/tea_cup_lemon_209994_800x1200-min-opt.webp') }}"
                         alt="Warming flavored tea">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Warming flavored tea</span>
                    </div>
                </a>
            </div>

            {{-- Card 2 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/coffee_drink_cup_207326_800x1200-min-opt.webp') }}"
                         alt="Invigorating coffee">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">Invigorating coffee</span>
                    </div>
                </a>
            </div>

            {{-- Card 3 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/mojito_drink_lemon_177472_800x1200-min-opt.webp') }}"
                         alt="A refreshing mojito">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
                        <span class="overlay-text">A refreshing mojito</span>
                    </div>
                </a>
            </div>

            {{-- Card 4 --}}
            <div class="recipe-card group">
                <a href="#" class="block h-full">
                    <img class="section-image"
                         src="{{ asset('storage/recipes-images/cocktail_mint_glass_272604_800x1200-min-opt.webp') }}"
                         alt="Mint Cocktail">
                    <div class="hover-overlay">
                        <div class="country-label">United Kingdom</div>
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

        {{-- Instruments title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                INSTRUMENTS
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Instruments section --}}
        <div class="w-full md:max-w-[768px] lg:max-w-[1024px] xl:max-w-[1280px] mx-auto px-3">
            <div class="relative block overflow-hidden group w-full rounded-lg">
                <a href="{{ route('instruments') }}" class="block">
                    <img
                        class="w-full h-auto transform transition-transform duration-300"
                        src="{{ asset('storage/basics/main-instruments.webp') }}"
                        alt="Cooking tools"
                    >
                    <div class="absolute inset-0 flex items-end justify-center pb-4 sm:pb-8 transition-all duration-300">
                        {{-- Shadow --}}
                        <div class="absolute bottom-0 w-full h-[45%] sm:h-1/3 bg-gradient-to-t from-black/90 via-black/60 to-transparent"></div>

                        {{-- Text --}}
                        <span class="relative text-white font-bold px-4 text-base sm:text-lg text-center group-hover:text-amber-400 transition-colors duration-300 leading-tight sm:leading-normal drop-shadow-lg">
                    Having the right tools can make cooking and food preparation much more enjoyable
                </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="see-more-container">
            <a href="{{ route('instruments') }}" class="see-more-btn cursor-pointer">
                See more
            </a>
        </div>

        {{-- Techniques title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                TECHNIQUES
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Techniques section --}}
        <div class="w-full md:max-w-[768px] lg:max-w-[1024px] xl:max-w-[1280px] mx-auto px-3">
            <video class="w-full h-auto rounded-lg" controls autoplay loop>
                <source src="{{ asset('storage/video/video-optimized.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="see-more-container">
            <a href="{{ route('techniques') }}" class="see-more-btn">
                See more
            </a>
        </div>

        {{-- Authors of the week title --}}
        <div class="title-container">
            <span class="border-line"></span>
            <small class="section-title">
                AUTHORS OF THE WEEK
            </small>
            <span class="border-line"></span>
        </div>

        {{-- Authors of the week section --}}
        <section id="authors" class="bg-gray-100 mb-16">
            <div class="container mx-auto px-4 lg:px-20 xl:px-52 2xl:px-80">
                <div class="grid grid-cols-3 gap-3">
                    {{-- Author 1 --}}
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 1" class="author-image">
                            <h3 class="author-name">Zlatan Ibrahimovic</h3>
                        </a>
                    </div>

                    {{-- Author 2 --}}
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyWZYVXCeOjQRWl6iQxGJatl7HqVTqW2Imeg&s"
                                alt="Team Member 2" class="author-image">
                            <h3 class="author-name">Drew Peterson</h3>
                        </a>
                    </div>

                    {{-- Author 3 --}}
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFXBWELSJOytVPVMyycXAQRwpU0SDCY_ylHA&s"
                                alt="Team Member 3" class="author-image">
                            <h3 class="author-name">Jane McIntosh</h3>
                        </a>
                    </div>

                    {{-- Author 4--}}
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://static.vecteezy.com/system/resources/thumbnails/000/364/628/small_2x/Chef_Avatar_Illustration-03.jpg"
                                alt="Team Member 4" class="author-image">
                            <h3 class="author-name">Peter Johnson</h3>
                        </a>
                    </div>

                    {{-- Author 5 --}}
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfWjzc8VJEvch8Q0OfClMZ9dxtj6jvkNFQog&s"
                                alt="Team Member 5" class="author-image">
                            <h3 class="author-name">Emily Brown</h3>
                        </a>
                    </div>

                    {{-- Author 6 --}}
                    <div class="author-container">
                        <a href="#">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz9rBL0A1tN-LBsNdCgl_ZSPNH2ffSOIzDRw&s"
                                alt="Team Member 6" class="author-image">
                            <h3 class="author-name">Anna Cook</h3>
                        </a>
                    </div>

                    {{-- Author 7 --}}
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 7" class="author-image">
                            <h3 class="author-name">Sarah Johnson</h3>
                        </a>
                    </div>

                    {{-- Author 8 --}}
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 8" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    {{-- Author 9 --}}
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 9" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    {{-- Author 10 --}}
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 10" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    {{-- Author 11 --}}
                    <div class="author-container">
                        <a href="#">
                            <img src="{{ asset('storage/user_logo/default.svg') }}"
                                 alt="Team Member 11" class="author-image">
                            <h3 class="author-name">David Wilson</h3>
                        </a>
                    </div>

                    {{-- Author 12 --}}
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
    </div>
</x-layout>
