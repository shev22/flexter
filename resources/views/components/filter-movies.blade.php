@props(['title'])

<div class="filter-panel">

    <div class="section-nav">
        <h3 class="browse-movie-list">{{ $slot }}</h3>
    </div>

    <div class="">

        <button wire:click="filterByPopularity" @class(['active-filter' => $this->popularity])>
            Popularity
        </button>



        {{-- <button>
            Country
        </button> --}}


        <button wire:click="filterByLatest" @class(['active-filter' => $this->latest])>
            Recently Added

        </button>

        <input type="text" class="search-filter" placeholder=" search title..  year..." wire:model.live="search">

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

                            {{-- <div class="checkbox-wrapper-4">
                                <input class="inp-cbx" id="genre{{ $key }}" type="checkbox" value="{{ $key }}" wire:model.live="sortByGenre"/>
                                <label class="cbx" for="genre{{ $key }}"><span>
                                <svg width="12px" height="10px">
                                  <use xlink:href="#check-4"></use>
                                </svg></span><span>{{ $genre }}</span></label>
                                <svg class="inline-svg" >
                                  <symbol id="check-4" viewbox="0 0 12 10">
                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                  </symbol>
                                </svg>
                              </div> --}}


                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $key }}" wire:model.live="sortByGenre" />
                                <label for="genre{{ $key }}">{{ $genre }}</label>
                            </div>










                            {{-- <label >  <input type="checkbox"  class="checkbox"> </label>    --}}

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
                            {{-- <input type="checkbox" value="{{ $i }}" wire:model.live="sortByYears"
                           
                       
                            > --}}

                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="year{{ $i }}"
                                    value="{{ $i }}" wire:model.live="sortByYears"
                                    />
                                <label for="year{{ $i }}">{{ $i }}</label>
                            </div>






                            
                        </li>
                    @endfor
                    {{-- <li>
                        <input type="checkbox" value=" 1980's" wire:model.live="eighties" >
                        1980's
                    </li>
                    <li>
                        <input type="checkbox" value=" 1970's" wire:model.live="seventies">
                        1970's
                    </li> --}}
                    <li>

                        <div class="checkbox-wrapper-47">
                            <input type="checkbox" name="cb" id="year-earlier"
                                value="earlier" wire:model.live="earlier"
                              />
                            <label for="year-earlier">Earlier</label>
                        </div>
                        {{-- <input type="checkbox" value=" earlier" wire:model.live="earlier" >
                        Earlier --}}
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
                    @foreach ($this->languages() ?? []  as $key => $value)
                        <li>
                            {{-- <input type="checkbox" value="{{ $value['iso_639_1'] }}" wire:model.live="language">
                            {{ $value['english_name'] }} --}}

                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $value['iso_639_1'] }}" wire:model.live="language" />
                                <label for="genre{{ $key }}">      {{ $value['english_name'] }}</label>
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
                        {{-- <input type="radio" name="imdb" value="acending" wire:model.live="sortByImdb"
                            class="radio">
                        <label for="accending">Accending order</label><br> --}}

                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="acending"
                                value="acending" wire:model.live="sortByImdb" />
                            <label for="acending">Accending order</label>
                        </div>



                    </li>

                    <li>
                        {{-- <input type="radio" name="imdb" value="decending" wire:model.live="sortByImdb">
                        <label for="decending">Decending order</label> --}}
                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="decending"
                                value="decending" wire:model.live="sortByImdb" />
                            <label for="decending">Decending order</label>
                        </div>
                    </li>
                    <li>
                        {{-- <input type="radio" name="imdb" value="normal" wire:model.live="sortByImdb">
                        <label for="normal">Original order</label> --}}
                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="normal"
                                value="normal" wire:model.live="sortByImdb" />
                            <label for="normal">Original order</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>



@props(['title'])

