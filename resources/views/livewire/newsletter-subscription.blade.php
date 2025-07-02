{{-- Email subscribtion --}}
<div class="sm:col-span-2">
    <h1 class="max-w-lg text-[10] text-center font-inclusive tracking-tight text-white px-1 xl:text-md italic py-1">
        Subscribe our newsletter to get a new recipes and dishes of the week!
    </h1>

    <form wire:submit.prevent="subscribe" class="flex flex-col mt-6 space-y-3 md:space-y-0 md:flex-row px-3 my-3 bg-[#DDB892] rounded p-3">
        @csrf
        <input wire:model="email_address"
            class="px-4 py-2 text-gray-700 font-serif border border-white bg-white rounded-lg focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]"
            placeholder="E-mail address"/>

        <button wire:click.throttle
            type="submit"
            class="w-full px-6 py-2.5 text-sm font-inclusive tracking-wider text-white transition-colors duration-300 transform md:w-auto md:mx-4 focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C]">
            Subscribe
        </button>
    </form>

    {{-- Subscribed --}}
    @if (session()->has('success'))
        <p class="mt-2 text-[#4ADE80] font-inclusive">{{ session('success') }}</p>
    @endif

    {{-- Updated --}}
    @if (session()->has('info'))
        <p class="mt-2 text-[#4ADE80] font-inclusive">{{ session('info') }}</p>
    @endif

    {{-- Error --}}
    @error('email_address')
    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded">
        {{ $message }}
    </div>
    @enderror
</div>
