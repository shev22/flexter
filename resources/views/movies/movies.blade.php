<x-app-layout>
{{-- 
    {{ dd($popularMovies) }} --}}
    <div class="container {{ session('nightmode') ? 'active' : '' }}">
        <div class="content-container">
            <livewire:movies.movies-view  />

        </div>
    
    </div>
    @include('layouts.footer')
</x-app-layout>
