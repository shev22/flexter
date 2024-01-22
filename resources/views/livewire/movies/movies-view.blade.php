<div class="movie-view" x-data="{ activeTab: 0 }">
    <div class="porpular-movies" x-show="activeTab === 0"  >
        <livewire:movies.popular-movies />
    </div>

    <div class="nowplaying-movies" x-show="activeTab === 1"  >
        <livewire:movies.now-playing-movies />
    </div>
    <div class="upcoming-movies" x-show="activeTab === 2">
        <livewire:movies.upcoming-movies />
    </div>

    {{-- <div class="trending-movies" x-show="activeTab === 3" >
        <livewire:trending-movies />
    </div> --}}
    <div class="top-rated-movies" x-show="activeTab === 4">
        <livewire:movies.top-rated-movies/>
    </div>

</div>
