<x-app-layout>
    <div class="container {{ !$nightMode ? 'active': '' }}" >
        <div class="content-container" data-aos="fade-up"
        data-aos-duration="500">
            <livewire:tv.tv-view />
        </div>
    </div>
</x-app-layout>
