<x-layout>
    @section('title',  'Recipes and more')

    @if(session()->has('user_registered'))
        {{-- Registered --}}
        <x-session.message :message="session('user_registered')" title="Success!" type="success" />
    @elseif(session()->has('logged_out'))
        {{-- Logged out --}}
        <x-session.message :message="session('logged_out')" title="Logged out!" type="danger"/>
    @elseif(session()->has('logged_in'))
        {{-- Logged in --}}
        <x-session.message :message="session('logged_in')" title="Logged in!" type="success" />
    @endif

    {{-- Main page--}}
    <div class="font-inclusive text-xl">
        {{-- Hero section--}}
        <x-sections.hero>
            <x-slot name="stats">
                <x-sections.stats :stats="$stats" />
            </x-slot>
        </x-sections.hero>

        {{-- Carousel section--}}
        <x-sections.carousel/>

        {{-- Recipe section --}}
        @foreach($sections as $section)
            <x-sections.recipe :section="$section"/>
        @endforeach

        {{-- tools section --}}
        <x-sections.tools/>

        {{-- Techniques Section --}}
        <x-sections.techniques/>

        {{-- Authors Sections --}}
        <x-sections.authors :authors="$authorsOfTheWeek"/>
    </div>
</x-layout>
