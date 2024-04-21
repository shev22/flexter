


    <div class="card"
     wire:ignore.self>
        <a href="{{ route('tv.show', ['slug'=>$tvshow['slug'], 'id'=>$tvshow['id']]) }}">
            <form wire:submit="wishlist({{ $tvshow }})">
                <button class="wishlist-button"> 
                    <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($tvshow['id']) ? 'wishlisted' : '' }}"></i>
                </button>
            </form>
        <img src="{{ $tvshow['poster_path'] }}" alt="">
        <div class="content">
            <h3>{{ $tvshow['name'] }}</h3>
            <p> 
  
                @foreach (json_decode($tvshow['genre_ids'] ) as $genre)
                {{ $this->genres()->get($genre) }} 
             
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
                <i class='fa fa-star'></i><span>{{ $tvshow['vote_average'] }}</span> | {{ $tvshow['release_date'] }}
            </h6>

        </div>
    </a>
    </div>
