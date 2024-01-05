<div class="movie-list-item item">

    <img src="{{ $movie['poster_path'] }}" alt="poster" class="movie-list-item-img">

    <span class="movie-list-item-detail transparent">
        @if ($movie['media_type'] == 'movie')
            <h4>{{ $movie['title'] }}</h4>
        @else
            <h4>{{ $movie['name'] }}</h4>
        @endif

        <h6><span>IMDB</span><i style="margin: 3px; color:yellow" class='fa fa-star'></i>{{ $movie['vote_average'] }} |
            
        @if ($movie['media_type'] == 'movie')
            {{ $movie['release_date'] }} </h6>
        @else
            {{ $movie['first_air_date'] }} </h6>
        @endif

        <p>
            {{ $movie['overview'] }}
        </p>

    </span>
    @if ($movie['media_type'] == 'movie')
    <a href="{{ route('movie.show', ['slug'=>$movie['slug'], 'id'=>$movie['id']]) }}" class="movie-list-item-button">Watch</a>  
    @else
    <a href="{{ route('tv.show', ['slug'=>$movie['slug'], 'id'=>$movie['id']]) }}" class="movie-list-item-button">Watch</a>
    @endif
   
</div>
