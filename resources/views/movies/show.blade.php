<x-app-layout>



    <div class="container">
      
        <div class="content-container" style="padding-top: 1px; ">
        
            <x-iframe-player :id="$movie['id']" :media="$movie['media']"/>
           



            {{-- <div class="movie_card" id="tomb">
              
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


            

                    <a class="stream">
                        
                        <span class="play">
                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                        </span>  
                        
                    </a>

             
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
                         <div class="iframe-wapper">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}?autoplay=1&mute=1&loop=1&playlist={{ $movie['videos']['results'][0]['key'] }}"
                           frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                             </div>  

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
            </div> --}}

      

            <div class="movie_card" id="tomb" style="margin: ">
                <div class="info_section">
                  <div class="movie_header">
                    
                    <img class="locandina" src="{{ $movie['poster_path'] }}" />
                   
                    <h1>{{ $movie['title'] }}</h1>


                    <h5>
                        {{ $movie['release_date'] }} | 
                        <span>IMDB</span>
                        <i class='fa fa-star'></i>
                        <span class="vote_average" >
                            {{ $movie['vote_average'] }}
                        </span>
                    </h5>


                    <span class="minutes">{{$movie['runtime']}} min</span>
                    <p class="type"> {{ $movie['genres'] }}</p>


                     <span class="cast">  
                    <h4 style="">Cast</h4>
                    <p> {{ $movie['cast'] }}</p>
                   </span>
                  </div>


                  
                  <div class="movie_desc">
                    <h5>Overview</h5>
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
                    <a class="stream">

 
                        <i class="pulse fa fa-play-circle" ></i>
                    </a>

                    <div class="blur_back">
                        
                         <div class="iframe-wapper">
                           
                        <iframe
                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}?autoplay=1&mute=1&loop=1&playlist={{ $movie['videos']['results'][0]['key'] }}"
                           frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                        
              
                             </div>  

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

         
              

            <div class="similar-movies" id="exampleSlider2">
               
                <div class="movie-list-wrapper">
                    <h3 class="movie-list-title">SIMILAR MOVIES</h3>
                    <div class="movie-list MS-content">
                        @foreach ($related as $movie)
                            <a  href="{{ route('movie.show', ['slug'=>$movie['slug'], 'id'=>$movie['id']]) }}" class="item">
                                <div class="movie-list-item ">
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

                        <button class="MS-left arrow-left"> <i class="fas fa-chevron-left  "></i></button>
                        <button class=" MS-right arrow-right"><i class="fas fa-chevron-right "></i></button>
                    </div>
                </div>
            </div>




        </div>
    </div>
     

</x-app-layout>

@if (request()->routeIs('movie.show'))
    <script>
        $(document).ready(function() {

        $('#exampleSlider2').multislider({
            interval: 4000,
            slideAll: true
        });
        $('#movie-show-media ').multislider({
            duration: 10000,
            continuous: true
        });






        });
    </script>
@endif
