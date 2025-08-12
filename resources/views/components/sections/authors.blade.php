@props(['authors'])

{{-- Authors of the week title --}}
<div class="title-container" id="authorsOfTheWeek">
    <span class="border-line"></span>
    <small class="section-title">
        AUTHORS OF THE WEEK
    </small>
    <span class="border-line"></span>
</div>

{{-- Authors of the week section --}}
<section id="authors" class="bg-gray-100 mb-16">
    <div class="container mx-auto px-4 lg:px-20 xl:px-52 2xl:px-80">
        <div class="grid grid-cols-3 gap-3">
            {{-- Author card  --}}
            @foreach($authors as $author)
                <div class="author-container">
                    <a href="#">
                        <img src="{{ asset('storage/'.$author->photo) }}"
                             alt="Team Member 1" class="author-image">
                        <h3 class="author-name">{{ $author->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
