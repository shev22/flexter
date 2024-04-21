<x-app-layout>
    <div class="container {{ session('nightmode') ? 'active': '' }}">
        <div class="content-container">

            <livewire:wish-list  />
     
        </div>
     
            </div>
            @include('layouts.footer')
</x-app-layout>