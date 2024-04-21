<x-app-layout>
    {{-- {{ dd($tvshow['images'][0]) }} --}}
 <div class="container {{ session('nightmode') ? 'active' : '' }}">
        <div class="content-container" style="padding-top: 50px; ">
            <x-iframe-player :id="$tvshow['id']" :media="$tvshow['media']" />
          
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
  
        <a class="stream">
            <i class="pulse fa fa-play-circle" ></i>
        </a>
        
            @if ($tvshow['videos']['results'])
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

 
      

      <div style="display: flex; margin-top:5px; padding:10px;" >
    
        <div class="movie-comment-container" style="padding: 10px">
            <h3 class="movie-list-title {{ session('nightmode') ? 'active' : '' }}" style="padding:10px">MOVIE COMMENTS
                <i class='fa fa-comment'></i>
            </h3>





      

            <div id="disqus_thread" style="color:white"></div>
            <script>
                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
            
                var disqus_config = function () {
                this.page.url =' {{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = {{$tvshow['id']  }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
             
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://flexter.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            </script>

        </div>

        <div class="recently-updated" >
            <h3 class="movie-list-title {{ session('nightmode') ? 'active' : '' }}" style="padding: 10px">
                RELATED MOVIES


                <i class='fa fa-film'></i>

            </h3>
            <div class="wrapper">
                <ul>
                    @foreach ($related as $key => $tv)
                        <li class="search-results-item" >
                            <a href="{{ route('tv.show', ['slug' => $tv['slug'], 'id' => $tv['id']]) }}">
                                <img src="{{ $tv['poster_path'] }}" alt="poster">
                                <span style="margin-left: 22px">
                                    <div>
                                        <h4 class="auth {{ session('nightmode') ? 'active' : '' }}">
                                            {{ $tv['name'] }}

                                        </h4>
                                    </div>
                                    <div>
                                        <ul class="search-detail" style="font-size: 12px">
                                            <li>
                                                IMDB
                                                <i style="color: rgb(218, 218, 7) ; margin: 2px; font-size:11px;"
                                                    class='fa fa-star'></i>
                                                <span>{{ $tv['vote_average'] }}</span>
                                            </li>

                                            <li>
                                                {{ $tv['release_date'] }}
                                            </li>
                                        </ul>
                                    </div>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
@include('layouts.footer')












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
