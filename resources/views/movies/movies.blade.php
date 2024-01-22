<x-app-layout>
{{-- 
    {{ dd($popularMovies) }} --}}
    <div class="container {{ !$nightMode ? 'active': '' }}">
        <div class="content-container" data-aos="fade-up"
        data-aos-duration="500">
            <livewire:movies.movies-view  />

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
