@props(['section'])
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
        @foreach($section['recipes'] as $recipe)
            {
                imgSrc: '{{ asset('storage/'. $recipe->image) }}',
                imgAlt: '{{ $recipe->name }}',
                title: '{{ $recipe->name }}',
                location: '{{ $recipe->cuisine->name }}',
                ctaUrl: '{{ route('recipes.guide', $recipe->id) }}',
                ctaText: 'See more'
            },
        @endforeach
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
