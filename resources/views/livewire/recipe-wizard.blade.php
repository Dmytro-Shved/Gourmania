<form action="" method="POST">
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
                        <label for="recipe_image" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                            <input
                                wire:model="recipe_image"
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
                                <img src="{{ $recipe_image->temporaryUrl() }}" class="w-32 h-32 object-contain rounded-md bg-gray-100" alt="Thumbnail">
                            </div>
                        @endif

                        @error('recipe_image')
                        <span class="flex text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- reset button -->
                        <button wire:click="reset_recipe_image" type="button" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg mt-2">
                            Reset
                        </button>
                    </div>

                    <!-- Recipe name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Recipe name</label>
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
                                      class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75" rows="3"
                                      placeholder="This recipe is about..."></textarea>
                            @error('recipe_description')
                            <span class="flex text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Select Category, Cuisine Menu -->
                    <div class="relative w-full">

                        <!-- category -->
                        <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Category</label>
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
                        <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Cuisine</label>
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
                    </div>
                @endif
                {{--END STEP 1--}}

                {{--STEP 2--}}
                @if($form_step == 2)

                    {{--$ingredient['ingredient_name']--}}
{{--                    @php--}}
{{--                        $ingredients = [--}}
{{--                            ['ingredient_name' => 'Chicken', 'ingredient_quantity' => 1, 'ingredient_unit' => 1],--}}
{{--                            ['ingredient_name' => 'Cheese', 'ingredient_quantity' => 3, 'ingredient_unit' => 4],--}}
{{--                            ['ingredient_name' => 'Water', 'ingredient_quantity' => 2, 'ingredient_unit' => 2],--}}
{{--                        ];--}}

{{--                        dump($ingredients[0]['ingredient_name']);--}}
{{--                    @endphp--}}

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
                                <td class="py-2 pr-1 w-1/3">
                                    <input
                                        wire:model="ingredients.{{$index}}.ingredient_name"
                                        type="text"
                                        class="w-full px-2 py-2 border border-gray-300 rounded-lg gourmania-focus text-sm"
                                        placeholder="Chicken"
                                    />
                                </td>

                                <!-- Quantity -->
                                <td class="py-2 w-1/3">
                                    <div class="flex justify-center">
                                        <input
                                            wire:model="ingredients.{{$index}}.ingredient_quantity"
                                            placeholder="1"
                                            type="number"
                                            class="w-full text-[15px] px-2 py-1.5 border border-gray-300 rounded-lg gourmania-focus"
                                            min="1"
                                        />
                                    </div>
                                </td>

                                <!-- Unit -->
                                <td class="py-2 pl-1 w-1/3">
                                    <select
                                        wire:model="ingredients.{{$index}}.ingredient_unit"
                                        name="menu"
                                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 text-[14px] gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 px-2 py-1.5"
                                        autocomplete="off"
                                    >
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <!-- Remove block button -->
                                <td class="relative">
                                    <div class="absolute bottom-3.5">
                                        <button type="button" class="w-[30px] bg-[#603912] hover:bg-red-500 text-white font-medium py-1 rounded-lg transition-colors flex justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
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
                        <button type="button" class="w-[35px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 ">
                                <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                            </svg>
                        </button>
                    </div>
                @endif
                {{--END STEP 2--}}

                {{--STEP 3--}}
                @if($form_step == 3)
                    <div class="p-2 border border-gray-400 rounded-lg">
                        <!-- Step Number -->
                        <div class="flex justify-center mb-2">
                            <span class="text-black border border-black flex items-center justify-center size-6 rounded-full">1</span>
                        </div>

                        <!-- Select Image -->
                        <div class="mt-1 mb-4 max-w-[201px]" x-data="{ files: null, inputId: 'photo-' + Math.random().toString(36).substring(2, 9) }">
                            <label :for="inputId" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                                <input :id="inputId" name="photo" type="file" class="sr-only" x-on:change="files = Object.values($event.target.files)" accept="image/jpeg, image/png, image/webp">
                                <span x-text="files ? files.map(file => file.name).join(', ') : 'New photo...'"></span>
                            </label>

                            <!-- mini photo -->
                            <template x-if="files && files.length > 0">
                                <div class="mt-2 w-full h-32 flex justify-center items-center overflow-hidden">
                                    <img :src="URL.createObjectURL(files[0])" alt="Thumbnail" class="w-full h-full object-cover" />
                                </div>
                            </template>

                            <!-- reset button -->
                            <button type="reset" @click="files = null" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg mt-2">Reset</button>
                        </div>

                        <!-- Step text -->
                        <div class="w-full">
                            <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                                <label class="block text-sm font-medium text-gray-700 mb-1"></label>
                                <textarea id="textArea"
                                          name="description"
                                          class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75" rows="3"
                                          placeholder="This recipe is about..."></textarea>
                            </div>
                        </div>

                        <!-- Add new block -->
                        <div class="flex justify-end mt-3">
                            <button type="button" class="w-[35px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                    <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
                {{--END STEP 3--}}

                {{--Navigation buttons--}}
                <div class="flex justify-between">
                    @if($form_step == 1)
                        <!-- Next step button -->
                        <div class="ml-auto">
                            <button wire:click="next_step()"
                                    type="button"
                                    class="w-[100px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                                Next
                            </button>
                        </div>
                    @endif

                    @if($form_step == 2)
                        <!-- Previous step button -->
                        <div class="flex justify-start">
                            <button wire:click="prev_step()"
                                    type="button"
                                    class="w-[100px] bg-gray-500 hover:bg-gray-400 text-white font-medium py-2.5 rounded-lg transition-colors">
                                Previous
                            </button>
                        </div>

                        <!-- Next step button -->
                        <div class="flex justify-end">
                            <button wire:click="next_step()"
                                    type="button"
                                    class="w-[100px] bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                                Next
                            </button>
                        </div>
                    @endif

                    @if($form_step == 3)
                        <!-- Previous step button -->
                        <div class="flex justify-start">
                            <button wire:click="prev_step()"
                                    type="button"
                                    class="w-[100px] bg-gray-500 hover:bg-gray-400 text-white font-medium py-2.5 rounded-lg transition-colors">
                                    Previous
                            </button>
                        </div>

                            <!-- Submit button -->
                            <div class="flex justify-end">
                                <button type="button"
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
