<!-- Bookmark button -->
<button
    wire:click.throttle="toggleSave()"
    class="absolute top-1 left-1"
    title="{{ $isSaved ? 'Remove from saved' : 'Save recipe' }}">

    @if($isSaved)
        <!-- Bookmark slash -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="w-10 h-10 text-red-800">
            <path d="M17 4.517v9.301L5.433 2.252a41.44 41.44 0 0 1 9.637.058C16.194 2.45 17 3.414 17 4.517ZM3 17.25V6.182l10.654 10.654L10 15.082l-5.925 2.844A.75.75 0 0 1 3 17.25ZM3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06L3.28 2.22Z" />
        </svg>
    @else
        <!-- Bookmark normal -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="darkred"
            class="w-10 h-10 text-red-800">

            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
        </svg>
    @endif

    {{-- Error message --}}
    @error('unauthenticated')
    <div class="absolute left-1 right-full top-3 -translate-y-1/2 mt-1 z-10 w-max rounded-lg border border-red-300 bg-white px-3 py-1 text-sm text-red-600 shadow-lg">
        {!! $message !!}
    </div>
    @enderror
</button>
