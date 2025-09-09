@props(['user'])

{{-- Main modal--}}
<div id="deleteProfileModal"
     tabindex="-1"
     aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center font-inclusive w-full md:inset-0 h-modal md:h-full"
>
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        {{-- Modal content --}}
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            {{-- Close modal button --}}
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-[#AE763E] hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition-colors duration-200" data-modal-toggle="deleteProfileModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>

            {{-- Title and description --}}
            <h2 class="text-lg font-semibold text-gray-900 text-center mb-1">Are You Sure?</h2>
            <p class="text-lg text-gray-600 text-center mb-4">This is a destructive action. You can't undo this account deletion.</p>
            <div class="flex justify-center items-center space-x-4">
                {{-- Cancel button --}}
                <button
                    data-modal-toggle="deleteProfileModal"
                    type="button"
                    class="w-32 py-2 px-4 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200">
                    No
                </button>

                {{-- Confirmation button --}}
                <form action="{{ route('profiles.destroy', $user) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="w-32 py-2 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
