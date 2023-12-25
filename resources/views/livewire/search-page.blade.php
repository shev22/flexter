<div>
    <div class="container">
        <div class="content-container">
            <div class="movie-container">
                <h1 class="browse-movie-list">Search</h1>
                <section class="main-section">
                    @foreach ($SearchResult as $movie)
                    <x-search-card :movie="$movie" />
                        @endforeach
                    </section>  
                </div>
            </div>
        </div>
</div>
