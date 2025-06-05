<!-- Logout modal -->
<div id="logoutModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full font-inclusive">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Close modal button -->
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-[#AE763E] hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition-colors duration-200" data-modal-toggle="logoutModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="..."></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- SVG pic -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
            </svg>

            <!-- Title and description -->
            <h2 class="text-lg font-semibold text-gray-900 text-center mb-1">Are you sure you want to log out?</h2>

            <ul class="mb-6 text-gray-800">
                <li class="flex gap-2 items-center">
                    <div class="max-w-[370px]">
                        <p class="text-lg break-words">After logging out, you’ll need to enter your login credentials again to access your account</p>
                    </div>
                </li>
            </ul>

            <!-- Actions buttons -->
            <div class="flex justify-center items-center space-x-4">
                <button
                    data-modal-toggle="logoutModal"
                    type="button"
                    class="w-32 py-2 px-4 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200">
                    No, cancel
                </button>

                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="w-32 py-2 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <span class="text-white">Yes, log out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
