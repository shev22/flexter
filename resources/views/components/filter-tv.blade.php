<div class="filter-container">


    <div class="section-nav">
        <h3 class="browse-movie-list">{{ $slot }}</h3>
    </div>

    <div class="movie-lists">

        <button @click="activeTab = 0" :class="{ 'active-filter': activeTab === 0 }">
            Airing Today
        </button>


        <button @click="activeTab = 1" :class="{ 'active-filter': activeTab === 1 }">
            Popular
        </button>
        <button @click="activeTab = 2" :class="{ 'active-filter': activeTab === 2 }">
            Top Rated
        </button>
        {{-- <button @click="activeTab = 3" :class="{ 'active-filter': activeTab === 3 }">
            Trending

        </button> --}}
        <button @click="activeTab = 4" :class="{ 'active-filter': activeTab === 4 }">
           On Air
        </button>

    </div>


    <div class="filter" style="display: flex; margin-right:100px">

        <div class="genre-wrapper">
            <button class="genre-filter" style="margin-right: 2px">
                Genre
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-genre" wire:ignore.self>
                <ul>
                    @foreach ($this->genres() as $key => $genre)
                        <li>
                            <input type="checkbox" value="{{ $key }}" wire:model.live="sortByGenre">
                            {{ $genre }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>



        <div class="year-wrapper" style=" margin-right:2px">
            <button class="year-filter">
                Year
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-year" wire:ignore.self>
                <ul>
                    @for ($i = (int) date('Y'); $i >= 2000; $i--)
                        <li>
                            <input type="checkbox" value="{{ $i }}" wire:model.live="twothousands">
                            {{ $i }}
                        </li>
                    @endfor
                    {{-- <li>
                        <input type="checkbox" wire:model.live="nineties">
                        1990s
                    </li>

                    <li>
                        <input type="checkbox" wire:model.live="eighties">
                        1980s
                    </li>
                    <li>
                        <input type="checkbox" value="1970s" wire:model.live="seventies">
                        1970s
                    </li>
                    <li>
                        <input type="checkbox" value="1960s" wire:model.live="sixties">
                        1960s
                    </li> --}}
                    {{-- <li>
                        <input type="checkbox" value="earlier" wire:model.live="earlier">
                        Earlier
                    </li> --}}
                </ul>
            </div>
        </div>

        <div class="rating-wrapper" style=" margin-right:50px">
            <button class="rating-filter">
                Rating
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-year" wire:ignore.self>
              
            </div>
        </div>
    </div>

</div>
