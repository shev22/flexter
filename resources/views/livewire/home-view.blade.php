<div>
    {{-- {{ dd($media[0]['popular '] ?? [], $media[0]['airingtoday '] ?? [] ) }} --}}

    {{-- {{

    dd($media) 
    
    }} --}}
    <div id="featured-slider">
        <div class="MS-content">
            @foreach ($trending ?? [] as $movie)
                <div class="item ">

                    <div class="featured-content">
                        <img src="https://image.tmdb.org/t/p/w1280/{{ $movie['backdrop_path'] }}"
                            style="width:100%; height:100%; ">

                        {{-- 
                            @if ($movie['logo']['video'] !== []) --}}
                        {{-- <iframe  height="100%" width="100%" 
                            src="https://youtube.com/embed/{{ $movie['logo']['video']}}?autoplay=1&mute=1&loop=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                         >
                          </iframe>  --}}

                        {{-- <iframe  src="https://youtube.com/embed/{{ $movie['logo']['video']}}?autoplay=1&mute=1&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                            @endif --}}


                        {{-- <button class="wishlist-featured-button" wire:click="wishlist({{ $movie }})" style=" font-size: 25px;" wire:ignore> 
                                <i class="wishlist-featured  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}"></i>
                            </button> --}}


                        <div class="featured-content-detail">



                            @if ($movie['logo']['logo'] == false)
                                <h1 class="featured-title"> {{ $movie['title'] }}</h1>
                            @else
                                <img class="featured-title"
                                    src="https://image.tmdb.org/t/p/original/{{ $movie['logo']['logo'] }}"
                                    alt="">
                            @endif



                            <div>
                                <h5>
                                    <span class="imdb"> IMDB </span>
                                    <i style="margin: 3px; font-size:11px; color:yellow" class='fa fa-star'> </i>

                                    <span class="featured-content-movie-details">
                                        {{ $movie['vote_average'] }} |
                                        {{ $movie['release_date'] }} |
                                        {{ ucfirst($movie['media_type']) }} |
                                        @foreach (json_decode($movie['genre_ids'])->genre as $genre)
                                            {{ $this->genres()->get($genre) }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </h5>

                                <div>
                                    <p class="featured-desc"> {{ $movie['overview'] }}</p>

                                    @if ($movie['media_type'] == 'tv')
                                        <a href="{{ route('tv.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}"
                                            class="featured-button">
                                        @else
                                            <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}"
                                                class="featured-button">
                                    @endif
                                    WATCH
                                    </a>
                                </div>

                            </div>




                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="MS-controls">
            <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
            <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
    </div>

    <hr style="width:98%; margin:0 auto; opacity:0.1">
    {{-- {{ dump($media[0]['nowplayingmovies '] ?? false) }} --}}

    <div>
        <div class="home-section-controls">
            <div class="buttons">
                <button @click="activeTab = 0" :class="{ 'active-filter': activeTab === 0 }"
                    wire:click="showmovies">Movies</button>
                <button @click="activeTab = 1" :class="{ 'active-filter': activeTab === 1 }"
                    wire:click="showtv">Series</button>
            </div>

            <div style="margin: 0 auto">

                <h3 class="movie-list-title  {{ session('nightmode') ? 'active' : '' }}">
                    <i class='fas fa-fire-alt' style='color:rgb(255, 72, 0)'></i>
                    Trending Now
                    <i class='fas fa-fire-alt' style='color:rgb(255, 72, 0)'></i>
                </h3>
            </div>
        </div>


        @isset($media['movies'])
            <div class="movie-section ">

                <x-home-movies-section :nowPlaying="$media['movies']['nowplayingmovies ']" :popular="$media['movies']['popular ']" :upcoming="$media['movies']['upcoming ']" />
            </div>
        @endisset


        @isset($media['series'])
            <div class="tv-section  " >
                <x-home-tv-section :airingToday="$media['series']['airingtoday ']" :onair="$media['series']['onair ']" :popularTv="$media['series']['populartv ']" />
            </div>
        @endisset
    </div>

</div>
