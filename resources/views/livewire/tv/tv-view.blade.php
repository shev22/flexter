
<div>
    <x-filter-movies>
        {{ __('Series') }}
    </x-filter-movies>
    <div class="movie-container movie-view">
        <section class="main-section">
            @foreach ($tv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />
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
        <i wire:loading class="fa fa-spinner fa-pulse fa-fw movies-spinner "></i>
    </div>
</div>

