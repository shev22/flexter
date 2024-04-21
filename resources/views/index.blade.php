<x-app-layout>
    <div class="container {{ session('nightmode') ? 'active' : '' }}">
        <div class="content-container">
            <livewire:home-view>
        </div>

    </div>
    @include('layouts.footer')
</x-app-layout>

@if (request()->routeIs('/'))
    <script>
        $(document).ready(function() {
            $('#featured-slider').multislider({
                interval: 6000,
                duration: 200
            });

            $('#trending').multislider({
                // continuous: true,
                // duration: 20000,
                // slideAll:true,
                interval: 3000,
            });

            $('#airing-today').multislider({
                interval: 3000,
            });
        });


    </script>
@endif
