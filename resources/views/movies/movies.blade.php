<x-app-layout>
    <div class="container">
        <div class="content-container">
            <div class="movie-container">
                <h3 class="browse-movie-list">BROWSE MOVIES</h3>
                <section class="main-section">
                    @foreach ($popularMovies as $movie)
                        <x-movie-card :movie="$movie" />
                    @endforeach
                </section>

            </div>
            <div class="page-load-status ">
                <x-spinner/>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">Error</p>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    $('.main-section').infiniteScroll({
        // options
        path: '/movies/page/@{{#}}',
        append: '.card',
        status: '.page-load-status',
        // history: true,
    });
</script>
