<div class="container">
    <div class="content-container">
        <div class="movie-container">
            <h1 class="browse-movie-list">BROWSE SERIES</h1>
            <section class="main-section">
                @foreach ($popularTv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />
                 @endforeach
              </section>  
              {{ $popularTv->links('custom-pagination-links') }}
            </div>
            {{-- <div class="page-load-status ">
                <x-spinner/>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">Error</p>
            </div> --}}
        </div>
    </div>