{{-- {{ dd($trending) }} --}}
<div id="exampleSlider1" style="position: relative;  overflow:hidden;">
    <div class=" MS-content" style="  white-space: nowrap;  overflow:hidden; ">


        @foreach ($trending as $movie)
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
    {{-- <div class="MS-controls">

        <button class="MS-left arrow-left"> <i class="fas fa-chevron-left  "></i></button>
        <button class=" MS-right arrow-right"><i class="fas fa-chevron-right "></i></button>
    </div> --}}
</div>





