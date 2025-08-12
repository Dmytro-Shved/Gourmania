<footer class="bg-gourmania dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <livewire:newsletter-subscription />

            <x-footer.nav/>

            <x-footer.accordion/>
        </div>

        <x-footer.socials/>

        <x-footer.quote/>

        <div class="text-center my-5">
            <x-footer.logo/>
            <div class="see-more-container">
                <span class="flex-grow border-t border-neutral-200"></span>
                    <x-footer.copyright/>
                <span class="flex-grow border-t border-neutral-200"></span>
            </div>
        </div>
    </div>
</footer>
