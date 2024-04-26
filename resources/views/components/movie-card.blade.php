<div class="card">
    <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">

        <form wire:submit="wishlist({{ $movie }})">
            <button class="wishlist-button">
                <i class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}"></i>
            </button>
        </form>
        <img src="{{ $movie['poster_path'] }}" alt="">
        <div class="content">
            <h3>{{ $movie['title'] }}</h3>
            <p>
                @foreach (json_decode($movie['genre_ids'] ) as $genre)
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
                    {{ $movie['vote_average'] }}
                    | {{ $movie['release_date'] }}
                </span> 
            </h6>
        </div>
    </a>
</div>


