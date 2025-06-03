<div>
    {{-- Search input --}}
    <div class="mt-4 px-4">
        <input
               type="text"
               placeholder="Search for recipes..."
               class="w-full p-2 border border-gray-300 rounded-md gourmania-focus">
    </div>
    <div class="mt-4 px-4">
        <p class="ml-2 text-gray-400">Results</p>
    </div>
    {{-- Search dropdown list --}}
    <div class="mt-4 px-4 h-full overflow-auto">
        <div class="grid grid-cols-1 gap-4">
            {{-- List card--}}
            <div
                class="bg-gray-50 hover:bg-gray-100 p-4 cursor-pointer rounded-md border border-gray-300 transition-colors duration-300">
                <h3 class="text-lg font-semibold text-black mb-2">Card 1</h3>
                <p class="text-gray-600">Content for card 1.</p>
            </div>
        </div>
    </div>
</div>

