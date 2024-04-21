{{-- <div x-data="{ activeTab: 4 }">

    <div class="nowplaying-tv" x-show="activeTab === 4" x-cloak>
        <livewire:tv.show-all-tv />
    </div>

    <div class="nowplaying-tv" x-show="activeTab === 0" x-cloak>
        <livewire:tv.airing-today />
    </div>

    <div class="porpular-tv" x-show="activeTab === 1" x-cloak>
        <livewire:tv.popular-tv />
    </div>

    <div class="upcoming-tv" x-show="activeTab === 2" x-cloak>
        <livewire:tv.on-air />
    </div>

    <div class="top-rated-tv" x-show="activeTab === 3" x-cloak>
        <livewire:tv.top-rated-tv />
    </div>
    
       <div class="trending-movies" x-show="activeTab === 4" >
        <livewire:trending-tv />
    </div>

</div> --}}

<div >
    <x-filter-movies>
        {{ __('Tv Series') }}
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
            @foreach ($tv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />
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


