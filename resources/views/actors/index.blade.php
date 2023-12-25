

<x-app-layout>
<div>
    <div class="container">
        <div class="content-container">
            <div class="movie-container">
                <h1 class="browse-movie-list">PEOPLE</h1>
                <section class="main-section">
                    @foreach ($popularActors as $actor)                 
                        <div class="card">
                            <a href="{{ route('actors.show', $actor['id']) }}">
                            <img src="{{ $actor['profile_path'] }}" alt="" hight=150%>
                            <div class="content">
                                <h3 style="font-size: 15px">{{ $actor['name'] }}</h3>
                                <p style="font-size: 12px; color:rgb(195, 195, 195); font-weight: bold"> {{ $actor['known_for'] }}</p>
                           
                                </h6>
                    
                            </div>
                        </a>
                        </div>
                
                        @endforeach
                    </section>  
                </div>
                <div class="page-load-status ">
                    <x-spinner/>
                    <p class="infinite-scroll-last">End of content</p>
                    <p class="infinite-scroll-error">Error</p>
                </div>
            </div>
        </div>
</div>

</x-app-layout>

<script>
    // var elem = document.querySelector('.grid');
    // var infScroll = new InfiniteScroll(elem, {
    //     path: '/actors/page/@{{ # }}',
    //     append: '.actor',
    //     status: '.page-load-status',
    //     // history: false,
    // });

    $('.main-section').infiniteScroll({
  // options
  path: '/actors/page/@{{#}}',
  append: '.card',
  history: false,
});


</script>