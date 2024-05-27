

<div >
    {{-- trending --}}
    <div class="movie-list-container-trending">
      
        <div class="movie-list-wrapper" id="trending">
            <div class=" MS-content ">
                @foreach ($nowPlaying as $movie)
                    <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                    <div class="movie-list-item item" >
                            <form wire:submit="wishlist({{ $movie }})">
                                <button class="wishlist-button" > 
                    
                                  
                                    <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}" ></i>
                                </button>
                            </form>
                            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['backdrop_path'] }}" alt="poster" class="movie-list-item-img">
                    
                      
                            <div class="content" >
                                <h4 >{{ $movie['title'] }}</h4>
                                
                                <p ><span style="color: #000;
                                    font-weight:bold;
                                    font-size:10px;
                                    background: yellow;
                                    padding: 0.5px 1px;
                                    border-radius: 2.5px;">IMDB</span>
                                    <i style="margin: 3px; color:yellow" class='fa fa-star'>
                                    </i>{{ $movie['vote_average'] }}
                                    |
                                    {{ $movie['release_date'] }}
                                </p>
                                @foreach (json_decode($movie['genre_ids'] )->genre as $genre)
                                {{ $this->genres()->get($genre) }}
                                @if (!$loop->last )
                                    ,
                                @endif
                            @endforeach
            
                            </div>
                       
                    
                    </div>
                </a>
                @endforeach
            </div>
            <div class="MS-controls">
                <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
        <h3 class="movie-list-title  {{ session('nightmode') ? 'active' : '' }}" style="padding:5px; margin-top:15px;">RECOMMENDED | TOP RATED
            <i class='fa fa-film'></i>
        </h3>
    </div>




    {{-- recommended --}}
   
    <div class="home-recommended" >

        <div class="movie-list-container" >
          
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
                            <p ><span style="color: #000;
                                font-weight:bold;
                                font-size:10px;
                                background: yellow;
                                padding: 0.5px 1px;
                                border-radius: 2.5px;">IMDB</span>
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


    

        

    
        <div class="recently-updated"  style="width: 30%">
            <h3 class="movie-list-title {{ session('nightmode') ? 'active' : '' }}" style="padding: 0 5px;">
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
                                        <h4 class="auth {{ session('nightmode') ? 'active' : '' }}">
                                            {{ $movie['title'] }}

                                        </h4>
                                    </div>
                                    <div>
                                        <ul class="search-detail" style="font-size: 12px; color:rgb(99, 99, 99)">
                                            <li>
                                               
                                                <i style="color: rgb(243, 190, 15) ; margin: 2px; font-size:10px;"
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


        <div class="movie-list-container recently-updated-moblie" style=" margin-top:50px">
            <h3 class="movie-list-title  {{ session('nightmode') ? 'active' : '' }}" style="padding:5px; ">   RECENTLY UPDATED
                <i class='fa fa-film'></i>
            </h3>
            <div class="movie-list " >
                @foreach ($upcoming as $movie)
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
                            <p ><span style="color: #000;
                                font-weight:bold;
                                font-size:10px;
                                background: yellow;
                                padding: 0.5px 1px;
                                border-radius: 2.5px;">IMDB</span>
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
    </div>


</div>

