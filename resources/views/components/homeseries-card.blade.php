<div class="movie-list-item item">

    <img src="{{ $movie['poster_path'] }}" alt="poster" class="movie-list-item-img">

    <span class="movie-list-item-detail transparent">

            <h4>{{ $movie['name'] }}</h4>
 

        <h6><span>IMDB</span><i style="margin: 3px; color:yellow" class='fa fa-star'></i>{{ $movie['vote_average'] }} |
            
 
            {{ $movie['first_air_date'] }} </h6>

        <p>
            {{ $movie['overview'] }}
        </p>

    </span>

    <a href="{{ route('tv.show', ['slug'=>$movie['slug'], 'id'=>$movie['id']]) }}" class="movie-list-item-button">Watch</a>  

   
</div>
