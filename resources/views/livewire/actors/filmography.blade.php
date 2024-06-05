<div>

    <div class="movie-container movie-view " style="padding-top: 5px;  height: 90vh;
    overflow: auto;">

        <div class="filter-actor-media">

            <div style="width: 150px">
                <h4 style="display: inline">FILMOGRAPHY</h4>
                <i  wire:loading class="fa fa-spinner fa-pulse fa-fw  "></i>

            </div>

            <div>
                <button wire:click="movies" class="{{ $this->movie ? 'active-filter' : '' }}">
                    Movies
                </button>
                <button wire:click="tvs" class="{{ $this->tv ? 'active-filter' : '' }}">
                    Tv
                </button>
                <button wire:click="rating" class="{{ $this->imdb ? 'active-filter' : '' }}">
                    IMDB
                </button>
                <button  wire:click="popular" class="{{ $this->Bypopular ? 'active-filter' : '' }}">
                    Popular
                </button>

            </div>
       </div>
        <section class="main-section" style="margin-top: 10px;   height: 100vh;
        overflow: auto;">

            @foreach ($movies as $movie)
                <div class="card" >
                    <a href="{{ $movie['linkToPage'] }}">
                        <img src="{{ $movie['poster_path'] }}" alt="">
                        <div class="content">
                            <h3>{{ $movie['title'] }}</h3>
                            <p>
                                @foreach ($movie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}
                                @endforeach
                            </p>
                            <h6>
                                <span
                                    style="	color: #000;
                                                            font-weight:bold;
                                                            font-size:10px;
                                                        background: yellow;
                                                        padding: 0.5px 1px;
                                                        border-radius: 2.5px;">IMDB</span>
                                <i class='fa fa-star'></i><span>{{ $movie['vote_average'] }}</span> |
                                {{ \Carbon\Carbon::parse($movie['release_date'])->format('M, Y') }}
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
        <i  wire:loading class="fa fa-spinner fa-pulse fa-fw movies-spinner "></i>
    </div>

</div>
