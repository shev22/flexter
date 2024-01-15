<x-app-layout>
{{-- 
    {{ dd($popularMovies) }} --}}
    <div class="container">
        <div class="content-container" >
            <livewire:movies-view  />

        </div>

    </div>
</x-app-layout>

{{-- 
<script>
    $('.main-section').infiniteScroll({
        // options
        path: '/movies/page/@{{ # }}',
        append: '.card',
        status: '.page-load-status',
        // history: true,
    });
</script> --}}
