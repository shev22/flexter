<div>

 <div class="filter-panel">

    <span class="section-nav" style="width:115px">
        <h3 style="display: inline" class="browse-movie-list">Toprated
        </h3>
     <i wire:loading class="fa fa-spinner fa-pulse fa-fw  " ></i>
    </span>

    <div class="" style="display: flex">

        <button wire:click="filterByPopularity" @class(['active-filter' => $this->popularity])>
            Popularity
        </button>

        <button wire:click="filterByLatest" @class(['active-filter' => $this->latest])>
            Recently Added

        </button>
        <span style="margin-left:10px">
            <button wire:click="updateShowmovies"
                class="{{ $this->showmovies ? 'active-filter' : '' }}" style="margin-right: 0px">Movies</button>
            <button wire:click="updateShowtv" class="{{ $this->showtv ? 'active-filter' : '' }}" style="margin-left: 0px">Series</button>
        </span>

    </div>


    <div class="checkbox-filter" style="display: flex; ">

        <div class="genre-wrapper">
            <button class="genre-filter {{ $this->sortByGenre ? 'active-filter' : '' }}">
                Genre
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-genre" wire:ignore.self>
                <ul>
                    @foreach ($this->genres() ?? [] as $key => $genre)
                        <li>



                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $key }}" wire:model.live="sortByGenre" />
                                <label for="genre{{ $key }}">{{ $genre }}</label>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="year-wrapper">
            <button class="year-filter {{ $this->sortByYears ? 'active-filter' : '' }}">
                Year
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-year" wire:ignore.self>
                <ul>
                    @for ($i = (int) date('Y'); $i >= 1990; $i--)
                        <li>

                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="year{{ $i }}"
                                    value="{{ $i }}" wire:model.live="sortByYears" />
                                <label for="year{{ $i }}">{{ $i }}</label>
                            </div>

                        </li>
                    @endfor

                    <li>

                        <div class="checkbox-wrapper-47">
                            <input type="checkbox" name="cb" id="year-earlier" value="earlier"
                                wire:model.live="earlier" />
                            <label for="year-earlier">Earlier</label>
                        </div>

                    </li>
                </ul>
            </div>
        </div>


        <div class="year-wrapper">
            <button class="language-filter {{ $this->language ? 'active-filter' : '' }}">
                Language
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-language" wire:ignore.self>
                <ul>
                    @foreach ($this->languages() ?? [] as $key => $value)
                        <li>
            

                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $value['iso_639_1'] }}" wire:model.live="language" />
                                <label for="genre{{ $key }}"> {{ $value['english_name'] }}</label>
                            </div>


                        </li>
                    @endforeach

                </ul>
            </div>
        </div>


        <div class="rating-wrapper" style="">
            <button class="rating-filter {{ $this->sortByImdb ? 'active-filter' : '' }}">
                Sort by IMDB Rating
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-rating radio-filter" wire:ignore.self>
                <ul>

                    <li>


                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="acending" value="acending"
                                wire:model.live="sortByImdb" />
                            <label for="acending">Accending order</label>
                        </div>



                    </li>

                    <li>
          
                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="decending" value="decending"
                                wire:model.live="sortByImdb" />
                            <label for="decending">Decending order</label>
                        </div>
                    </li>
                    <li>
                      
                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="normal" value="normal"
                                wire:model.live="sortByImdb" />
                            <label for="normal">Original order</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>





