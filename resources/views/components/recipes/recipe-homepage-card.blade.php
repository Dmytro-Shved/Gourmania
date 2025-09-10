@props(['recipe'])

{{-- Recipe Homepage Card --}}
<div class="recipe-card group">
    <a href="{{ route('recipes.guide', $recipe->id) }}" class="block h-full">
        {{-- Image--}}
        <img class="section-image"
             src="{{ asset('storage/'. $recipe->image) }}"
             alt="Delicious meat steak">
        <div class="hover-overlay">
            {{-- Cuisine name --}}
            <div class="country-label">{{ $recipe->cuisine->name }}</div>
            {{-- Recipe name --}}
            <span class="overlay-text">{{ $recipe->name }}</span>
        </div>
    </a>
</div>
