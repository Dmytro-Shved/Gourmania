<x-layout>

    {{-- All recipes --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            CREATE NEW RECIPE
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{--STEP 1--}}
    <div class="bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <!-- Stepper -->
            <ol class="flex w-full items-center justify-between gap-2 sm:gap-4 relative" aria-label="registration progress">
                <!-- step 1 (current) -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="recipe">
                    <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">1</span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Recipe</span>
                </li>

                <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

                <!-- step 2 -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-current="step" aria-label="ingredients">
                    <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">2</span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Ingredients</span>
                </li>

                <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

                <!-- step 3 -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="guide">
                    <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">3</span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Guide</span>
                </li>
            </ol>

            <br>
            <br>

            <!-- Select Image (Old Version) -->
            {{--<div class="mt-1 mb-4 max-w-[201px]" x-data="{ files: null }">--}}
            {{--    <label for="photo" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">--}}
            {{--        <input name="photo" type="file" class="sr-only" id="photo" x-on:change="files = Object.values($event.target.files)">--}}
            {{--        <span x-text="files ? files.map(file => file.name).join(', ') : 'New photo...'"></span>--}}
            {{--    </label>--}}
            {{--    <button type="reset" @click="files = null" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg">Reset</button>--}}
            {{--</div>--}}

            <!-- Select Image -->

            <!-- Select Image -->
            <div class="mt-1 mb-4 max-w-[201px]" x-data="{ files: null }">
                <label for="photo" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                    <input name="photo" type="file" class="sr-only" id="photo" x-on:change="files = Object.values($event.target.files)" accept="image/jpeg, image/png, image/webp">
                    <span x-text="files ? files.map(file => file.name).join(', ') : 'New photo...'"></span>
                </label>

                <!-- mini photo -->
                <template x-if="files && files.length > 0">
                    <div class="mt-2">
                        <img :src="URL.createObjectURL(files[0])" alt="Thumbnail" class="w-32 h-32 object-cover rounded-md" />
                    </div>
                </template>

                <!-- reset button -->
                <button type="reset" @click="files = null" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg mt-2">Reset</button>
            </div>

            <!-- Recipe name -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Recipe name</label>
                    <input name="email"
                           type="text"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                           placeholder="Chicken Broth"
                    />
                </div>

                <!-- Recipe description -->
                <div class="w-full">
                    <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="textArea"
                                  name="description"
                                  class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75" rows="3"
                                  placeholder="This recipe is about...">
                        </textarea>
                    </div>
                </div>

                <!-- temp data -->
                @php
                    $dishCategories = \App\Models\DishCategory::get();
                    $cuisines = \App\Models\Cuisine::get();
                    $menus = \App\Models\Menu::get();
                @endphp


                <!-- Select Category, Cuisine Menu -->
                <div class="relative w-full">

                    <!-- category -->
                    <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Category</label>
                    <select name="dish_category"
                            class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-4 py-2"
                            autocomplete="off"
                    >
                        <option value="">Select Category</option>

                        @foreach($dishCategories as $dishCategory)
                            <option value="{{$dishCategory->id }}">{{ $dishCategory->name }}</option>
                        @endforeach
                    </select>

                    <!-- cuisine -->
                    <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Cuisine</label>
                    <select
                        name="cuisine"
                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-4 py-2"
                        autocomplete="off"
                    >

                        <option value="" selected>Select Cuisine</option>

                        @foreach($cuisines as $cuisine)
                            <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                        @endforeach
                    </select>

                    <!-- menu -->
                    <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Menu</label>
                    <select
                        name="menu"
                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-4 py-2"
                        autocomplete="off"
                    >

                        <option value="" selected>Select menu</option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>

                <br>

                <!-- Next step button -->
                <div class="flex justify-end">
                    <button type="button"
                            class="w-[100px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    ========================================
    ========================================
    ========================================

    @php
        $units = [
            'kg(s)', 'g(s)', 'piece(s)',
            'head(s)', 'liter(s)', 'to taste',
            'bunche(s)', 'twig(s)', 'stem(s)'
            ]
    @endphp

    {{--STEP 2--}}
    <div class="bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <!-- Stepper -->
            <ol class="flex w-full items-center justify-between gap-2 sm:gap-4 relative" aria-label="registration progress">
                <!-- step 1 (completed) -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="recipe">
                    <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                          <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Recipe</span>
                </li>

                <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

                <!-- step 2  (current) -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-current="step" aria-label="ingredients">
                    <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">2</span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Ingredients</span>
                </li>

                <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

                <!-- step 3 -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="guide">
                    <span class="flex size-6 items-center justify-center rounded-full border border-[#AE763E] text-on-primary">3</span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Guide</span>
                </li>
            </ol>

            <br>
            <br>

            <div class="space-y-4">
                <table class="w-full text-left table-auto">
                    <thead>
                    <tr>
                        <th class="text-sm font-medium text-gray-700 pt-2 text-center">Ingredient</th>
                        <th class="text-sm font-medium text-gray-700 pt-2 text-center">Quantity</th>
                        <th class="text-sm font-medium text-gray-700 pt-2 text-center">Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!-- Ingredient Name -->
                        <td class="py-2 pr-1 w-1/3">
                            <input
                                type="text"
                                class="w-full px-2 py-2 border border-gray-300 rounded-lg gourmania-focus text-sm"
                                placeholder="Chicken"
                            />
                        </td>

                        <!-- Quantity -->
                        <td class="py-2 w-1/3">
                            <div class="flex justify-center">
                                <input
                                    placeholder="1"
                                    type="number"
                                    class="w-full px-3 py-1.5 border border-gray-300 rounded-lg gourmania-focus"
                                    min="1"
                                />
                            </div>
                        </td>

                        <!-- Unit -->
                        <td class="py-2 pl-1 w-1/3">
                            <select
                                name="menu"
                                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-2 py-2"
                                autocomplete="off"
                            >
                                @foreach($units as $unit)
                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <br>

                <div class="flex justify-between">
                    <!-- Previous step button -->
                    <div class="flex justify-start">
                        <button type="button"
                                class="w-[100px] bg-gray-500 hover:bg-gray-400 text-white font-medium py-2.5 rounded-lg transition-colors">
                            Previous
                        </button>
                    </div>

                    <!-- Next step button -->
                    <div class="flex justify-end">
                        <button type="button"
                                class="w-[100px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--STEP 3--}}
    <div class="bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <!-- Stepper -->
            <ol class="flex w-full items-center justify-between gap-2 sm:gap-4 relative" aria-label="registration progress">
                <!-- step 1 (completed) -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="recipe">
                    <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                          <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Recipe</span>
                </li>

                <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

                <!-- step 2 (completed) -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-current="step" aria-label="ingredients">
                    <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                          <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Ingredients</span>
                </li>

                <span class="h-0.5 w-full bg-gourmania" aria-hidden="true"></span>

                <!-- step 3 (current) -->
                <li class="flex items-center sm:gap-2 text-sm relative w-full justify-center sm:justify-start" aria-label="guide">
                    <span class="text-white bg-gourmania flex items-center justify-center size-6 rounded-full">3</span>
                    <span class="absolute top-8 text-xs sm:static sm:top-0 sm:text-base">Guide</span>
                </li>
            </ol>

            <br>
            <br>

            <div class="space-y-4">
                <table class="w-full text-left table-auto">
                    <thead>
                    <tr>
                        <th class="text-sm font-medium text-gray-700 pt-2 text-center">Ingredient</th>
                        <th class="text-sm font-medium text-gray-700 pt-2 text-center">Quantity</th>
                        <th class="text-sm font-medium text-gray-700 pt-2 text-center">Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!-- Ingredient Name -->
                        <td class="py-2 pr-1 w-1/3">
                            <input
                                type="text"
                                class="w-full px-2 py-2 border border-gray-300 rounded-lg gourmania-focus text-sm"
                                placeholder="Chicken"
                            />
                        </td>

                        <!-- Quantity -->
                        <td class="py-2 w-1/3">
                            <div class="flex justify-center">
                                <input
                                    placeholder="1"
                                    type="number"
                                    class="w-full px-3 py-1.5 border border-gray-300 rounded-lg gourmania-focus"
                                    min="1"
                                />
                            </div>
                        </td>

                        <!-- Unit -->
                        <td class="py-2 pl-1 w-1/3">
                            <select
                                name="menu"
                                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-2 py-2"
                                autocomplete="off"
                            >
                                @foreach($units as $unit)
                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <br>

                <div class="flex justify-between">
                    <!-- Previous step button -->
                    <div class="flex justify-start">
                        <button type="button"
                                class="w-[100px] bg-gray-500 hover:bg-gray-400 text-white font-medium py-2.5 rounded-lg transition-colors">
                            Previous
                        </button>
                    </div>

                    <!-- Next step button -->
                    <div class="flex justify-end">
                        <button type="button"
                                class="w-[100px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                            Next
                        </button>
                    </div>
                </div>
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
