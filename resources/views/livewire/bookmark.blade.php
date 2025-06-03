{{-- Bookmark button --}}
<button
    wire:click.throttle="toggleSave()"
    title="{{ $isSaved ? 'Remove from saved' : 'Save recipe' }}">

    @if($isSaved)
        {{-- Bookmark check --}}
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-bookmark-check-fill {{ $iconSize }} text-red-800"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
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

    {{-- Error message --}}
    @error('unauthenticated')
    <div class="absolute left-1 right-full top-3 -translate-y-1/2 mt-1 z-10 w-max rounded-lg border border-red-300 bg-white px-3 py-1 text-sm text-red-600 shadow-lg">
        {!! $message !!}
    </div>
    @enderror
</button>
