<div class="menubar {{ session('nightmode') ? 'active' : '' }}">
    {{-- <a href="{{ route('/') }}"><i class="left-menu-icon fas fa-home"></i></a>   --}}
    {{-- <div class="toggle {{ session('nightmode')? 'active' : '' }}">
    <i class="fas fa-moon toggle-icon"></i>
    <i class="fas fa-sun toggle-icon"></i>
    <div class="toggle-ball {{ session('nightmode') ? 'active' : '' }}"></div>
</div> --}}



    <a href="{{ route('movies') }} ">
        <i @class([
            ' fas fa-play',
            'menubar-selected' => Request::is('movies'),
            'active' => session('nightmode'),
        ])>
        </i>
        Movies
    </a>

    <a href="{{ route('tv') }} ">
        <i @class([' fas fa-tv ', 'menubar-selected' => Request::is('tv')])>
        </i>
        Series
    </a>

    <a href="{{ route('toprated') }} ">
        <i @class([
            ' fas fa-arrow-up',
            'menubar-selected' => Request::is('toprated'),
        ])>
        </i>
        Top Rated
    </a>

    {{-- <a href=""><i class=" fas fa-play"> Movies</i></a> --}}

    {{-- <i class=" fas fa-tv active"> Series</i>
    <i class=" fas fa-arrow-up"> Top Rated</i> --}}

    <span class="login"> <i class=" fas fa-user"> Login </i> </span>
   <span class=""><i class=" fas fa-sun "></i></span> 







    {{-- <ul class="">
        <li>
            <x-nav-link :href="route('/')" :selected="request()->routeIs('/')">
            {{ __('Home') }}
        </x-nav-link> 
        </li>
       

        <x-nav-link :href="route('movies')" :selected="request()->routeIs('movies')">
            {{ __('Movies') }}
        </x-nav-link>

        <x-nav-link :href="route('tv')" :selected="request()->routeIs('tv')">
            {{ __('Shows') }}
        </x-nav-link>


        <x-auth-navlink :href="route('actors.index')" :selected="request()->routeIs('actors.index')">
            {{ __('Actors') }}
        </x-auth-navlink> 

        {{-- <x-auth-navlink>
            {{ __('Popular') }}
        </x-auth-navlink>

        <x-auth-navlink>
            {{ __('Trends') }}
        </x-auth-navlink> --}}

    {{-- <x-nav-link>
      
        {{-- </x-nav-link>  --}}
    {{-- </ul> --}}
</div>
