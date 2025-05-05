@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

{{--<div class="flex justify-center mt-6">--}}
{{--    @if ($paginator->hasPages())--}}
{{--        <div class="flex items-center gap-1 text-sm select-none">--}}
{{--             <!--Previous Page-->--}}
{{--            @if ($paginator->onFirstPage())--}}
{{--                <span class="flex items-center gap-1 px-2.5 py-1.5 text-gray-400 bg-gray-100 rounded-md cursor-not-allowed text-sm">--}}
{{--                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                    </svg>--}}
{{--                    Prev--}}
{{--                </span>--}}
{{--            @else--}}
{{--                <button wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"--}}
{{--                        class="flex items-center gap-1 px-2.5 py-1.5 bg-white text-gray-700 border rounded-md hover:bg-gray-100 transition text-sm">--}}
{{--                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                    </svg>--}}
{{--                    Prev--}}
{{--                </button>--}}
{{--            @endif--}}

{{--             <!-- Page Numbers -->--}}
{{--            @foreach ($elements as $element)--}}
{{--                @if (is_string($element))--}}
{{--                    <span class="px-2 py-1 text-gray-500 text-sm">{{ $element }}</span>--}}
{{--                @endif--}}

{{--                @if (is_array($element))--}}
{{--                    @foreach ($element as $page => $url)--}}
{{--                        @if ($page == $paginator->currentPage())--}}
{{--                            <span class="inline-block px-3 py-1.5 rounded-md text-white text-sm font-medium" style="background-color: #AE763E;">--}}
{{--                                {{ $page }}--}}
{{--                            </span>--}}
{{--                        @else--}}
{{--                            <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"--}}
{{--                                    class="inline-block px-3 py-1.5 rounded-md text-gray-700 hover:bg-gray-100 transition text-sm">--}}
{{--                                {{ $page }}--}}
{{--                            </button>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            @endforeach--}}

{{--             <!-- Next Page -->--}}
{{--            @if ($paginator->hasMorePages())--}}
{{--                <button wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"--}}
{{--                        class="flex items-center gap-1 px-2.5 py-1.5 bg-white text-gray-700 border rounded-md hover:bg-gray-100 transition text-sm">--}}
{{--                    Next--}}
{{--                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            @else--}}
{{--                <span class="flex items-center gap-1 px-2.5 py-1.5 text-gray-400 bg-gray-100 rounded-md cursor-not-allowed text-sm">--}}
{{--                    Next--}}
{{--                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                    </svg>--}}
{{--                </span>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}


<div class="flex justify-center mt-6">
    @if ($paginator->hasPages())
        <div class="items-center gap-1 text-sm select-none hidden sm:flex">
            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <span class="flex items-center gap-1 px-2.5 py-1.5 text-gray-400 bg-gray-100 rounded-md cursor-not-allowed text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Prev
                </span>
            @else
                <button wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        class="flex items-center gap-1 px-2.5 py-1.5 bg-white text-gray-700 border rounded-md hover:bg-gray-100 transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Prev
                </button>
            @endif

            {{-- Pagination numbers logic --}}
            @php
                $start = max($paginator->currentPage() - 2, 1);
                $end = min($paginator->lastPage(), $start + 4);
                $start = max($end - 4, 1);
            @endphp

            @if ($start > 1)
                <button wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')" class="inline-block px-3 py-1.5 rounded-md text-gray-700 hover:bg-gray-100 transition text-sm">1</button>
                @if ($start > 2)
                    <span class="px-2 py-1 text-gray-500">...</span>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $paginator->currentPage())
                    <span class="inline-block px-3 py-1.5 rounded-md text-white text-sm font-medium" style="background-color: #AE763E;">
                        {{ $i }}
                    </span>
                @else
                    <button wire:click="gotoPage({{ $i }}, '{{ $paginator->getPageName() }}')" class="inline-block px-3 py-1.5 rounded-md text-gray-700 hover:bg-gray-100 transition text-sm">
                        {{ $i }}
                    </button>
                @endif
            @endfor

            @if ($end < $paginator->lastPage())
                @if ($end + 1 < $paginator->lastPage())
                    <span class="px-2 py-1 text-gray-500">...</span>
                @endif
                <button wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')" class="inline-block px-3 py-1.5 rounded-md text-gray-700 hover:bg-gray-100 transition text-sm">{{ $paginator->lastPage() }}</button>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        class="flex items-center gap-1 px-2.5 py-1.5 bg-white text-gray-700 border rounded-md hover:bg-gray-100 transition text-sm">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @else
                <span class="flex items-center gap-1 px-2.5 py-1.5 text-gray-400 bg-gray-100 rounded-md cursor-not-allowed text-sm">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            @endif
        </div>

        {{-- MOBILE: Only arrows --}}
        <div class="flex sm:hidden gap-2">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            @else
                <button wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        class="px-3 py-2 bg-white border rounded-md hover:bg-gray-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        class="px-3 py-2 bg-white border rounded-md hover:bg-gray-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @else
                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            @endif
        </div>
    @endif
</div>
