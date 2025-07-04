{{-- Email subscribtion --}}
<div class="sm:col-span-2">
    <h1 class="max-w-lg text-center font-inclusive tracking-tight text-white px-1 text-sm sm:text-base italic py-1">
        Subscribe our newsletter to get new recipes and dishes of the week!
    </h1>

    <form wire:submit.prevent="subscribe" class="flex flex-col mt-6 space-y-3 md:space-y-0 md:flex-row gap-2 px-3 my-3 bg-[#DDB892] rounded p-3">
        @csrf
        <input wire:model="email_address"
               class="px-4 py-2 text-gray-700 font-serif border border-white bg-white rounded-lg focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] flex-grow"
               placeholder="E-mail address"/>

        <button wire:click.debounce
                type="submit"
                class="px-6 py-2.5 text-sm font-inclusive tracking-wider text-white transition-colors duration-300 transform focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C] whitespace-nowrap">
            Subscribe
        </button>
    </form>

    {{-- Success message --}}
    @if (session()->has('success'))
        <p class="mt-2 text-[#4ADE80] font-inclusive">{{ session('success') }}</p>
    @endif

    @if (session()->has('error'))
        <span class="mt-2 text-red-900 font-inclusive">{{ session('error') }}</span>
    @endif
</div>
