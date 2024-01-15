<x-app-layout>
    <div class="container ">
        <div class="content-container">

            {{-- <img src="img/logo/logo-3.png" alt="" width="150px"> --}}

            <div id="exampleSlider1" style="position: relative;  overflow:hidden;">
                <div class=" MS-content" style="  white-space: nowrap;  overflow:hidden; ">


                    @foreach ($trending_movies as $movie)
                        <div class="featured-content item"
                            style="background: linear-gradient(to bottom, rgba(0,0,0,0), #0f0f0f), url('https://image.tmdb.org/t/p/w1280/{{ $movie['backdrop_path'] }}');  background-size: cover;  display: inline-block;  position: relative;  overflow: hidden;  white-space: normal;   width: 100%;   ">



                            @if ($movie['logo'] == false)
                                <h1 class="featured-title"> {{ $movie['title'] }}</h1>
                            @else
                                <img class="featured-title" src="https://image.tmdb.org/t/p/w500//{{ $movie['logo'] }}"
                                    alt="">
                            @endif




                            <p class="featured-desc"> {{ $movie['overview'] }}</p>

                            <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}"
                                class="featured-button">WATCH</a>
                        </div>
                    @endforeach
                </div>
                <div class="MS-controls">

                    <button class="MS-left arrow-left"> <i class="fas fa-chevron-left  "></i></button>
                    <button class=" MS-right arrow-right"><i class="fas fa-chevron-right "></i></button>
                </div>
            </div>



            <div class="movie-list-container" style="margin-top: 20px; " id="exampleSlider">
                <h2 class="movie-list-title">TRENDING MOVIES</h2>
                <div class="movie-list-wrapper">
                    <div class="movie-list MS-content">
                        @foreach ($nowPlayingMovies as $movie)
                            <x-home-card :movie="$movie" />
                        @endforeach
                    </div>
                    {{-- <div class="MS-controls">

                        <button class="MS-left arrow-left"> <i class="fas fa-chevron-left  "></i></button>
                        <button class=" MS-right arrow-right"><i class="fas fa-chevron-right "></i></button>
                    </div> --}}
                </div>
            </div>


            {{-- <div class="movie-list-container" id="exampleSlider2">
                <h2 class="movie-list-title">TRENDING SHOWS </h2>
                <div class="movie-list-wrapper">

                    <div class="movie-list  MS-content">
                        @foreach ($trending_tv as $movie)
                            <x-home-card :movie="$movie" />
                        @endforeach
                    </div>

                    <div class="MS-controls">

                        <button class="MS-left arrow-left"> <i class="fas fa-chevron-left  "></i></button>
                        <button class=" MS-right arrow-right"><i class="fas fa-chevron-right "></i></button>
                    </div>
                </div>
            </div> --}}

            <div id="exampleSlider3" style="position: relative;  overflow:hidden;">

                <h2 style="margin:20px 0 20px 5px">TV SHOWS</h2>

                <div class=" MS-content" style="  white-space: nowrap;  overflow:hidden; ">


                    @foreach ($trending_tv as $tv)
                        <div class="featured-content item"
                            style="background: linear-gradient(to bottom, rgba(0,0,0,0), #0f0f0f), url('https://image.tmdb.org/t/p/w1280/{{ $tv['backdrop_path'] }}');  background-size: cover;  display: inline-block;  position: relative;  overflow: hidden;  white-space: normal;   width: 100%;   ">



                            @if ($tv['logo'] == false)
                                <h1 class="featured-title"> {{ $tv['name'] }}</h1>
                            @else
                                <img class="featured-title" src="https://image.tmdb.org/t/p/w500//{{ $tv['logo'] }}"
                                    alt="">
                            @endif




                            <p class="featured-desc"> {{ $tv['overview'] }}</p>

                            <a href="{{ route('tv.show', ['slug' => $tv['slug'], 'id' => $tv['id']]) }}"
                                class="featured-button">WATCH</a>
                        </div>
                    @endforeach
                </div>
            </div>








            <div class="movie-list-container" id="exampleSlider4">
                <h2 class="movie-list-title">TRENDING SHOWS </h2>
                <div class="movie-list-wrapper">

                    <div class="movie-list  MS-content">
                        @foreach ($topRatedTv as $movie)
                            <x-home-card :movie="$movie" />
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
@if (request()->routeIs('/'))
    <script>
        $('#exampleSlider').multislider({
            duration: 10000,
            continuous: true
        });


        $('#exampleSlider2').multislider({
            interval: 6000,
            slideAll: true
        });

        $('#exampleSlider1').multislider({

            interval: 7000,
            slideAll: true
        });

        $('#exampleSlider4').multislider({
            interval: 6000,
            slideAll: true
        });

        $('#exampleSlider3').multislider({

            interval: 7000,
            slideAll: true
        });
    </script>
@endif
