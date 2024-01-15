<div class="filter-container">

    <div class="wrapper">


        <div class="filter-tabs">

            <div class="section-nav">
             <h3 class="browse-movie-list">Popular Movies</h3>
            </div>


            <div class="filter-nav">
                <button class="genre-filter">
                    Genre
                    <i class="fas fa-caret-down"></i>
                </button>
                <button>
                    Porpularity
                    <i class="fas fa-caret-down"></i>
                </button>
                <button>
                    Country
                    <i class="fas fa-caret-down"></i>
                </button>
                <button>
                    Rating
                    <i class="fas fa-caret-down"></i>
                </button>
                <button class="year-filter">
                    Year
                    <i class="fas fa-caret-down"></i>
                </button>


            </div>



        </div>





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

        <div class="filter-content-year" wire:ignore.self>
            <ul>
                @for ($i = (int) date('Y'); $i >= 2000; $i--)
                    <li>
                        <input type="checkbox" value="{{ $i }}" wire:model.live="twothousands">
                        {{ $i }}
                    </li>
                @endfor
                <li>
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
                </li>
                {{-- <li>
                    <input type="checkbox" value="earlier" wire:model.live="earlier">
                    Earlier
                </li> --}}
            </ul>
        </div>






    </div>
</div>
