{{-- Techniques title --}}
<div class="title-container">
    <span class="border-line"></span>
    <small class="section-title">
        TECHNIQUES
    </small>
    <span class="border-line"></span>
</div>

{{-- Techniques section --}}
<div class="w-full max-w-[1280px] mx-auto px-3">
    <div class="relative block overflow-hidden rounded-lg mx-auto max-w-4xl">
        <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
            <video
                class="w-full h-full object-cover rounded-lg"
                controls
                autoplay
                loop
                muted
                playsinline
            >
                <source src="{{ asset('storage/video/video-optimized.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>

<div class="see-more-container text-center mt-4">
    <a href="{{ route('techniques') }}" class="see-more-btn inline-block px-6 py-2 border border-black rounded-md hover:bg-black hover:text-white transition">
        See more
    </a>
</div>
