<div class="movie-view" x-data="{ activeTab: 0 }">
   
   
    <div class="nowplaying-tv" x-show="activeTab === 1" >
        <livewire:tv.airing-today />
    </div>
   
    <div class="porpular-tv" x-show="activeTab === 0">
        <livewire:tv.popular-tv />
    </div>

    <div class="upcoming-tv" x-show="activeTab === 2">
        <livewire:tv.on-air />
    </div>

    {{-- <div class="trending-movies" x-show="activeTab === 3" >
        <livewire:trending-movies />
    </div> --}}
    <div class="top-rated-tv" x-show="activeTab === 4">
        <livewire:tv.top-rated-tv/>
    </div>

</div>