<x-app-layout>
            <livewire:home-view>
    {{-- @include('layouts.footer') --}}
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
                interval: 2000,
            });

            $('#airing-today').multislider({
                interval: 3000,
            });
        });


    </script>
@endif
