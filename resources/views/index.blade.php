<x-layout>
    @section('title',  'Recipes and more')

    @if(session()->has('user_registered'))
        {{-- Registered --}}
        <x-session.message :message="session('user_registered')" type="success" />
    @elseif(session()->has('email_verified'))
        {{-- Logged in --}}
        <x-session.message :message="session('email_verified')" type="success" />
    @elseif(session()->has('logged_in'))
        {{-- Logged in --}}
        <x-session.message :message="session('logged_in')" type="success" />
    @elseif(session()->has('logged_out'))
        {{-- Logged out --}}
        <x-session.message :message="session('logged_out')" type="danger"/>
    @endif

    {{-- Main page--}}
    <div class="font-inclusive text-xl">
        {{-- Hero section--}}
        <x-sections.hero>
            <x-slot name="stats">
                <x-sections.stats :$stats />
            </x-slot>
        </x-sections.hero>

        {{-- Sections --}}
        @forelse($sections as $section)
            @if($section['type'] == 'popular')
                {{-- Carousel section--}}
                <x-sections.carousel :$section/>
            @else
                {{-- Recipe section --}}
                <x-sections.recipe :$section/>
            @endif
        @empty
            <div class="flex justify-center my-5">
                <span class="text-white bg-gourmania p-2 rounded-lg">No available sections</span>
            </div>
        @endforelse

        {{-- Tools section --}}
        <x-sections.tools/>

        {{-- Techniques Section --}}
        <x-sections.techniques/>

        {{-- Authors Sections --}}
        <x-sections.authors :authors="$topAuthors"/>
    </div>
</x-layout>
