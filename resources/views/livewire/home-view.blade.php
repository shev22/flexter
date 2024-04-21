<div>
   
    <div id="featured-slider"  >
        <div class="MS-content">
            @foreach ($trending as $movie)
                <div class="item " >

                    
                    <div class="featured-content"
                        style="background: linear-gradient(to bottom, rgba(0,0,0,0), #0f0f0f), 
                        linear-gradient(to right, #000000 1.5%, transparent 80%), url('https://image.tmdb.org/t/p/w1280/{{ $movie['backdrop_path'] }}');  background-size: cover;" >

                   
                            {{-- <button class="wishlist-featured-button" wire:click="wishlist({{ $movie }})" style=" font-size: 25px;" wire:ignore> 
                                <i class="wishlist-featured  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}"></i>
                            </button> --}}
                     

                        <div>
                            @if ($movie['logo'] == false)
                                <h1 class="featured-title"> {{ $movie['title'] }}</h1>
                            @else
                                <img class="featured-title" src="https://image.tmdb.org/t/p/original/{{ $movie['logo'] }}"
                                    alt="">
                            @endif
                            <h5 style=" color: #e9e9e9(221, 221, 221);"> <span
                                    style="	color: #000;
                                        font-weight:bold;
                                        font-size:10px;
                                        background: yellow;
                                        padding: 0.5px 1px;
                                        border-radius: 2.5px;">IMDB</span><i
                                    style="margin: 3px; color:yellow"
                                    class='fa fa-star'></i>{{ $movie['vote_average'] }} |

                                {{ $movie['release_date'] }} | {{ucfirst($movie['media_type'])  }} |


                                @foreach (json_decode($movie['genre_ids'] ) as $genre)
                                    {{ $this->genres()->get($genre) }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </h5>
                            <p class="featured-desc"> {{ $movie['overview'] }}</p>

                            @if ($movie['media_type'] == 'tv')
                                <a href="{{ route('tv.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}"
                                    class="featured-button">
                                @else
                                    <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}"
                                        class="featured-button">
                            @endif
                            WATCH</a>
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

    <div  x-data="{ activeTab: 0 }" >
        <div class="home-section-controls">
            <button @click="activeTab = 0" :class="{ 'active-filter': activeTab === 0 }">Movies</button>
            <button @click="activeTab = 1" :class="{ 'active-filter': activeTab === 1 }">Series</button>
        </div>
        <div class="movie-section " x-show="activeTab === 0" x-cloak>
            
            <x-home-movies-section :nowPlaying="$nowPlayingMovies" :popular="$popular" :upcoming="$upcoming" />
        </div>

        <div class="tv-section  " x-show="activeTab === 1" x-cloak>
            <x-home-tv-section :airingToday="$airingToday" :onair="$onair" :popularTv="$popularTv" />
        </div>
       <hr style=" opacity:0.1">
    </div>

</div>
