<div class="search-container " x-data="{ isOpen: true }">
    <form wire:submit="searchQuery" >

        <input type="search" required wire:model.live="query">
    
        <button type="submit"><i class="fa fa-search"></i></button>
            <i wire:loading class="fa fa-cog fa-spin fa-fw"></i>
    </form>


    @if (strlen($query) >= 2 && $searchResults->count() > 0)
        <div class="search-results" x-show.transition.opacity="isOpen">

            <ul>
                @foreach ($searchResults as $key => $result)
                    <li class="search-results-item ">
                        <a href="{{ route($result['route'],  ['slug'=>$result['slug'], 'id'=>$result['id']]) }}">
                            <img src="{{ $result['poster_path'] }}" alt="poster">
                            <span style="margin-left: 22px">
                                <div>
                                    <h4 >
                                        {{ $result['title'] }}

                                    </h4>
                                </div>
                                <div>
                                    <ul class="search-detail">
                                        <li>
                                            {{ ucfirst($result['media_type']) }}
                                        </li>
                                        <li>
                                            {{ $result['release_date'] }}
                                        </li>
                                        <li>
                                            <i style="color: rgb(218, 218, 7) ; margin: 2px; font-size:11px;"
                                                class='fa fa-star'></i>
                                            <span>{{ $result['vote_average'] }}</span>
                                        </li>
                                        <li class="">
                                            {{ $result['language'] }}
                                        </li>

                                    </ul>
                                </div>
                            </span>
                        </a>
                    </li>
                @endforeach
                <li>
                    <button wire:click="searchQuery" type="button">
                        <span style="color: white;font-size: 1.3em;"> <i class="fa fa-search"></i></span>
                    </button>
                </li>
            </ul>

        </div>
    @endif
</div>
