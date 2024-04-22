@props(['title'])

<div class="filter-panel">
    <div class="section-nav">
        <h3 class="browse-movie-list">{{ $slot }}</h3>
    </div>

    <div class="">

        <button wire:click="filterByPopularity" @class(['active-filter' => $this->popularity])>
            Popularity
        </button>



        <button>
            Country
        </button>


        <button wire:click="filterByLatest" @class(['active-filter' => $this->latest])>
            Recently updated

        </button>

        <input type="text" class="search-filter" placeholder=" search title..." wire:model.live="search">

    </div>


    <div class="checkbox-filter" style="display: flex; ">

        <div class="genre-wrapper">
            <button class="genre-filter {{ $this->sortByGenre ? 'active-filter' : '' }}" >
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

        <div class="year-wrapper" >
            <button class="year-filter {{ $this->sortByYears ? 'active-filter' : '' }}">
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


        <div class="year-wrapper" >
            <button class="language-filter {{ $this->language ? 'active-filter' : '' }}">
                Language
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-language" wire:ignore.self>
                <ul>
                    @foreach ($this->languages() as $key => $value)
                        <li>
                            <input type="checkbox" value="{{ $value['iso_639_1'] }}" wire:model.live="language">
                            {{ $value['english_name'] }}
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
                        <input type="radio" name="imdb" value="acending" wire:model.live="sortByImdb">
                        <label for="accending">Accending order</label><br>
                    </li>

                    <li>
                        <input type="radio" name="imdb" value="decending" wire:model.live="sortByImdb">
                        <label for="decending">Decending order</label>
                    </li>
                    <li>
                        <input type="radio" name="imdb" value="normal" wire:model.live="sortByImdb">
                        <label for="normal">Original order</label>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>
