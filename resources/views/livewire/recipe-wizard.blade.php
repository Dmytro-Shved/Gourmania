<form wire:submit.prevent="store">
    {{--Form Card--}}
    <div class="bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            {{--Stepper--}}
            <x-wizard-stepper :form_step="$form_step"/>

            <br>
            <br>

            {{--STEPS--}}
            <div class="space-y-4">
                {{--STEP 1--}}
                @if($form_step == 1)
                    <!-- Select Image -->
                    <label class="block text-sm font-medium text-gray-700 mb-1">Recipe image</label>
                    <div class="mt-1 mb-4 max-w-[201px]">
                        <label for="recipe_image"
                               class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                            <input
                                wire:model.live="recipe_image"
                                name="recipe_image"
                                type="file"
                                class="sr-only"
                                id="recipe_image"
                                accept="image/jpeg, image/png, image/webp">

                            @if(!$recipe_image)
                                <span>Choose file...</span>
                            @else
                                <span>{{ $recipe_image->getClientOriginalName() }}</span>
                            @endif
                        </label>

                        <!-- mini photo -->
                        @if($recipe_image && $recipe_image->getClientOriginalExtension() != null)
                            <label class="block text-xs font-medium text-gray-700 mb-1">Selected image</label>
                            <div class="mt-2">
                                <img src="{{ $recipe_image->temporaryUrl() }}"
                                     class="w-32 h-32 object-contain rounded-md bg-gray-100" alt="Thumbnail">
                            </div>
                        @endif

                        @error('recipe_image')
                        <span class="flex text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- reset button -->
                        <button wire:click.throttle.3000ms="reset_recipe_image" type="button"
                                class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg mt-2">
                            Reset
                        </button>

                        <!--loading indication-->
                        <div wire:loading
                             wire:target="recipe_image"
                             class="flex text-sm text-gray-700 ml-2">
                            <div class="flex">
                                <span class="font-bold">Loading...</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#AE763E"
                                     class="size-5 animate-bounce">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v4.59L7.3 9.24a.75.75 0 0 0-1.1 1.02l3.25 3.5a.75.75 0 0 0 1.1 0l3.25-3.5a.75.75 0 1 0-1.1-1.02l-1.95 2.1V6.75Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <!--resetting indication-->
                        <div wire:loading
                             wire:target="reset_recipe_image"
                             class="flex text-sm text-gray-700 ml-2">
                            <div class="flex">
                                <span class="font-bold">Resetting...</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#AE763E"
                                     class="size-5 animate-bounce">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-.75-4.75a.75.75 0 0 0 1.5 0V8.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0L6.2 9.74a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe name -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1 after:content-['*'] after:text-red-500">Recipe
                            name</label>
                        <input wire:model="recipe_name"
                               name="recipe_name"
                               type="text"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                               placeholder="Chicken Broth"
                        />
                        @error('recipe_name')
                        <span class="flex text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Recipe description -->
                    <div class="w-full">
                        <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea wire:model="recipe_description"
                                      name="recipe_description"
                                      class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75"
                                      rows="3"
                                      placeholder="This recipe is about..."></textarea>
                            @error('recipe_description')
                            <span class="flex text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Select Category, Cuisine Menu -->
                    <div class="relative w-full">

                        <!-- category -->
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1 mt-2 after:content-['*'] after:text-red-500">Category</label>
                        <select
                            wire:model="recipe_category"
                            name="dish_category"
                            class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-4 py-2"
                            autocomplete="off"
                        >
                            <option value="">Select Category</option>

                            @foreach($dishCategories as $dishCategory)
                                <option value="{{$dishCategory->id }}">{{ $dishCategory->name }}</option>
                            @endforeach
                        </select>
                        @error('recipe_category')
                        <span class="flex text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- cuisine -->
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1 mt-2 after:content-['*'] after:text-red-500">Cuisine</label>
                        <select
                            wire:model="recipe_cuisine"
                            name="cuisine"
                            class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-4 py-2"
                            autocomplete="off"
                        >

                            <option value="" selected>Select Cuisine</option>

                            @foreach($cuisines as $cuisine)
                                <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                            @endforeach
                        </select>
                        @error('recipe_cuisine')
                        <span class="flex text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- menu -->
                        <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Menu</label>
                        <select
                            wire:model="recipe_menu"
                            name="menu"
                            class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-4 py-2"
                            autocomplete="off"
                        >

                            <option value="" selected>Select menu</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                        @error('recipe_menu')
                        <span class="flex text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-between w-full gap-4 mt-1.5 mb-6">
                            <!-- Time cook -->
                            <div class="flex flex-col w-[120px]">
                                <label class="block text-sm font-medium text-gray-700 mb-1 mt-2 after:content-['*'] after:text-red-500">Time cook</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-2 pointer-events-none">
                                        <svg class="w-6 h-6 text-[#AE763E]" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <input
                                        wire:model="recipe_time"
                                        type="time"
                                        id="time"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg gourmania-focus block w-32 px-2 py-[7.5px]"
                                        min="00:05"
                                        max="24:00"
                                        value="00:00"
                                        autocomplete="off"
                                    />
                                </div>
                                @error('recipe_time')
                                <span class="flex text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Servings -->
                            <div class="flex flex-col flex-grow max-w-[120px]">
                                <label class="block text-sm font-medium text-gray-700 mb-1 mt-2 after:content-['*'] after:text-red-500">Servings</label>
                                <input
                                    wire:model="recipe_servings"
                                    placeholder="1"
                                    type="number"
                                    class="w-full text-[15px] px-2 py-1.5 border border-gray-300 rounded-lg gourmania-focus"
                                    min="1"
                                    autocomplete="off"
                                />
                                @error('recipe_servings')
                                <span class="flex text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif
                {{--END STEP 1--}}

                {{--STEP 2--}}
                @if($form_step == 2)
                    <table class="w-full text-left table-auto">
                        <thead>
                        <tr>
                            <th class="text-sm font-medium text-gray-700 pt-2 text-center">Ingredient</th>
                            <th class="text-sm font-medium text-gray-700 pt-2 text-center">Quantity</th>
                            <th class="text-sm font-medium text-gray-700 pt-2 text-center">Unit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ingredients as $index => $ingredient)
                            <tr>
                                <!-- Ingredient Name -->
                                <td class="py-3 pr-1 w-1/3 relative">
                                    <!--Ingredient counter-->
                                    <span class="absolute -left-5 top-6 text-sm">{{ $index + 1 }}.</span>
                                    <input
                                        wire:model="ingredients.{{$index}}.ingredient_name"
                                        type="text"
                                        class="w-full px-2 py-2 border border-gray-300 rounded-lg gourmania-focus text-sm"
                                        placeholder="Chicken"
                                    />

                                    @error('ingredients.'.$index.'.ingredient_name')
                                    <span class="flex text-red-500 absolute">{{ $message }}</span>
                                    @enderror
                                </td>

                                <!-- Quantity -->
                                <td class="py-3 w-1/3 relative">
                                    <div class="flex justify-center">
                                        <input
                                            wire:model="ingredients.{{$index}}.ingredient_quantity"
                                            placeholder="1"
                                            type="number"
                                            class="w-full text-[15px] px-2 py-1.5 border border-gray-300 rounded-lg gourmania-focus"
                                            min="1"
                                        />
                                    </div>
                                    @error('ingredients.'.$index.'.ingredient_quantity')
                                    <span class="flex text-red-500 absolute">{{ $message }}</span>
                                    @enderror
                                </td>

                                <!-- Unit -->
                                <td class="py-3 pl-1 w-1/3">
                                    <select
                                        wire:model="ingredients.{{$index}}.ingredient_unit"
                                        name="menu"
                                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-[14px] gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-2 py-1.5"
                                        autocomplete="off"
                                    >
                                        <option value="" selected>-</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('ingredients.'.$index.'.ingredient_unit')
                                    <span class="flex text-red-500 absolute">{{ $message }}</span>
                                    @enderror
                                </td>

                                <!-- Remove block button -->
                                <td class="relative">
                                    <div class="absolute bottom-5">
                                        <button
                                            wire:click.throttle.2000ms="remove_ingredient({{$index}})"
                                            wire:target="remove_ingredient({{$index}})"
                                            wire:loading.class="bg-red-500 animate-bounce"
                                            type="button"
                                            class="w-[30px] bg-[#603912] hover:bg-red-500 text-white font-medium py-1 rounded-lg transition-colors flex justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                 fill="currentColor" class="size-4">
                                                <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Add new block -->
                    <div class="flex justify-end mt-3">
                        <button
                            wire:click.throttle.500ms="add_ingredient"
                            wire:loading.class="animate-bounce"
                            type="button"
                            class="w-[35px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="size-4 ">
                                <path
                                    d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
                {{--END STEP 2--}}

                {{--STEP 3--}}
                @if($form_step == 3)
                    @foreach($guide_steps as $index => $guide_step)
                        <div class="p-2 border border-gray-400 rounded-lg">
                            <!-- Step Number -->
                            <div class="flex justify-center mb-2">
                                <span
                                    class="text-black border border-black flex items-center justify-center size-6 rounded-full">
                                    {{  $index + 1 }}
                                </span>
                            </div>

                            <!-- Step Image -->
                            <div class="mt-1 mb-4 max-w-[201px]">
                                <label for="guide_steps.{{$index}}.step_image"
                                       class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                                    <input
                                        wire:model="guide_steps.{{$index}}.step_image"
                                        name="guide_steps.{{$index}}.step_image"
                                        type="file"
                                        class="sr-only"
                                        id="guide_steps.{{$index}}.step_image"
                                        accept="image/jpeg, image/png, image/webp">

                                    @if(!$guide_steps[$index]['step_image'])
                                        <span>Choose file...</span>
                                    @else
                                        <span>{{ $guide_steps[$index]['step_image']->getClientOriginalName() }}</span>
                                    @endif
                                </label>

                                <!-- Step mini photo -->
                                @if($guide_steps[$index]['step_image'] && $guide_steps[$index]['step_image']->getClientOriginalExtension() != null)
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Selected image</label>
                                    <div class="mt-2">
                                        <img src="{{ $guide_steps[$index]['step_image']->temporaryUrl() }}"
                                             class="w-32 h-32 object-contain rounded-md bg-gray-100"
                                             alt="Step{{' '.$index.' '}}thumbnail">
                                    </div>
                                @endif

                                @error('guide_steps.'.$index.'.step_image')
                                <span class="flex text-red-500">{{ $message }}</span>
                                @enderror

                                <!-- reset button -->
                                <button
                                    wire:click.throttle.3000ms="reset_step_image({{$index}})"
                                    type="button" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg mt-2">
                                    Reset
                                </button>

                                <!--loading indication-->
                                <div wire:loading
                                     wire:target="guide_steps.{{$index}}.step_image"
                                     class="flex text-sm text-gray-700 ml-2">
                                    <div class="flex">
                                        <span class="font-bold">Loading...</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#AE763E"
                                             class="size-5 animate-bounce">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v4.59L7.3 9.24a.75.75 0 0 0-1.1 1.02l3.25 3.5a.75.75 0 0 0 1.1 0l3.25-3.5a.75.75 0 1 0-1.1-1.02l-1.95 2.1V6.75Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>

                                <!--resetting indication-->
                                <div wire:loading
                                     wire:target="reset_step_image({{$index}})"
                                     class="flex text-sm text-gray-700 ml-2">
                                    <div class="flex">
                                        <span class="font-bold">Resetting...</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#AE763E"
                                             class="size-5 animate-bounce">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-.75-4.75a.75.75 0 0 0 1.5 0V8.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0L6.2 9.74a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Step text -->
                            <div class="w-full">
                                <div
                                    class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-0 mt-1 after:content-['*'] after:text-red-500"></label>
                                    <textarea
                                        wire:model="guide_steps.{{$index}}.step_text"
                                        name="guide_steps.{{$index}}.step_text"
                                        class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75"
                                        rows="3"
                                        placeholder="First there was an egg..."></textarea>

                                    @error('guide_steps.'.$index.'.step_text')
                                    <span class="flex text-red-500 ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- remove step button -->
                            <div class="flex justify-end mt-3">
                                <button
                                    wire:click.throttle.3000ms="remove_step({{$index}})"
                                    wire:target="remove_step({{$index}})"
                                    wire:loading.class="bg-red-500 animate-bounce"
                                    type="button"
                                    class="w-[35px] bg-[#603912] hover:bg-red-500 text-white font-medium py-1.5 rounded-lg transition-colors flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                         class="size-4">
                                        <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <!-- Add new block -->
                    <div class="flex justify-end mt-3">
                        <button
                            wire:click.throttle.1000ms="add_step"
                            wire:loading.class="animate-bounce"
                            type="button"
                            class="w-[35px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="size-4">
                                <path
                                    d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/>
                            </svg>
                        </button>
                    </div>
                @endif
                {{--END STEP 3--}}

                {{--Navigation buttons--}}
                <div class="flex justify-between">
                    @if($form_step == 2 || $form_step == 3)
                        <!-- Previous step button -->
                        <div class="flex justify-start">
                            <button wire:click.throttle.2000ms="prev_step"
                                    type="button"
                                    class="w-[100px] bg-gray-500 hover:bg-gray-400 text-white font-medium py-2.5 rounded-lg transition-colors">
                                Previous
                            </button>
                        </div>
                    @endif
                    @if($form_step == 1 || $form_step == 2)
                        <!-- Next step button -->
                        <div class="ml-auto"
                            @class(['flex', 'justify-end ' => $form_step == 2])>
                            <button wire:click.throttle.2000ms="next_step"
                                    type="button"
                                    class="w-[100px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                                Next
                            </button>
                        </div>
                    @endif
                    @if($form_step == 3)
                        <!-- Submit button -->
                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="w-[100px] bg-green-400 hover:bg-green-300 text-white font-medium py-2.5 rounded-lg transition-colors">
                                Submit
                            </button>
                        </div>
                    @endif
                </div>
                {{--END Navigation buttons--}}
            </div>
            {{--END STEPS--}}
        </div>
    </div>
</form>
