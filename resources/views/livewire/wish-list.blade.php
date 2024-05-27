<div class="sections " style="padding-top: 20px">
    <div class="filter-panel" style="display: flex">
        <div class="section-nav">
            <h3 class="browse-movie-list">Watch list</h3>
        </div>

        <div style="display: flex;flex-wrap:wrap;" class="search-panel">

            <button id="movies">Movies</button>
            <button id="tv">Series</button>
        </div>

    </div>

    {{-- {{ dd($wishlist ) }} --}}

    <div class="movie-container">
        <section class="main-section">
            @foreach ($wishlist as $movie)
                <div class="card {{ $movie['media_type'] }}" wire:ignore.self>
                    <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">

                        <form wire:submit="wishlist({{ $movie }})">
                            <button class="wishlist-button">
                                <i class="wishlist  fas fa-bookmark wishlisted"></i>
                            </button>
                        </form>

                        <img src="{{ $movie['poster_path'] }}" alt="">



                        <div class="content">
                            <h3>{{ $movie['title'] }}</h3>

                            <h6>
                                <span
                                    style="	color: #000;
                            font-weight:bold;
                            font-size:10px;
                        background: yellow;
                        padding: 0.5px 1px;
                        border-radius: 2.5px;">IMDB</span>
                                <i class='fa fa-star'></i>{{ $movie['vote_average'] }} | {{ $movie['release_date'] }}
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
        {{-- {{ $popularMovies->links('custom-pagination-links') }} --}}
        <i  wire:loading class="fa fa-spinner fa-pulse fa-fw movies-spinner "></i>

    </div>

</div>
