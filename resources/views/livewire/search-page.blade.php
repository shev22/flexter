<div class="sections ">




    <div class="filter-panel" style="display: flex">
        <div class="section-nav">
            <h3 class="browse-movie-list">Search Panel</h3>
        </div>





        <div style="display: flex;flex-wrap:wrap;">
            <input type="text" class="search-filter" wire:model.live="query" placeholder="Live search..."
                style="margin-right: 10px; ">

            <button id="watchlist-movies" class="active-filter">Movies</button>
            <button id="watchlist-tv">Series</button>
            <button id="watchlist-actors">Actors</button>
        </div>

    </div>
































    <div class="movie-container">
        <section class="main-section" style="padding-top: 10px">
            @foreach ($SearchResult as $movie)
                <div class="card {{ $movie['media_type'] }}" wire:ignore.self style="width: 150px">

                    @if ($movie['media_type'] == 'movie')
                        <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                        @elseif ($movie['media_type'] == 'tv')
                            <a href="{{ route('tv.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                            @else
                                <a href="{{ route('actors.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                    @endif
                    {{-- 
                       <form wire:submit="wishlist({{$movie}})">
                            <button class="wishlist-button">
                                <i
                                    class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}"></i>
                            </button>
                        </form> --}}

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

        </section>
        {{-- {{ $popularMovies->links('custom-pagination-links') }} --}}
        <div class="page-load-status " wire:loading>

            <x-spinner />

        </div>
    </div>

</div>
