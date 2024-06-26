<div class="sections ">

    <div class="filter-panel" style="display: flex;" id="search-panel">
        <div class="section-nav" style="width: 90px">
            <h3 style="display: inline" class="browse-movie-list">Search </h3>
            <i wire:loading class="fa fa-spinner fa-pulse fa-fw  "></i>

        </div>
        <div style="display: flex;flex-wrap:wrap;">
            <input type="text" class="search-filter" wire:model.live="query" placeholder="Live search..."
                style="margin-right: 10px; ">

            <button wire:click="updateShowmovies" class="{{ $this->showmovies ? 'active-filter' : '' }}">Movies</button>
            <button wire:click="updateShowtv" class="{{ $this->showtv ? 'active-filter' : '' }}">Series</button>
            <button wire:click="updateShowactors" class="{{ $this->showactors ? 'active-filter' : '' }}">Actors</button>
        </div>

    </div>

    <div class="movie-container">
        <section class="main-section movie-view" style="padding-top: 10px">
            @foreach ($SearchResult as $movie)
                <div class="card {{ $movie['media_type'] }}" wire:ignore.self>

                    <a href="{{ route($movie['route'], ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">

                        <img src="{{ $movie['poster_path'] }}" alt="">
                        <div class="content">
                            <h3>{{ $movie['title'] }}</h3>

                            <h6>
                                <span class="imdb">IMDB</span>
                                <i class='fa fa-star'></i>
                                <span>
                                    {{ $movie['vote_average'] }}
                                    | {{ $movie['release_date'] }}
                                </span>
                            </h6>
                        </div>
                    </a>
                </div>
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
        <i wire:loading class="fa fa-spinner fa-pulse fa-fw movies-spinner "></i>

    </div>

</div>
