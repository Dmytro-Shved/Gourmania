{{--<div class="title-container">--}}
{{--    <span class="flex-grow border-b border-black"></span>--}}
{{--    <small--}}
{{--        class="font-inclusive text-xs xs:text-[14px] sm:text-[16px] md:text-[18px] lg:text-xl xl:text-2xl text-black px-4">--}}
{{--        Filter recipes--}}
{{--    </small>--}}
{{--    <span class="flex-grow border-t border-black"></span>--}}
{{--</div>--}}

{{-- Filter --}}
{{--<form action="{{ route('filter') }}" method="GET">--}}
{{--    <div x-data="{--}}
{{--                firstValue: '',--}}
{{--                secondValue: ''--}}
{{--                }"--}}
{{--         class="flex flex-col items-center px-2 gap-2 md:flex-row md:justify-center md:gap-0.5 md:items-center font-inclusive">--}}

{{--        --}}{{-- Icon --}}
{{--        <img class="size-10 sm:size-12 md:size-24 md:rotate-45" src="{{ asset('storage/objects/piper.svg') }}" alt="" rel="preload">--}}

{{--        --}}{{-- Double select --}}
{{--        <div class="flex flex-col w-full max-w-xs items-center gap-1 md:w-1/4 md:px-2 md:py-2">--}}
{{--            --}}{{-- Dish Categories --}}
{{--            <div class="relative w-full">--}}
{{--                <select id="dishCategory"--}}
{{--                        name="dishCategory"--}}
{{--                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"--}}
{{--                        x-model="firstValue"--}}
{{--                        @change="secondValue = ''"--}}
{{--                >--}}
{{--                    <option value="" selected>Any dish</option>--}}
{{--                    <option value="Steak">Steak</option>--}}
{{--                    <option value="Cheeseburger">Cheeseburger</option>--}}
{{--                    <option value="Mohito">Mohito</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        --}}{{-- Dish --}}
{{--        <div class="flex flex-col w-full max-w-xs items-center gap-2 md:w-1/4 md:px-2 md:py-2">--}}
{{--            <div class="relative w-full">--}}
{{--                <select id="dish" name="dish" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 gourmania-focus px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm" x-model="secondValue" :disabled="!firstValue">--}}
{{--                    <option value="" :selected="!firstValue" x-text="firstValue ? 'Any type' : 'Any type'"></option>--}}
{{--                    <option value="type_1">Type 1</option>--}}
{{--                    <option value="type_2">Type 2</option>--}}
{{--                    <option value="type_3">Type 3</option>--}}
{{--                    <option value="type_4">Type 4</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        --}}{{-- Select cuisine --}}
{{--        <div class="w-full max-w-xs md:w-1/4  md:py-2">--}}
{{--            <select id="cuisine" name="cuisine" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 gourmania-focus md:px-4 md:py-2 md:text-sm">--}}
{{--                <option value="" selected>Any cuisine</option>--}}
{{--                <option value="Australia">Australian</option>--}}
{{--                <option value="Belgium">Belgian</option>--}}
{{--                <option value="China">Chinese</option>--}}
{{--                <option value="France">French</option>--}}
{{--                <option value="Germany">German</option>--}}
{{--                <option value="Italy">Italian</option>--}}
{{--                <option value="Mexico">Mexican</option>--}}
{{--                <option value="Poland">Polish</option>--}}
{{--                <option value="Portugal">Portuguese</option>--}}
{{--                <option value="Spain">Spanish</option>--}}
{{--                <option value="Turkey">Turkish</option>--}}
{{--                <option value="Ukraine">Ukrainian</option>--}}
{{--                <option value="United Kingdom">British</option>--}}
{{--                <option value="United States">American</option>--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        --}}{{-- Select menu --}}
{{--        <div class="w-full max-w-xs md:w-1/4 md:px-1 md:py-2">--}}
{{--            <select id="menu" name="menu" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 gourmania-focus md:px-4 md:py-2 md:text-sm">--}}
{{--                <option value="" selected>Any menu</option>--}}
{{--                <option value="Ketogenic">Ketogenic</option>--}}
{{--                <option value="Gluten-free">Gluten-free</option>--}}
{{--                <option value="Vegetarian">Vegetarian</option>--}}
{{--                <option value="Vegan">Vegan</option>--}}
{{--                <option value="Paleo">Paleo</option>--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        --}}{{-- Filter button --}}
{{--        <div class="w-full max-w-xs md:w-auto md:px-4 md:py-2 md:text-base">--}}
{{--            <button type="submit"--}}
{{--                    class="font-inclusive text-neutral-200 text-sm bg-gourmania hover:gourmania-hover transition rounded-xl px-4 py-1 w-full md:px-4 md:py-2 md:text-base">--}}
{{--                Filter--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</form>--}}
