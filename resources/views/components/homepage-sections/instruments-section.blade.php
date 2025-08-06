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
