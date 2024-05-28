<x-app-layout>
    <div style="padding-top: 1px; ">

        <x-iframe-player :id="$movie['id']" :media="$movie['media']" />

        <div class="movie_card" id="tomb">
            <div class="info_section">
                <div class="movie_header">
                    <img class="locandina" src="{{ $movie['poster_path'] }}" />
                    <h1>{{ $movie['title'] }}</h1>
                    <h4> {{ $movie['release_date'] }} |

                        <span
                            style="color: #000;
                                    font-weight:bold;
                                    font-size:10px;
                                    background: yellow;
                                    padding: 0.5px 1px;
                                    border-radius: 2.5px;">
                            IMDB
                        </span>


                        <i style="margin: 3px; color:yellow; font-size: 12px" class='fa fa-star'>
                        </i>{{ $movie['vote_average'] }}




                    </h4>
                    <span class="minutes">{{ $movie['runtime'] }} min</span>
                    <span class="stream">Watch Now</span>
                    <p class="type">{{ $movie['genres'] }}</p>

                </div>
                <div class="movie_desc">
                    <p class="text">
                        {{ $movie['overview'] }}
                    </p>
                </div>
                <div class="movie_social">

                    <p><span style="color: #86a7b7;text-decoration:underline">Casts</span><br> {{ $movie['cast'] }}
                    </p>
                </div>
            </div>

            @if ($movie['videos']['results'])
                <div class="blur_back">



                    <iframe
                        src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}?autoplay=1&mute=1&loop=1&playlist={{ $movie['videos']['results'][0]['key'] }}"
                        frameborder="0"
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

        <div class="comment-similar">

            <div class="movie-comment-container" style="padding: 10px">
                <h3 class="movie-list-title {{ session('nightmode') ? 'active' : '' }}" style="padding:10px">MOVIE
                    COMMENTS
                    <i class='fa fa-comment'></i>
                </h3>
                <div id="disqus_thread" style="color:white"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                    var disqus_config = function() {
                        this.page.url = ' {{ Request::url() }}'; // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier =
                            {{ $movie['id'] }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };

                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://flexter.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>

            </div>

            <div class="recently-updated" style="width: 25%">
                <h3 class="movie-list-title {{ session('nightmode') ? 'active' : '' }}" style="padding: 10px">
                    SIMILAR MOVIES
                    <i class='fa fa-film'></i>

                </h3>
                <div class="wrapper">
                    <ul>
                        @foreach ($related as $key => $movie)
                            <li class="search-results-item">
                                <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                                    <img src="{{ $movie['poster_path'] }}" alt="poster">
                                    <span style="margin-left: 22px">
                                        <div>
                                            <h4 class="auth {{ session('nightmode') ? 'active' : '' }}">
                                                {{ $movie['title'] }}

                                            </h4>
                                        </div>
                                        <div>
                                            <ul class="search-detail" style="font-size: 12px">
                                                <li>
                                                    IMDB
                                                    <i style="color: rgb(218, 218, 7) ; margin: 2px; font-size:11px;"
                                                        class='fa fa-star'></i>
                                                    <span>{{ $movie['vote_average'] }}</span>
                                                </li>

                                                <li>
                                                    {{ $movie['release_date'] }}
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

            <div class="movie-list-container recently-updated-moblie" style=" margin-top:50px">
                <h3 class="movie-list-title  {{ session('nightmode') ? 'active' : '' }}" style="padding:5px;">
                    SIMILAR MOVIES
                    <i class='fa fa-film'></i>
                </h3>
                <div class="movie-list ">
                    @foreach ($related as $movie)
                        <div class="movie-list-item item">
                            <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">

                                <img src="{{ $movie['poster_path'] }}" alt="poster" class="movie-list-item-img">


                                <div class="movie-list-item-detail ">
                                    <h4>{{ $movie['title'] }}</h4>
                                    <p><span
                                            style="color: #000;
                                        font-weight:bold;
                                        font-size:10px;
                                        background: yellow;
                                        padding: 0.5px 1px;
                                        border-radius: 2.5px;">IMDB</span>
                                        <i style="margin: 3px; color:yellow" class='fa fa-star'>
                                        </i>{{ $movie['vote_average'] }}
                                        |
                                        {{ $movie['release_date'] }}
                                    </p>

                                    <small>{{ $movie['overview'] }}</small>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>


    </div>

</x-app-layout>

{{-- @if (request()->routeIs('movie.show'))
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
        --}}
