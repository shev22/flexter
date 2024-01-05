<x-app-layout>


    <div class="container ">
        <div class="content-container">

            {{-- <img src="img/logo/logo-3.png" alt="" width="150px"> --}}

            <div id="exampleSlider1" style="position: relative;  overflow:hidden;">
                <div class=" MS-content" style="  white-space: nowrap;  overflow:hidden; ">


                    @foreach ($up_coming as $movie)
                        <div class="featured-content item"
                            style="background: linear-gradient(to bottom, rgba(0,0,0,0), #0f0f0f), url('https://image.tmdb.org/t/p/w1280/{{ $movie['backdrop_path'] }}');  background-size: cover;  display: inline-block;  position: relative;  overflow: hidden;  white-space: normal;   width: 100%; border_radius:15px   ">

                            {{-- <img class="featured-title" src="https://image.tmdb.org/t/p/w45"{{$movie['logo']['file_path']}} alt=""> --}}
                            {{-- <img class="featured-title"
                                src="https://image.tmdb.org/t/p/w500//qU4aOZp1fSp22ZG1wj8bnDU2ClJ.png" alt="">
                            {{-- <h1 class="featured-title"> {{ $movie['title'] }}</h1> --}}





                            
                            <p class="featured-desc"> {{ $movie['overview'] }}</p>

                            <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}"
                                class="featured-button">WATCH</a>
                        </div>
                    @endforeach
                </div>
            </div>



       <div class="movie-list-container" style="margin-top: 20px; " id="exampleSlider">
                <h2 class="movie-list-title">TRENDING MOVIES</h2>
                <div class="movie-list-wrapper">
                    <div class="movie-list MS-content">
                        @foreach ($trending_movies as $movie)
                            <x-home-card :movie="$movie" />
                        @endforeach
                    </div>

                </div>
            </div>
      {{--

            <div class="movie-list-container" id="exampleSlider2">
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

            {{-- <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-2.jpg');">
                <img class="featured-title" src="img/f-t-2.png" alt="">
                <p class="featured-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto illo dolor
                    deserunt nam assumenda ipsa eligendi dolore, ipsum id fugiat quo enim impedit, laboriosam omnis
                    minima voluptatibus incidunt. Accusamus, provident.</p>
                <button class="featured-button">WATCH</button>
            </div>
            <div class="movie-list-container">
                <h2 class="movie-list-title">NEW RELEASES</h2>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/1.jpeg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>

                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="movie-list-container">
                <h2 class="movie-list-title">NEW RELEASES</h2>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/17.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>


                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div> --}}
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
    </script>
@endif
