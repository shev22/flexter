


<div class="card" style="height: 250px; width:200px">
    <a href="{{ route($movie['route'], $movie['id']) }}">
        <img src="{{ $movie['poster_path'] }}" alt="">
        {{-- <div class="content">
            <h3>{{ $movie['title'] }}</h3>
            <strong>
                <p> {{ ucfirst($movie['media_type']) }}</p>
            </strong>
            <h6><span>IMDB</span><i class='fa fa-star'></i>{{ $movie['vote_average'] }} | {{ $movie['release_date'] }}
            </h6>
        </div> --}}
    </a>
</div>
