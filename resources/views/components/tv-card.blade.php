


    <div class="card">
        <a href="{{ route('tv.show', ['slug'=>$tvshow['slug'], 'id'=>$tvshow['id']]) }}">
        <img src="{{ $tvshow['poster_path'] }}" alt="">
        <div class="content">
            <h3>{{ $tvshow['name'] }}</h3>
            <p> 
                @foreach ($tvshow['genre_ids'] as $genre)
                {{ $this->genres()->get($genre) }} 
                {{-- @if (!$loop->last)
                    ,
                @endif --}}
            @endforeach
            
            
            </p>
            <h6><span>IMDB</span><i class='fa fa-star'></i>{{ $tvshow['vote_average'] }} | {{ $tvshow['first_air_date'] }}
            </h6>

        </div>
    </a>
    </div>
