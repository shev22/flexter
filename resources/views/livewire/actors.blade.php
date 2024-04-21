
{{-- {{ dd($popularActors[0]) }} --}}

        <div class="actors-container" >
            <div style="display: flex; justify-content: space-around; padding:12px">

                <h2 class="auth {{ session('nightmode') ? 'active' : '' }}">Popular Actors</h2>

                <input type="text"
                    style="background: rgb(219, 219, 219); border-radius:8px; padding:4px 10px; font-weight: bold; width:250px ;"
                    placeholder="   search actors, movies, series...." wire:model.live="search">
              
            </div>

            <hr style="opacity: 0.2 ; width:95%; margin:0 auto " >


            <section class="main-section movie-view" style="margin-top:20px">

                @foreach ($popularActors as $actor)
                    <div class="card" style="width: 190px">

                        <a href="{{ route('actors.show', ['slug' => $actor['slug'], 'id' => $actor['id']]) }}">
                            <img src="{{ $actor['profile_path'] }}">
                            <div class="content">
                                <h3 style="font-size: 15px">{{ $actor['name'] }}</h3>
                                <p style="font-size: 12px; color:rgb(195, 195, 195); font-weight: bold">
                                    {{ $actor['known_for'] }}</p>

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
  <div class="page-load-status"  wire:loading>
            <x-spinner />

        </div>
        </div>






      