<div class=" filter-panel-mobile" wire:ignore>

    <div class="header">
        <div  style="width: 115px">
             <h3 style="display: inline">Toprated </h3>
             <i wire:loading class="fa fa-spinner fa-pulse fa-fw  " ></i>
        </div>
       
        <span >
            <button wire:click="updateShowmovies"
                class="{{ $this->showmovies ? 'active-filter' : '' }}" >Movies</button>
            <button wire:click="updateShowtv" class="{{ $this->showtv ? 'active-filter' : '' }}">Series</button>
        </span>


        <h3 class="show-filter">
            <i class='fa fa-filter'></i>
        </h3>
    </div>


    <div class="content" id="filter-content">

        <button wire:click="filterByPopularity" @class(['active-filter' => $this->popularity])>
            Popularity
        </button>


        <button wire:click="filterByLatest" @class(['active-filter' => $this->latest])>
            Recently updated

        </button>


        <span class="genre-wrapper">



            <button class="genre-filter {{ $this->sortByGenre ? 'active-filter' : '' }}">
                Genre
                <i class="fas fa-caret-down"></i>
            </button>


            <div class="filter-content-genre" wire:ignore.self>
                <ul>
                    @foreach ($this->genres() ?? [] as $key => $genre)
                        <li>


                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $key }}" wire:model.live="sortByGenre" />
                                <label for="genre{{ $key }}">{{ $genre }}</label>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        </span>

        <span class="year-wrapper">
            <button class="year-filter {{ $this->sortByYears ? 'active-filter' : '' }}">
                Year
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-year" wire:ignore.self>
                <ul>
                    @for ($i = (int) date('Y'); $i >= 1990; $i--)
                        <li>


                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="year{{ $i }}"
                                    value="{{ $i }}" wire:model.live="sortByYears" />
                                <label for="year{{ $i }}">{{ $i }}</label>
                            </div>
                        </li>
                    @endfor

                    <li>

                        <div class="checkbox-wrapper-47">
                            <input type="checkbox" name="cb" id="year-earlier" value="earlier"
                                wire:model.live="earlier" />
                            <label for="year-earlier">Earlier</label>
                        </div>
                    </li>
                </ul>
            </div>
        </span>
        <span class="year-wrapper">
            <button class="language-filter {{ $this->language ? 'active-filter' : '' }}">
                Language
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-language" wire:ignore.self>
                <ul>
                    @foreach ($this->languages() ?? [] as $key => $value)
                        <li>

                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $value['iso_639_1'] }}" wire:model.live="language" />
                                <label for="genre{{ $key }}"> {{ $value['english_name'] }}</label>
                            </div>

                        </li>
                    @endforeach

                </ul>
            </div>
        </span>


        <span class="rating-wrapper" style="">
            <button class="rating-filter {{ $this->sortByImdb ? 'active-filter' : '' }}">
                IMDB
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-rating radio-filter" wire:ignore.self>
                <ul>

                    <li>


                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="acending" value="acending"
                                wire:model.live="sortByImdb" />
                            <label for="acending">Accending order</label>
                        </div>



                    </li>

                    <li>

                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="decending" value="decending"
                                wire:model.live="sortByImdb" />
                            <label for="decending">Decending order</label>
                        </div>
                    </li>

                    <div class="checkbox-wrapper-48">
                        <input type="radio" name="imdb" id="normal" value="normal"
                            wire:model.live="sortByImdb" />
                        <label for="normal">Original order</label>
                    </div>
                    </li>

                </ul>
            </div>
    </div>


    </span>



</div>


    <div class="movie-container movie-view" >
        <section class="main-section">
            @foreach ($movies as $movie)
                <div class="card">


                    @if ($movie['media_type'] == 'movie')
                        <a href="{{ route('movie.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                        @else
                            <a href="{{ route('tv.show', ['slug' => $movie['slug'], 'id' => $movie['id']]) }}">
                    @endif


                    <form wire:submit="wishlist({{ $movie }})">
                        <button class="wishlist-button">
                            <i
                                class="wishlist  fas fa-bookmark {{ $this->isWishListed($movie['id']) ? 'wishlisted' : '' }}"></i>
                        </button>
                    </form>
                    <img src="{{ $movie['poster_path'] }}" alt="">
                    <div class="content">
                        <h3>{{ $movie['title'] }}</h3>
                        <p>
                            @foreach (json_decode($movie['genre_ids']) as $genre)
                                {{ $this->genres()->get($genre) }}
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
                            <i class='fa fa-star'></i><span>{{ $movie['vote_average'] }}</span> |
                            {{ $movie['release_date'] }}
                        </h6>
                    </div>
                    </a>
                </div>
            @endforeach
            <div x-data="{
                observe() {
                    const observer = new IntersectionObserver((popularMovies) => {
                        popularMovies.forEach(movie => {
                            if (movie.isIntersecting) {
                                @this.loadMore()
                            }
                        })
                    })
            
                    observer.observe(this.$el)
                }
            }" x-init="observe" wire:ignore>

            </div>
        </section>
        <i wire:loading class="fa fa-spinner fa-pulse fa-fw movies-spinner "></i>

    </div>

</div>
