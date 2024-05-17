
    <x-app-layout>
        {{-- <div class="container {{ session('nightmode') ? 'active': '' }}">
            <div class="content-container"> --}}
    
                <livewire:search-page :query="$query" /> 
         
            {{-- </div>
         
                </div>
                @include('layouts.footer') --}}
    </x-app-layout>