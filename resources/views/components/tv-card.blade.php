


    <div class="card">
        <a href="{{ route('tv.show', $tvshow['id']) }}">
        <img src="{{ $tvshow['poster_path'] }}" alt="">
        <div class="content">
            <h3>{{ $tvshow['name'] }}</h3>
            <p> {{ $tvshow['genres'] }}</p>
            <h6><span>IMDB</span><i class='fa fa-star'></i>{{ $tvshow['vote_average'] }} | {{ $tvshow['first_air_date'] }}
            </h6>

        </div>
    </a>
    </div>
