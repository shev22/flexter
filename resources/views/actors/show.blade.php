




<x-app-layout>
    {{-- {{ dd($knownForMovies) }} --}}
        <div class="container  {{ session('nightmode') ? 'active' : '' }}">
            <div class="content-container " style="padding-top: 50px; ">
    
    
                <div class="actor-card">
    
                <div class="card">
                    <div class="card_left">
    
                        <img src="{{ $actor['profile_path'] }}" alt="">
                    </div>
                    <div class="card_right auth {{ session('nightmode') ? 'active' : '' }}">
                        <h1>{{ $actor['name'] }}</h1>
                        <div class="card_right__details">
                            <ul>
                                <li>{{ $actor['birthday'] }}</li>
                                <li>{{ $actor['age'] }} years old</li>
                                <li> {{ $actor['place_of_birth'] }}</li>
                            </ul>
    
                            <div class="card_right__review auth {{ session('nightmode') ? 'active' : '' }}">
                                <p> {{ $actor['biography'] }}</p>
    
    
                            </div>
                            <div class="card_right__button">
                           
                                @if ($social['facebook'])
                                <a href="{{ $social['facebook'] }}" title="Twitter" style="margin-right:5px; text-decoration:none">
                                <svg style="color: rgb(7, 130, 192); size:10px" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" fill="#0782c0"></path></svg>
                            </a>
                                @endif
                                @if ($social['instagram'])
                                <a href="{{ $social['instagram'] }}" title="Twitter" style="margin-right:5px;text-decoration:none">
                                <svg style="color: rgb(149, 18, 4);" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" fill="#951204"></path></svg>
                            </a>
                                @endif
                                @if ($social['twitter'])
                                <a href="{{ $social['twitter'] }}" title="Twitter" style="margin-right:5px;text-decoration:none">
                            
                                    <svg style="color: rgb(130, 214, 242);" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" fill="#82d6f2"></path></svg>
                                </a>
                                @endif 
    
                        </div> 
                        </div>
                    </div>
                </div>
    
                <div class="card credits" style="margin-top: 5%; height:auto">
                    <h3 style="padding: 10px ; margin-left: 45%" class="{{ session('nightmode') ? 'active' : '' }}" >CREDITS</h3>
                    <ul>
                        @foreach ($credits as $credit)
                        <li>     {{ $credit['release_year'] }} &middot;
                            <strong><a href="{{ $credit['linkToPage'] }}"
                                    class="hover:underline">{{ $credit['title'] }}</a></strong>
                            as {{ $credit['character'] }}
                        </li>
                        @endforeach
                    </ul>
                </div> 
    
                </div>
    
    
    
    
    
        
                  
    
           
                                    <div class="movie-container movie-view">
                                        {{-- <h3  style="padding-left:50%: " class="{{ session('nightmode') ? 'active' : '' }}">KNOWN FOR</h3> --}}
                                    
                                        <section class="main-section">
                                        
                                            @foreach ($knownForMovies as $movie)
                                            <div class="card">
                                                <a href="{{ $movie['linkToPage'] }}">
                                                    {{-- {{ dd($movie['genre_ids']) }} --}}
                                                 
                                                    <img src="{{ $movie['poster_path'] }}" alt="">
                                                    <div class="content">
                                                        <h3>{{ $movie['title'] }}</h3>
                                                        <p>
                                                            @foreach ((($movie['genre_ids'] )) as $genre)
                                                                {{  $genres->get($genre) }}
                                                        
                                                            @endforeach
                                                        </p>
                                                        <h6>
                                                            <span
                                                                style="	color: #000;
                                                                font-weight:bold;
                                                                font-size:10px;
                                                            background: yellow;
                                                            padding: 0.5px 1px;
                                                            border-radius: 2.5px;">IMDB</span>
                                                            <i class='fa fa-star'></i><span>{{ $movie['vote_average'] }}</span> | {{ \Carbon\Carbon::parse($movie['release_date'] )->format('M, Y') }} 
                                                        </h6>
                                                    </div>
                                                </a>
                                            </div>
                                            
                                            
                                            @endforeach
                                       
                                        </section>                             
                                    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            </div>
        </div>
    
    
    
    
    </x-app-layout>
    
    
    