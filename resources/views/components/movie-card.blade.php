<div class="card">
    <a href="{{ route('movie.show', $movie['id']) }}">
        <img src="{{ $movie['poster_path'] }}" alt="">
        <div class="content">
            <h3>{{ $movie['title'] }}</h3>
            <p> {{ $movie['genres'] }}</p>
            <h6><span>IMDB</span><i class='fa fa-star'></i>{{ $movie['vote_average'] }} | {{ $movie['release_date'] }}
            </h6>
        </div>
    </a>
</div>
