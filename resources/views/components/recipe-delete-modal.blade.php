@props(['recipeId', 'recipeName'])

<!-- Main modal -->
<div id="deleteModal-{{ $recipeId }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Close modal button -->
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-[#AE763E] hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition-colors duration-200" data-modal-toggle="deleteModal-{{ $recipeId }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- SVG Image -->
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="#AE763E" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>

            <!-- Title and description -->
            <h2 class="text-lg font-semibold text-gray-900 text-center mb-1">Are you sure?</h2>
            <p class="text-lg text-gray-600 text-center mb-4">You are about to delete the following recipe:</p>

            <!-- Item to delete -->
            <ul class="mb-6 text-gray-800">
                <li class="flex gap-2 items-center">
                    <!-- SVG Icon -->
                    <div class="shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-red-500">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <!-- Scrollable text -->
                    <div class="overflow-x-auto max-w-[370px]">
                        <p class="text-lg whitespace-nowrap">{{ $recipeName }}</p>
                    </div>
                </li>
            </ul>

            <div class="flex justify-center items-center space-x-4">
                <!-- Cancel button -->
                <button
                    data-modal-toggle="deleteModal-{{ $recipeId }}"
                    type="button"
                    class="w-32 py-2 px-4 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200">
                    No, cancel
                </button>

                <!-- Confirmation button -->
                <form action="{{ route('recipes.destroy', $recipeId) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="w-32 py-2 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
