<x-layout>
    @section('title',  'Recipes and more')

    @if(session()->has('user_registered'))
        {{-- Registered --}}
        <x-session.message :message="session('user_registered')" title="Success!" type="success" />
    @elseif(session()->has('logged_out'))
        {{-- Logged out --}}
        <x-session.message :message="session('logged_out')" title="Logged out!" type="danger"/>
    @elseif(session()->has('logged_in'))
        {{-- Logged in --}}
        <x-session.message :message="session('logged_in')" title="Logged in!" type="success" />
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
{{--            @foreach($recipes as $recipe)--}}
{{--                {--}}
{{--                    imgSrc: '{{ asset('storage/'. $recipe->image) }}',--}}
{{--                    imgAlt: {{ $recipe->name . ' image' }},--}}
{{--                    title: {{ $recipe->name }},--}}
{{--                    location: '$recipe->name',--}}
{{--                    ctaUrl: '/recipes?dish_category='{{ $recipe->dish_category_id }},--}}
{{--                    ctaText: 'See more'--}}
{{--                },--}}
{{--            @endforeach--}}
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

         {{--Sections --}}
        @foreach($sections as $section)

             {{--title --}}
            <div class="title-container">
                <span class="border-line"></span>
                <small class="section-title">
                    {{ $section['title'] }}
                </small>
                <span class="border-line"></span>
            </div>

             {{--grid --}}
            <div class="section-container">
                @foreach($section['recipes'] as $recipe)
                     {{--recipe card--}}
                    <div class="recipe-card group">
                        <a href="{{ route('recipes.guide', $recipe->id) }}" class="block h-full">
                            <img class="section-image"
                                 src="{{ asset('storage/'. $recipe->image) }}"
                                 alt="Delicious meat steak">
                            <div class="hover-overlay">
                                <div class="country-label">{{ $recipe->cuisine->name }}</div>
                                <span class="overlay-text">{{ $recipe->name }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

             {{--See more button--}}
            <div class="see-more-container">
                <a href="{{ route('recipes.index') }}" class="see-more-btn">
                    See more
                </a>
            </div>

        @endforeach

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
