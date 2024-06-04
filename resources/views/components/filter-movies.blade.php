@props(['title'])

<div class="filter-panel">

    <span class="section-nav">
        <h3 class="browse-movie-list">{{ $slot }}
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
        <div>
            <input type="text" class="search-filter" placeholder=" search title..  year..." wire:model.live="search">

        </div>

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
        <div style="width: 90px" >
             <h3>{{ $slot }} </h3>
             <i wire:loading class="fa fa-spinner fa-pulse fa-fw  " ></i>
        </div>
       

        <input type="text" class="search-filter" placeholder=" search title. year." wire:model.live="search">


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
