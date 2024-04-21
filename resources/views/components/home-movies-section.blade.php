

<div >
    {{-- trending --}}
    <div class="movie-list-container-trending">
        <div>
            <i class="fa-sharp fa-solid fa-fire-flame"></i>
            <h3 class="movie-list-title  {{ session('nightmode') ? 'active' : '' }}" style="text-align:center;padding:10px">
                <i class='fas fa-fire-alt' style='color:rgb(255, 72, 0)'></i>
                Trending Now
                <i class='fas fa-fire-alt' style='color:rgb(255, 72, 0)'></i>
            </h3>
        </div>
        <div class="movie-list-wrapper" id="trending">
            <div class=" MS-content ">
                @foreach ($nowPlaying as $movie)
                    {{-- <x-homemovie-card :movie="$movie" /> --}}
                    <div class="movie-list-item item" >
                        <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                            <form wire:submit="wishlist({{ $movie }})">
                                <button class="wishlist-button" > 
                    
                                  
                                    <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}" ></i>
                                </button>
                            </form>
                            <img src="{{ $movie['poster_path'] }}" alt="poster" class="movie-list-item-img">
                    
                      
                            <div class="movie-list-item-detail " >
                                <h4 >{{ $movie['title'] }}</h4>
                                <p ><span>IMDB</span>
                                    <i style="margin: 3px; color:yellow" class='fa fa-star'>
                                    </i>{{ $movie['vote_average'] }}
                                    |
                                    {{ $movie['release_date'] }}
                                </p>
                    
                                <small>{{  $movie['overview'] }}</small>
                            </div>
                        </a>
                    
                    </div>
                @endforeach
            </div>
            <div class="MS-controls">
                <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>




    {{-- trending --}}

    <div style="display: flex; margin-top:5px; padding:10px; height:65rem; overflow: hidden;   " >

        <div class="movie-list-container" style="overflow: scroll">


            <h3 class="movie-list-title  {{ session('nightmode') ? 'active' : '' }}" style="padding:5px">RECOMMENDED | TOP RATED
                <i class='fa fa-film'></i>
            </h3>

            <div class="movie-list " >
                @foreach ($popular as $movie)
                <div class="movie-list-item item" >
                    <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                        <form wire:submit="wishlist({{ $movie }})">
                            <button class="wishlist-button" > 
                
                              
                                <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}" ></i>
                            </button>
                        </form>
                        <img src="{{ $movie['poster_path'] }}" alt="poster" class="movie-list-item-img">
                
                  
                        <div class="movie-list-item-detail " >
                            <h4 >{{ $movie['title'] }}</h4>
                            <p ><span>IMDB</span>
                                <i style="margin: 3px; color:yellow" class='fa fa-star'>
                                </i>{{ $movie['vote_average'] }}
                                |
                                {{ $movie['release_date'] }}
                            </p>
                
                            <small>{{  $movie['overview'] }}</small>
                        </div>
                    </a>
                
                </div>
                @endforeach
            </div>

        </div>

        <div class="recently-updated" style="overflow: scroll">
            <h3 class="movie-list-title {{ session('nightmode') ? 'active' : '' }}" style="padding: 0 5px">
                RECENTLY UPDATED


                <i class='fa fa-film'></i>

            </h3>
            <div class="wrapper">
                <ul>
                    @foreach ($upcoming as $key => $movie)
                        <li class="search-results-item" >
                            <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                                <form wire:submit="wishlist({{ $movie }})">
                                    <button class="wishlist-button" > 
                                        <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}" ></i>
                                    </button>
                                </form>
                                <img src="{{ $movie['poster_path'] }}" alt="poster">
                                <span style="margin-left: 22px">
                                    <div>
                                        <h4 class="auth  {{ session('nightmode') ? 'active' : '' }}">
                                            {{ $movie['title'] }}

                                        </h4>
                                    </div>
                                    <div>
                                        <ul class="search-detail" style="font-size: 12px">
                                            <li>
                                                IMDB
                                                <i style="color: rgb(218, 218, 7) ; margin: 2px; font-size:11px;"
                                                    class='fa fa-star'></i>
                                                <span>{{ $movie['vote_average'] }}</span>
                                            </li>

                                            <li>
                                                {{ $movie['release_date'] }}
                                            </li>
                                        </ul>
                                    </div>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

