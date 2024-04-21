{{-- @props(['title'])

<div class="filter-panel">
    <div class="section-nav">
        <h3 class="browse-movie-list">{{ $slot }}</h3>
    </div>

    <div class="">

        <button @click="activeTab = 5" :class="{ 'active-filter': activeTab === 5 }">Show all</button>
        <button @click="activeTab = 0" :class="{ 'active-filter': activeTab === 0 }">
            Popular
        </button>


        <button @click="activeTab = 1" :class="{ 'active-filter': activeTab === 1 }">
            Now Playing
        </button>
        <button @click="activeTab = 2" :class="{ 'active-filter': activeTab === 2 }">
            Upcoming
        </button>

        <button @click="activeTab = 3" :class="{ 'active-filter': activeTab === 3 }">
            Top Rated
        </button>
        <button @click="activeTab = 4" :class="{ 'active-filter': activeTab === 4 }">
            Trending

        </button>
    </div>


    <div class="checkbox-filter" style="display: flex; ">

        <div class="genre-wrapper">
            <button class="genre-filter {{$this->sortByGenre ? 'active-filter':''  }}" style="margin-right: 2px" >
                Genre
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-genre" wire:ignore.self>
                <ul>
                    @foreach ($this->genres() as $key => $genre)
                        <li>
                            <input type="checkbox" value="{{ $key }}" wire:model.live="sortByGenre" >
                            {{ $genre }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="year-wrapper" style=" margin-right:2px">
            <button class="year-filter {{$this->sortByYears ? 'active-filter':''  }}">
                Year
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-year" wire:ignore.self>
                <ul>
                    @for ($i = (int) date('Y'); $i >= 2000; $i--)
                        <li>
                            <input type="checkbox" value="{{ $i }}" wire:model.live="sortByYears">
                            {{ $i }}
                        </li>
                    @endfor

                </ul>
            </div>
        </div>

 
            <div class="rating-wrapper" style="">
                <button class="rating-filter">
                    Sort by IMDB Rating
                    <i class="fas fa-caret-down"></i>
                </button>

                <div class="filter-content-rating radio-filter" wire:ignore.self>
                    <ul>

                        <li>
                            <input type="radio" wire:model.live="sortByAccending">
                            <label for="accending" >Accending order</label><br>
                        </li>

                        <li>
                            <input type="radio" id="original" >
                            <label for="original">Original order</label>
                        </li>

                    </ul>
                </div>
            </div>
      
    </div>
</div>
 --}}


 @props(['title'])

<div class="filter-panel">
    <div class="section-nav">
        <h3 class="browse-movie-list">{{ $slot }}</h3>
    </div>

    <div class="">

        {{-- <button @click="activeTab = 5" :class="{ 'active-filter': activeTab === 5 }">Genre</button> --}}
        <button @click="activeTab = 1" :class="{ 'active-filter': activeTab === 1 }"   wire:click="filterByPopularity">
            Popularity
        </button>



        <button @click="activeTab = 2" :class="{ 'active-filter': activeTab === 2 }">
            Country
        </button>

        {{-- <button @click="activeTab = 3" :class="{ 'active-filter': activeTab === 3 }">
            Year
        </button> --}}
        <button  @click="activeTab = 3" :class="{ 'active-filter': activeTab === 3 }" wire:click="filterByLatest">
           Recently updated

        </button>
        {{-- <button @click="activeTab = 6" :class="{ 'active-filter': activeTab === 6 }">
            Sort by IMDB Rating

        </button> --}}
        <input type="text" class="search-filter" placeholder=" search title..." wire:model.live="search" >
    </div>


    <div class="checkbox-filter" style="display: flex; ">

        <div class="genre-wrapper">
            <button class="genre-filter {{$this->sortByGenre ? 'active-filter':''  }}" style="margin-right: 2px" >
                Genre
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-genre" wire:ignore.self>
                <ul>
                    @foreach ($this->genres() as $key => $genre)
                        <li>
                            <input type="checkbox" value="{{ $key }}" wire:model.live="sortByGenre" >
                            {{ $genre }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="year-wrapper" style=" margin-right:2px">
            <button class="year-filter {{$this->sortByYears ? 'active-filter':''  }}">
                Year
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-year" wire:ignore.self>
                <ul>
                    @for ($i = (int) date('Y'); $i >= 1990; $i--)
                        <li>
                            <input type="checkbox" value="{{ $i }}" wire:model.live="sortByYears">
                            {{ $i }}
                        </li>
                    
                    @endfor
                    <li>
                        <input type="checkbox" value=" 1980's" wire:model.live="eighties">
                        1980's
                    </li>
                    <li>
                        <input type="checkbox" value=" 1970's" wire:model.live="seventies">
                        1970's
                    </li>
                    <li>
                        <input type="checkbox" value=" earlier" wire:model.live="earlier">
                        Earlier
                    </li>
                </ul>
            </div>
        </div>

       
        <div class="year-wrapper" style=" margin-right:2px">
            <button  class="language-filter {{$this->language ? 'active-filter':''  }}">
                Language 
                 <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-language" wire:ignore.self>
                <ul>
                    @foreach ( $this->languages() as $key => $value)
                    <li>
                        <input type="checkbox" value="{{ $value['iso_639_1']}}" wire:model.live="language" >
                        {{ $value['english_name'] }}
                    </li>
                @endforeach

                </ul>
            </div>
        </div>

    





     
 
            <div class="rating-wrapper" style="">
                <button class="rating-filter">
                    Sort by IMDB Rating
                    <i class="fas fa-caret-down"></i>
                </button>

                <div class="filter-content-rating radio-filter" wire:ignore.self>
                    <ul >

                        <li >
                            <input type="radio" name="imdb" value="acending" wire:model.live="sortByImdb">
                            <label for="accending" >Accending order</label><br>
                        </li>

                        <li>
                            <input type="radio" name="imdb" value="decending"  wire:model.live="sortByImdb">
                            <label for="decending">Decending order</label>
                        </li>
                        <li>
                            <input type="radio" name="imdb" value="normal"  wire:model.live="sortByImdb">
                            <label for="normal">Original order</label>
                        </li>

                    </ul>
                </div>
            </div>
      
    </div>
</div>

