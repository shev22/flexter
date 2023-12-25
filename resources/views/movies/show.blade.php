<x-app-layout>
    {{-- {{ dd($movie) }} --}}
    <div class="container">
        <div class="content-container" style="padding-top: 50px; ">
            <div class="movie_card" id="tomb">
                <div class="info_section">
                    <div class="movie_header">
                        <img class="locandina" src="{{ $movie['poster_path'] }}" />
                        <h1>{{ $movie['title'] }}</h1>
                        <h5>{{ $movie['release_date'] }} | <span style="color: white; margin-left:1px">IMDB</span><i
                                style="color: yellow; margin:3px" class='fa fa-star'></i><span
                                style="color: white">{{ $movie['vote_average'] }}</span></h5>

                        <span class="minutes">{{ $movie['runtime'] }} min</span>
                        <p class="type"> {{ $movie['genres'] }}</p>

                        <h4 style="">Cast</h4>
                        <p>

                            {{ $movie['cast'] }}

                        </p>
                    </div>
                <a href="{{ route('stream', [ $movie['slug'],  $movie['imdb_id']]) }}"><span class="play"><i class="fa fa-play-circle" aria-hidden="true"></i></span> </a>   
         
                    <div class="movie_desc">
                        <p class="text">
                            {{ $movie['overview'] }}

                        </p>
                    </div>

                    <div id="movie-show-media">
                        <div class="MS-content">
                            @foreach ($movie['images'] as $image)
                                <div class=" item">
                                    <img class=""
                                        src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if ($movie['videos']['results'])

              
                       <div class="blur_back">
                        <iframe width="1100" height="700"
                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}?autoplay=1&mute=1&loop=1&playlist={{ $movie['videos']['results'][0]['key'] }}"
                            title="They discovered an actual Death Loop" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                       </iframe>
              
                
                </div>
             
                @else
                    @if ($movie['images'])
                        <div class="blur_back"
                            style="background: url('https://image.tmdb.org/t/p/w500/{{ $movie['images'][0]['file_path'] }}'); background-size:cover ;">
                        </div>
                    @else
                        <div class="blur_back"
                            style="background: url('https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}'); background-size:cover ;">
                        </div>
                    @endif
                @endif
            </div>






             <div class="movie-list-container" style="margin-top: 20px;">
                <h1 class="movie-list-title">SIMILAR MOVIES</h1>
                <div class="movie-list-wrapper" id="exampleSlider2">
                    <div class="movie-list MS-content">
                        @foreach ($related as $movie)
                            <a href="{{ route('movie.show', $movie['id']) }}">
                                <div class="movie-list-item item">
                                    <img src="{{ $movie['poster_path'] }}" alt="poster" class="movie-list-item-img">
                                    <span class="movie-list-item-detail transparent">
                                        <h4 style="color: white">{{ $movie['title'] }}</h4>
                                        <h6 style="color: white"><span>IMDB</span><i style="margin: 3px; color:yellow"
                                                class='fa fa-star'></i>{{ $movie['vote_average'] }} |
                                            {{ $movie['release_date'] }} </h6>
                                        <p>
                                            {{ $movie['overview'] }}
                                        </p>
                                    </span>

                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="MS-controls">

                        <button class="MS-left"> <i class="fas fa-chevron-left arrow-left "></i></button>
                        <button class=" MS-right"><i class="fas fa-chevron-right arrow-right"></i></button>
                    </div>
                </div>
            </div> 

            <video src="{{ asset('videos/pexels.mp4') }}" 
          ></video>

          
        </div>
    </div>

</x-app-layout>
