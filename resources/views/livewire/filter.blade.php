<!-- Filter -->
<form action="{{ route('filter') }}" method="GET">

    <!-- title -->
    <div class="title-container select-none">
        <span class="flex-grow border-b border-black"></span>
        <small
            class="font-inclusive text-xs xs:text-[14px] sm:text-[16px] md:text-[18px] lg:text-xl xl:text-2xl text-black px-4">
            Filter recipes
        </small>
        <span class="flex-grow border-t border-black"></span>
    </div>

    <div class="flex flex-col items-center px-2 gap-2 md:flex-row md:justify-center md:gap-0.5 md:items-center font-inclusive">
        <!--Icon -->
        <img class="size-10 sm:size-12 md:size-24 md:rotate-45 select-none" src="{{ asset('storage/objects/piper.svg') }}" alt="Pepper" rel="preload">

        <!-- Double select -->
        <div class="flex flex-col w-full max-w-xs items-center gap-1 md:w-1/4 md:px-2 md:py-2">
            <!--Dish Categories -->
            <div class="relative w-full">
                <select wire:model.live="dishCategory"
                        name="dish_category"
                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"
                        autocomplete="off"
                >
                    <option value="">Any category</option>

                    @foreach($dishCategories as $dishCategory)
                        <option value="{{$dishCategory->id }}">{{ $dishCategory->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!--Dish -->
        <div class="flex flex-col w-full max-w-xs items-center gap-2 md:w-1/4 md:px-2 md:py-2">
            <div class="relative w-full">
                <select wire:model.live="dish"
                        name="dish"
                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 gourmania-focus px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"
                        autocomplete="off"
                >

                    <option value="" selected>Any dish</option>

                    @foreach($dishes as $dish)
                        <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Select cuisine -->
        <div class="w-full max-w-xs md:w-1/4  md:py-2">
            <select wire:model.live="cuisine"
                name="cuisine"
                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 gourmania-focus md:px-4 md:py-2 md:text-sm"
                autocomplete="off"
            >

                <option value="" selected>Any cuisine</option>

                @foreach($cuisines as $cuisine)
                    <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select menu -->
        <div class="w-full max-w-xs md:w-1/4 md:px-1 md:py-2">
            <select wire:model.live="menu"
                name="menu"
                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 gourmania-focus md:px-4 md:py-2 md:text-sm"
                autocomplete="off"
            >

                <option value="" selected>Any menu</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Filter button -->
        <div class="w-full max-w-xs md:w-auto md:px-4 md:py-2 md:text-base">
            <button type="submit"
                    class="font-inclusive text-neutral-200 text-sm bg-gourmania hover:gourmania-hover transition rounded-xl px-4 py-1 w-full md:px-4 md:py-2 md:text-base">
                Filter
            </button>
        </div>
    </div>
</form>
