
<div class="movie-view" x-data="{ activeTab:  0 }">

    <div class="wrapper">

        <button    @click="activeTab = 0"
   
        :class="{ 'active-filter': activeTab === 0 }">
            Porpular
        </button>


        <button    @click="activeTab = 1"
          
            :class="{ 'active-filter': activeTab === 1 }">
            Now Playing
        </button>
        <button>
            Upcoming
        </button>
        <button>
            Trending

        </button>
        <button>
            Top Rated
        </button>

    </div>

   

  


    <div class="porpular-movies" 
    x-show="activeTab === 0"
     x-transition:enter.duration.200ms
     x-transition:leave.duration.300ms >
        <livewire:popular-movies  />
    </div>

    
  <div class="nowplaying-movies"  x-show="activeTab === 1" 
  x-transition:enter.duration.200ms
  x-transition:leave.duration.300ms >
        <livewire:now-playing-movies />
    </div>



  <div style="display: flex">



  



    </div>













</div>