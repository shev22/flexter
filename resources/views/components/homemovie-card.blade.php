
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
