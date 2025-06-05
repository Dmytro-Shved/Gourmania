<button
    x-cloak
    x-data="{ visible: false }"
    x-init="window.addEventListener('scroll', () => { visible = window.scrollY > 1500 })"
    x-show="visible"
    @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="fixed bottom-6 right-6 bg-gourmania text-white p-2 rounded-full shadow-lg hover:gourmania-hover transition-colors duration-300 z-50"
    x-transition.opacity
>
    <div class="bg-white rounded-full p-2">
        <img src="{{ asset('storage/objects/chicken-leg.svg') }}" class="w-10 text-white" alt="Scroll to top">
    </div>
</button>
