<div class="movie-container">
    {{-- <img src="img/logo/upcoming.png" width="220px" style="padding: 30px 0 0 80px">   --}}

    <x-filter-movies /> 
    <section class="main-section">
        @foreach ($upcoming as $movie)
            <x-movie-card :movie="$movie" />
        @endforeach
        <div x-data="{
            observe() {
                const observer = new IntersectionObserver((popularMovies) => {
                    popularMovies.forEach(movie => {
                        if (movie.isIntersecting) {
                            @this.loadMore()
                        }
                    })
                })
        
                observer.observe(this.$el)
            }
        }" x-init="observe">

        </div>
    </section>
    {{-- {{ $popularMovies->links('custom-pagination-links') }} --}}
    <div class="page-load-status " wire:loading>

        <x-spinner />

    </div>
</div>