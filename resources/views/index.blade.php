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
        <x-homepage-sections.hero-section/>

        {{-- Carousel section--}}
        <x-homepage-sections.carousel-section/>

         {{-- Recipe section --}}
        @foreach($sections as $section)
            <x-homepage-sections.recipe-section :section="$section"/>
        @endforeach

        {{-- Instruments section --}}
        <x-homepage-sections.instruments-section/>

        {{-- Techniques Section --}}
        <x-homepage-sections.techniques-section/>

        {{-- Authors Sections --}}
        <x-homepage-sections.authors-section/>
    </div>
</x-layout>