<div class="filter-panel filter-panel-mobile">


    <div style="display: flex;  flex-wrap: wrap;    align-items: center;
    justify-content: center;">

        <h3 class="browse-movie-list">{{ $slot }}</h3>


        <div>
            <button wire:click="filterByPopularity" @class(['active-filter' => $this->popularity])>
                Popularity
            </button>
        </div>


        <div>
            <button wire:click="filterByLatest" @class(['active-filter' => $this->latest])>
                Recently updated

            </button>
        </div>

        <input type="text" class="search-filter" placeholder=" search title. year..." wire:model.live="search">

        <div class="genre-wrapper">
            <button class="genre-filter {{ $this->sortByGenre ? 'active-filter' : '' }}">
                Genre
                <i class="fas fa-caret-down"></i>
            </button>


            <div class="filter-content-genre" wire:ignore.self>
                <ul>
                    @foreach ($this->genres() ?? [] as $key => $genre)
                        <li>
                            {{-- <input type="checkbox" value="{{ $key }}" wire:model.live="sortByGenre">
                            {{ $genre }} --}}

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
                            {{-- <input type="checkbox" value="{{ $i }}" wire:model.live="sortByYears"
                                @if ($this->earlier) disabled @endif>
                            {{ $i }} --}}

                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="year{{ $i }}"
                                    value="{{ $i }}" wire:model.live="sortByYears"
                                    />
                                <label for="year{{ $i }}">{{ $i }}</label>
                            </div>
                        </li>
                    @endfor
                    {{-- <li>
                        <input type="checkbox" value=" 1980's" wire:model.live="eighties">
                        1980's
                    </li>
                    <li>
                        <input type="checkbox" value=" 1970's" wire:model.live="seventies">
                        1970's
                    </li> --}}
                    <li>
                        {{-- <input type="checkbox" value=" earlier" wire:model.live="earlier"
                            {{ $this->sortByYears ? 'disabled' : '' }}>
                        Earlier --}}
                        <div class="checkbox-wrapper-47">
                            <input type="checkbox" name="cb" id="year-earlier"
                                value="earlier" wire:model.live="earlier"
                              />
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
                            {{-- <input type="checkbox" value="{{ $value['iso_639_1'] }}" wire:model.live="language">
                            {{ $value['english_name'] }} --}}
                            <div class="checkbox-wrapper-47">
                                <input type="checkbox" name="cb" id="genre{{ $key }}"
                                    value="{{ $value['iso_639_1'] }}" wire:model.live="language" />
                                <label for="genre{{ $key }}">      {{ $value['english_name'] }}</label>
                            </div>
                            
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>


        <div class="rating-wrapper" style="">
            <button class="rating-filter {{ $this->sortByImdb ? 'active-filter' : '' }}">
                IMDB
                <i class="fas fa-caret-down"></i>
            </button>

            <div class="filter-content-rating radio-filter" wire:ignore.self>
                <ul>

                    <li>
                        {{-- <input type="radio" name="imdb" value="acending" wire:model.live="sortByImdb"
                            class="radio">
                        <label for="accending">Accending order</label><br> --}}

                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="acending"
                                value="acending" wire:model.live="sortByImdb" />
                            <label for="acending">Accending order</label>
                        </div>



                    </li>

                    <li>
                        {{-- <input type="radio" name="imdb" value="decending" wire:model.live="sortByImdb">
                        <label for="decending">Decending order</label> --}}
                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="decending"
                                value="decending" wire:model.live="sortByImdb" />
                            <label for="decending">Decending order</label>
                        </div>
                    </li>
                    <li>
                        {{-- <input type="radio" name="imdb" value="normal" wire:model.live="sortByImdb">
                        <label for="normal">Original order</label> --}}
                        <div class="checkbox-wrapper-48">
                            <input type="radio" name="imdb" id="normal"
                                value="normal" wire:model.live="sortByImdb" />
                            <label for="normal">Original order</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>


    </div>



</div>
