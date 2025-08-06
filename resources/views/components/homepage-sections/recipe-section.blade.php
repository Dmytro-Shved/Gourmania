@props(['section'])

{{-- Sectrion title --}}
<div class="title-container">
    <span class="border-line"></span>
    <small class="section-title">
        {{ $section['title'] }}
    </small>
    <span class="border-line"></span>
</div>

{{-- Section Grid --}}
<div class="section-container">
    @foreach($section['recipes'] as $recipe)
        {{-- Recipe card --}}
        <x-recipes.recipe-homepage-card :recipe="$recipe"/>
    @endforeach
</div>

{{-- See more button --}}
<div class="see-more-container">
    <a href="{{ route('recipes.index') }}" class="see-more-btn">
        See more
    </a>
</div>
