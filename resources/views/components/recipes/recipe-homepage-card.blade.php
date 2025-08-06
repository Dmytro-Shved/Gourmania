@props(['recipe'])

<div class="recipe-card group">
    <a href="{{ route('recipes.guide', $recipe->id) }}" class="block h-full">
        <img class="section-image"
             src="{{ asset('storage/'. $recipe->image) }}"
             alt="Delicious meat steak">
        <div class="hover-overlay">
            <div class="country-label">{{ $recipe->cuisine->name }}</div>
            <span class="overlay-text">{{ $recipe->name }}</span>
        </div>
    </a>
</div>
