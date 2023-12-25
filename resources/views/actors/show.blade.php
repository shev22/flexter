<x-app-layout>
    <div class="container actor-card">
        <div class="content-container " style="padding-top: 50px; ">
            <div class="card">
                <div class="card_left">

                    <img src="{{ $actor['profile_path'] }}" alt="">
                </div>
                <div class="card_right">
                    <h1>{{ $actor['name'] }}</h1>
                    <div class="card_right__details">
                        <ul>
                            <li>{{ $actor['birthday'] }}</li>
                            <li>{{ $actor['age'] }} years old</li>
                            <li> {{ $actor['place_of_birth'] }}</li>
                        </ul>

                        <div class="card_right__review">
                            <p> {{ $actor['biography'] }}</p>


                        </div>
                        {{-- <div class="card_right__button">
                            <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 512 512">
                                <path
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                            </svg>
                            @if ($social['facebook'])
                            <i class='fa fa-facebook-square' ></i>
                            @endif
                            @if ($social['instagram'])
                            <i class='fa fa-instagram'></i>
                            @endif
                            @if ($social['twitter'])
                            <a href="{{ $social['twitter'] }}" title="Twitter">
                        
                                <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 512 512">
                                    <path
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                </svg>
                            </a>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="card credits" style="margin-top: 5%; height:auto">
                <h3 style="padding: 10px">CREDITS</h3>
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



            <div class="movie-list-container" style="margin:60px 50px 0 50px;">
                <h3 class="font-bold text-xl credits">KNOWN FOR</h3>

                <div class="movie-list-wrapper" id="exampleSlider2" style="width:100%">
                    <div class="movie-list MS-content">
                        @foreach ($knownForMovies as $movie)
                            <div class="movie-list-item item">

                                <img src="{{ $movie['poster_path'] }}" alt="poster"
                                 >

                                <span class="movie-list-item-detail transparent">

                                    <h4>{{ $movie['title'] }}</h4>

                                </span>

                                <a href="{{ $movie['linkToPage'] }}" class="movie-list-item-button">Watch</a>


                            </div>
                        @endforeach
                    </div>

                    <div class="MS-controls">
                        
                        <a class="MS-left"> <i class="fas fa-chevron-left arrow-left "></i></a>
                        <a class=" MS-right"><i class="fas fa-chevron-right arrow-right"></i></a>
                    </div>

                </div>
            </div>






















        </div>
    </div>




</x-app-layout>
