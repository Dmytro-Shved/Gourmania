{{-- Bookmark button --}}
<button
    wire:click.throttle="toggleSave()"
    wire:loading.attr="disabled"
    title="{{ $isSaved ? 'Remove from saved' : 'Save recipe' }}"
    class="relative">

    {{-- Bookmark icon container --}}
    <div class="relative">
        @if($isSaved)
            {{-- Bookmark check --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                class="bi bi-bookmark-check-fill {{ $iconSize }} text-red-800"
                viewBox="0 0 16 16">
                <path fill="currentColor" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5z" />
                <path fill="#79ff54" d="M10.854 5.854a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
            </svg>
        @else
            {{-- Bookmark normal --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-bookmark-check-fill {{ $iconSize }} text-red-800"
                viewBox="0 0 16 16">
                <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2"/>
            </svg>
        @endif

        {{-- Loading spinner --}}
        <div wire:loading.flex class="absolute inset-0 items-center justify-center -mt-1">
            <div class="relative">
                <svg class="animate-spin" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                     width="18" height="18">
                    <path
                        d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
                        stroke="#c58f5c" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
                        stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
                {{-- White background circle for better visibility --}}
                <div class="absolute inset-0 rounded-full bg-white/70 -z-10"></div>
            </div>
        </div>
    </div>

    {{-- Error message --}}
    @error('unauthenticated')
    <div class="absolute left-1 right-full top-3 -translate-y-1/2 mt-1 z-10 w-max rounded-lg border border-red-300 bg-white px-3 py-1 text-sm text-red-600 shadow-lg">
        {!! $message !!}
    </div>
    @enderror
</button>
