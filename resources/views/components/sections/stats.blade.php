@props(['stats'])

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
            <span class="ml-1 sm:ml-[0.375rem]">{{ $stats['recipesCount'] }} original recipes</span>
        </div>

        {{-- 2 stats item --}}
        <div class="stats-text">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#CCD5AE" class="inline-block w-3 h-3 sm:w-3 sm:h-3" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
            </svg>
            <span class="ml-1 sm:ml-[0.375rem]">{{ $stats['authorsCount'] }} authors</span>
        </div>

        {{-- 3 stats item --}}
        <div class="stats-text">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#FEDC56" class="inline-block w-3 h-3 sm:w-3 sm:h-3" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
            </svg>
            <span class="ml-1 sm:ml-[0.375rem]">Explore {{ $stats['cuisinesCount'] }} cuisines</span>
        </div>
    </div>

    {{-- Right big leaf --}}
    <img src="{{ asset('storage/objects/leaf.svg') }}" alt="Big leaf" rel="preload" class="stats-big-leaf-right">

    {{-- Right mobile leaf --}}
    <img src="{{ asset('storage/objects/leave_right_mobile.svg') }}" alt="Small leaf" rel="preload" class="stats-mobile-leaf-right">
</div>
