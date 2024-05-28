{{-- {{ dd($popularActors[0]) }} --}}

<div class="actors-container">



    <div class="filter-panel" style="display: flex">
        <div class="section-nav">
            <h3 class="browse-movie-list">Popular Actors</h3>
        </div>


        <div style="display: flex;flex-wrap:wrap;">
            <input type="text" class="search-filter" wire:model.live="search"
                placeholder="search actors, movies, series...." style="margin-right: 10px; ">


        </div>

    </div>


    <section class="main-section movie-view" style="margin-top:20px; height: 90vh;
    overflow: auto;">

        @foreach ($popularActors as $actor)
            <div class="card">

                <a href="{{ route('actors.show', ['slug' => $actor['slug'], 'id' => $actor['id']]) }}">
                    <img src="{{ $actor['profile_path'] }}">
                    <div class="content">
                        <h3 style="font-size: 15px">{{ $actor['name'] }}</h3>
                        {{-- <p style="font-size: 12px; color:rgb(195, 195, 195); font-weight: bold">
                            {{ $actor['known_for'] }}</p> --}}

                        </h6>

                    </div>
                </a>
            </div>
        @endforeach
        <div x-data="{
            observe() {
                const observer = new IntersectionObserver((popularMovies) => {
                    popularMovies.forEach(movie => {
                        if (movie.isIntersecting) {
                            @this.loadMore()
                        }
                    })
                })
        
                observer.observe(this.$el)
            }
        }" x-init="observe">

        </div>
    </section>
    <i  wire:loading class="fa fa-spinner fa-pulse fa-fw movies-spinner "></i>

</div>
