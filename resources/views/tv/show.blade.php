<x-app-layout>
    {{-- {{ dd($tvshow['images'][0]) }} --}}
 <div class="container">
        <div class="content-container" style="padding-top: 50px; ">
            <x-iframe-player :id="$tvshow['id']" :media="$tvshow['media']" />
            {{-- <div class="movie_card" id="tomb">
                <div class="info_section">
                    <div class="movie_header">
                        <img class="locandina" src="{{ $tvshow['poster_path'] }}" />
                        <h1>{{ $tvshow['name'] }}</h1>
                        <h5>{{ $tvshow['first_air_date'] }} | <span style="color: white; margin-left:1px">IMDB</span><i
                                style="color: yellow; margin:3px" class='fa fa-star'></i><span
                                style="color: white">{{ $tvshow['vote_average'] }}</span></h5>

                        <span class="minutes">{{ count($tvshow['seasons']) }} seasons</span>
                        <p class="type"> {{ $tvshow['genres'] }}</p>

                        <h4 style="">Cast</h4>
                        <p>

                            {{ $tvshow['cast'] }}

                        </p>
                    </div>

                    <a class="stream">

                        <span class="play">
                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                        </span>

                    </a>
                    <div class="movie_desc">
                        <p class="text">
                            {{ $tvshow['overview'] }}

                        </p>
                    </div>

                    <div id="movie-show-media">
                        <div class="MS-content">


                            @foreach ($tvshow['images'] as $image)
                                <div class=" item">
                                    <img class=""
                                        src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}"
                                        alt="">
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>

                @if ($tvshow['videos']['results'])
                    <div class="blur_back">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}?autoplay=1&mute=1&loop=1&playlist={{ $tvshow['videos']['results'][0]['key'] }}"
                            title="They discovered an actual Death Loop" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    @if ($tvshow['images'])
                        <div class="blur_back"
                            style="background: url('https://image.tmdb.org/t/p/w500/{{ $tvshow['images'][0]['file_path'] }}'); background-size:cover ;">
                        </div>
                    @else
                        <div class="blur_back"
                            style="background: url('https://image.tmdb.org/t/p/w500/{{ $tvshow['poster_path'] }}'); background-size:cover ;">
                        </div>
                    @endif
                @endif
            </div>

            <div class="movie-list-container" style="margin-top: 20px;">
                <h1 class="movie-list-title">SIMILAR SHOWS</h1>
                <div class="movie-list-wrapper" id="exampleSlider2">
                    <div class="movie-list MS-content">
                        @foreach ($related as $tv)
                            <a href="{{ route('movie.show', ['slug' => $tv['slug'], 'id' => $tv['id']]) }}" class="item">
                                <div class="movie-list-item item">

                                    <img src="{{ $tv['poster_path'] }}" alt="poster" class="movie-list-item-img">
                                    <span class="movie-list-item-detail transparent">
                                        <h4 style="color: white">{{ $tv['name'] }}</h4>
                                        <h6 style="color: white"><span>IMDB</span><i style="margin: 3px; color:yellow"
                                                class='fa fa-star'></i>{{ $tv['vote_average'] }} |
                                            {{ $tv['release_date'] }} </h6>
                                        <p>
                                            {{ $tv['overview'] }}
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
        </div>
    </div>  --}}

   <div class="movie_card" id="tomb" style="margin: ">
        <div class="info_section">
          <div class="movie_header">
            
            <img class="locandina" src="{{ $tvshow['poster_path'] }}" />
           
            <h1>{{ $tvshow['name'] }}</h1>


            <h5>
                {{ $tvshow['first_air_date'] }} | 
                <span>IMDB</span>
                <i class='fa fa-star'></i>
                <span class="vote_average" >
                    {{ $tvshow['vote_average'] }}
                </span>
            </h5>


            <span class="minutes">{{ count($tvshow['seasons']) }} seasons</span>
            <p class="type"> {{ $tvshow['genres'] }}</p>


             <span class="cast">  
            <h4 style="">Cast</h4>
            <p> {{ $tvshow['cast'] }}</p>
           </span>
          </div>


          
          <div class="movie_desc">
            <h5>Overview</h5>
            <p class="text">
                {{ $tvshow['overview'] }}
            </p>
          </div>

          <div id="movie-show-media">
            <div class="MS-content">
                @foreach ($tvshow['images'] as $image)
                    <div class=" item">
                        <img class=""
                            src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}"
                            alt="">
                    </div>
                @endforeach
            </div>
        </div>
        </div>
  
        
            @if ($tvshow['videos']['results'])
            <a class="stream">


                <i class="pulse fa fa-play-circle" ></i>
            </a>

            <div class="blur_back">
                
                 <div class="iframe-wapper">
                   
                <iframe
                    src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}?autoplay=1&mute=1&loop=1&playlist={{ $tvshow['videos']['results'][0]['key'] }}"
                   frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
                
      
                     </div>  

            </div>
        @else
            @if ($tvshow['images'])
                <div class="blur_back"
                    style="background: url('https://image.tmdb.org/t/p/w500/{{ $tvshow['images'][0]['file_path'] }}'); background-size:cover ;">
                </div>
            @else
                <div class="blur_back"
                    style="background: url('https://image.tmdb.org/t/p/w500/{{ $tvshow['poster_path'] }}'); background-size:cover ;">
                </div>
            @endif
        @endif
      </div>

 
      

    <div class="similar-movies" id="exampleSlider2">
       
        <div class="movie-list-wrapper">
            <h3 class="movie-list-title">SIMILAR MOVIES</h3>
            <div class="movie-list MS-content">
                @foreach ($related as $tvshow)
                    <a  href="{{ route('tv.show', ['slug'=>$tvshow['slug'], 'id'=>$tvshow['id']]) }}" class="item">
                        <div class="movie-list-item ">
                            <img src="{{ $tvshow['poster_path'] }}" alt="poster" class="movie-list-item-img">
                            <span class="movie-list-item-detail transparent">
                                <h4 style="color: white">{{ $tvshow['name'] }}</h4>
                                <h6 style="color: white"><span>IMDB</span><i style="margin: 3px; color:yellow"
                                        class='fa fa-star'></i>{{ $tvshow['vote_average'] }} |
                                    {{ $tvshow['release_date'] }} </h6>
                                <p>
                                    {{ $tvshow['overview'] }}
                                </p>
                            </span>

                        </div>
                    </a>
                @endforeach

            </div>
            <div class="MS-controls">

                <button class="MS-left arrow-left"> <i class="fas fa-chevron-left  "></i></button>
                <button class=" MS-right arrow-right"><i class="fas fa-chevron-right "></i></button>
            </div>
        </div>
    </div>
</div>
</div>













</x-app-layout>
@if (request()->routeIs('tv.show'))
    <script>
        $('#exampleSlider2').multislider({
            interval: 4000,
            slideAll: true
        });
        $('#movie-show-media ').multislider({
            duration: 10000,
            continuous: true
        });
    </script>
@endif
