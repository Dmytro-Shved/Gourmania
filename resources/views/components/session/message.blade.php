<div x-data="{ show: true }"
     x-init="setTimeout(() => show = false, 5000)"
     class="fixed bottom-4 right-4 z-50">

    <div x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="transform translate-x-full opacity-0"
         x-transition:enter-end="transform translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="transform translate-x-0 opacity-100"
         x-transition:leave-end="transform translate-x-full opacity-0"
        @class([
           'border text-white px-4 py-3 rounded-lg relative font-inclusive shadow-lg',
           'max-w-[calc(100vw-2rem)]',
           'sm:max-w-md',
           'bg-green-500 border-green-600' => $type === 'success',
           'bg-red-500 border-red-600' => $type === 'danger',
           'bg-blue-400 border-blue-500' => $type === 'info',
           'bg-yellow-400 border-yellow-500 text-gray-800' => $type === 'warning',
        ])>

        <div class="flex items-start">
            <div class="flex-1 min-w-0">
                <p class="font-medium text-lg break-words">{{ $message }}</p>
            </div>

            <button @click="show = false" class="ml-3 flex-shrink-0 opacity-70 hover:opacity-100 transition-opacity duration-200">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </svg>
            </button>
        </div>
    </div>
</div>
