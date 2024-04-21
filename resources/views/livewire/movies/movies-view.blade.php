<div x-data="{ activeTab: 5 }">
    <x-filter-movies>
        {{ __('Movies') }}
    </x-filter-movies>
    {{-- <div>
        <div x-show="activeTab === 5" x-cloak>
            <livewire:movies.show-all-movies />
        </div>
        <div x-show="activeTab === 0" x-cloak>
            <livewire:movies.popular-movies />
        </div>

        <div class="nowplaying-movies" x-show="activeTab === 1" x-cloak>
            <livewire:movies.now-playing-movies />
        </div>
        <div class="upcoming-movies" x-show="activeTab === 2" x-cloak>
            <livewire:movies.upcoming-movies />
        </div>

        <div class="top-rated-movies" x-show="activeTab === 3" x-cloak>
            <livewire:movies.top-rated-movies />
        </div>
        <div class="trending-movies" x-show="activeTab === 4" x-cloak>
            <livewire:movies.trending-movies />
        </div>
    </div> --}}









    <div class="movie-container movie-view">
        <section class="main-section">
            @foreach ($movies as $movie)
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

</div>


