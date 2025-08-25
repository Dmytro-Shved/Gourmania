@props(['authors'])

{{-- Authors of the week title --}}
<div class="title-container" id="authors">
    <span class="border-line"></span>
    <small class="section-title">
        AUTHORS OF THE WEEK
    </small>
    <span class="border-line"></span>
</div>

{{-- Authors of the week section --}}
<section id="authors" class="bg-gray-100 mb-16">
    <div class="container mx-auto px-4 lg:px-20 xl:px-52 2xl:px-80">
        <div @class([
            'grid gap-3 md:gap-4',
            'grid-cols-1 justify-items-center' => count($authors) === 1,
            'grid-cols-2 sm:grid-cols-3' => count($authors) !== 1,
        ])>
            @forelse($authors as $author)
                <div @class([
                    'author-container',
                    'w-full max-w-[200px]' => count($authors) === 1,
                    'w-full' => count($authors) !== 1,
                ])>
                    <a href="{{ route('profiles.show', $author->id) }}" class="flex flex-col items-center">
                        <img src="{{ asset('storage/'. $author->photo) }}"
                       alt="{{ $author->name }}"
                       class="author-image w-full h-auto object-cover rounded-lg">
                        <h3 class="author-name mt-2 text-center">{{ $author->name }}</h3>
                    </a>
                </div>
            @empty
                <div class="flex justify-center my-5 col-span-full">
                    <span class="text-white bg-gourmania p-2 rounded-lg">No popular authors</span>
                </div>
            @endforelse
        </div>
    </div>
</section>
