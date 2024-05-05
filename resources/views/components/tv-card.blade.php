

    <div class="card">
        <a href="{{ route('tv.show', ['slug' => $tvshow['slug'], 'id' => $tvshow['id']]) }}">
    
            <form wire:submit="wishlist({{ $tvshow }})">
                <button class="wishlist-button">
                    <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($tvshow['id']) ? 'wishlisted' : '' }}"></i>
                </button>
            </form>
            <img src="{{ $tvshow['poster_path'] }}" alt="">
            <div class="content">
                <h3>{{ $tvshow['title'] }}</h3>
                <p>
                    @foreach (json_decode($tvshow['genre_ids'] )->genre as $genre)
                        {{ $this->genres()->get($genre) }}
                        {{-- @if (!$loop->last)
                            ,
                        @endif --}}
                    @endforeach
                </p>
                <h6>
                    <span class="imdb" >IMDB</span>
                    <i class='fa fa-star'></i>
                    <span>
                        {{ $tvshow['vote_average'] }}
                        | {{ $tvshow['release_date'] }}
                    </span> 
                </h6>
            </div>
        </a>
    </div>
    
    
    