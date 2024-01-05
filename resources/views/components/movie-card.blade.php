<div class="card">
    <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
        <img src="{{ $movie['poster_path'] }}" alt="">
        <div class="content">
            <h3>{{ $movie['title'] }}</h3>
            <p> {{ $movie['genres'] }}</p>
            <h6>
                <span
                    style="	color: #000;
                    font-weight:bold;
                    font-size:10px;
                background: yellow;
                padding: 1px 3px;
                border-radius: 5px;">IMDB</span><i
                    class='fa fa-star'></i>{{ $movie['vote_average'] }} | {{ $movie['release_date'] }}
            </h6>
        </div>
    </a>
</div>
