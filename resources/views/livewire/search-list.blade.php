<div>
    {{-- Search input --}}
    <form id="recipeSearchForm"
          action="{{ route('recipes.search') }}"
          method="GET"
          class="mt-4 px-4">
        <input wire:model.live.debounce.500ms="search"
               required
               name="q"
               type="text"
               placeholder="Search for recipes..."
               class="w-full p-2 border border-gray-300 rounded-md gourmania-focus">
    </form>
    <div class="mt-4 px-4">
        <p class="ml-2 text-gray-400">Results</p>
    </div>
    {{-- Search list --}}
    <div class="mt-4 px-4 h-full overflow-auto">
        <div class="grid grid-cols-1 gap-1">
            {{-- Skeleton loading placeholders --}}
            <div wire:loading>
                <div class="grid grid-cols-1 gap-1">
                    @for($i = 0; $i < 3; $i++)
                        <div class="flex items-center bg-gray-50 p-4 rounded-md border border-gray-300 w-full max-w-md">
                            <div class="h-16 w-16 rounded-md mr-4 flex-shrink-0 bg-gray-200 animate-pulse"></div>
                            <div class="flex-1">
                                <div class="h-5 bg-gray-200 rounded animate-pulse mb-2 w-3/4"></div>
                                <div class="h-4 bg-gray-200 rounded animate-pulse w-1/2"></div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Recipe list --}}
            <div wire:loading.remove>
                <div class="grid grid-cols-1 gap-1">
                    @foreach($recipes as $recipe)
                        <a href="{{ route('recipes.guide', $recipe->id) }}" class="group flex items-center bg-gray-50 hover:bg-gray-100 p-4 cursor-pointer rounded-md border border-gray-300 transition-colors duration-300 w-full max-w-md">
                            <img src="{{ asset('storage/'. $recipe->image) }}" class="h-16 w-16 rounded-md object-cover mr-4 flex-shrink-0" alt="{{ $recipe->name }}">
                            <div class="flex-1">
                                <p class="text-lg text-black leading-tight line-clamp-1 group-hover:text-amber-600 transition-colors duration-300">{{ $recipe->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- set ID for form [id="recipeSearchForm"] -->
<script>
    // wait full page load, run callback
    document.addEventListener('DOMContentLoaded', function () {
        // initialize const form
        const form = document.getElementById('recipeSearchForm');

        // listen for a form submit event, run callback
        form.addEventListener('submit', function () {
            // initialize const for all inputs in the form
            const inputs = this.querySelectorAll('select, input');
            // loop every input and disable it if its ''
            inputs.forEach(input => {
                if (input.value === '') {
                    input.disabled = true;
                }
            });
        });
    });
</script>
</div>

