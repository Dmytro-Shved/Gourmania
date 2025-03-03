<x-layout>

    {{-- All recipes --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            CREATE NEW RECIPE
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <br>

    {{--STEP 1--}}
    <div class="bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">

            {{--<ol class="flex w-full items-center gap-2" aria-label="registration progress">--}}
            {{--    <!-- completed step -->--}}
            {{--    <li class="text-sm" aria-label="recipe">--}}
            {{--        <div class="flex items-center gap-2">--}}
            {{--            <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">--}}
            {{--                1--}}
            {{--            </span>--}}
            {{--            <span class="hidden w-max sm:inline">Recipe</span>--}}
            {{--        </div>--}}
            {{--    </li>--}}

            {{--    <span class="h-0.5 w-full bg-[#AE763E]" aria-hidden="true"></span>--}}

            {{--    <!-- current step -->--}}
            {{--    <li class="flex w-full items-center text-sm" aria-current="step" aria-label="ingredients">--}}
            {{--        <span class="h-0.5 w-full bg-[#AE763E]" aria-hidden="true"></span>--}}
            {{--        <div class="flex items-center gap-2 pl-2">--}}
            {{--            <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">--}}
            {{--                2--}}
            {{--            </span>--}}
            {{--            <span class="hidden w-max sm:inline">Ingredients</span>--}}
            {{--        </div>--}}
            {{--    </li>--}}

            {{--    <span class="h-0.5 w-full bg-[#AE763E]" aria-hidden="true"></span>--}}

            {{--    <!-- next step -->--}}
            {{--    <li class="flex w-full items-center text-sm" aria-label="guide">--}}
            {{--        <span class="h-0.5 w-full bg-outline dark:bg-outline-dark" aria-hidden="true"></span>--}}
            {{--        <div class="flex items-center gap-2 pl-2">--}}
            {{--            <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">--}}
            {{--                3--}}
            {{--            </span>--}}
            {{--            <span class="hidden w-max sm:inline">Guide</span>--}}
            {{--        </div>--}}
            {{--    </li>--}}
            {{--</ol>--}}
            {{--<br>--}}

            <!-- step counter -->
            <h2 class="text-xl font-bold text-gray-900 mb-6 text-center">Step <span class="text-white px-3 py-1 bg-gourmania rounded-full">1</span> / 3</h2>

            <!-- Image -->
            <div class="mt-1 mb-4 max-w-[201px]" x-data="{ files: null }">
                <label for="photo" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                    <input name="photo" type="file" class="sr-only" id="photo" x-on:change="files = Object.values($event.target.files)">
                    <span x-text="files ? files.map(file => file.name).join(', ') : 'New photo...'"></span>
                </label>
                <button type="reset" @click="files = null" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg">Reset</button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Recipe name</label>
                    <input
                        name="email"
                        type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                        placeholder="Chicken Broth"
                        value="{{ old('email') }}"
                    />
                </div>

                <div class="w-full">
                    <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <textarea id="textArea" name="description" class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75" rows="3" placeholder="This recipe is about..."></textarea>
                    </div>
                </div>

                <button type="button" class="w-full bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                    Next
                </button>
            </div>
        </div>
    </div>

    {{--STEP 2--}}
    <div class="bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6 text-center">Step <span class="text-white px-3 py-1 bg-gourmania rounded-full">2</span> / 3</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Recipe name</label>
                    <input
                        name="email"
                        type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                        placeholder="Chicken Broth"
                        value="{{ old('email') }}"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Recipe name</label>
                    <input
                        name="email"
                        type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                        placeholder="your@email.com"
                        value="{{ old('email') }}"
                    />
                </div>
                <button type="submit" class="w-full bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                    Continue
                </button>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center text-sm text-gray-600 sm:flex sm:justify-center sm:gap-2 font-inclusive">
        <p>Don't know how to create a recipe correctly?</p>
        <a href="#" class="text-[#AE763E] hover:underline">View guide</a>
    </div>

    <br>


    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi aperiam blanditiis consectetur, culpa delectus dolore eveniet fugiat iure magni minus omnis quam reiciendis saepe sint soluta totam ut voluptas. Autem dolore impedit repellendus unde velit. Ab atque culpa est excepturi quaerat quidem vero. Accusamus delectus harum quos sapiente vel?
</x-layout>
