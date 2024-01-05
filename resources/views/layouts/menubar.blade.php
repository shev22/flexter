<div class="menubar ">
  {{-- <a href="{{ route('/') }}"><i class="left-menu-icon fas fa-home"></i></a>  
    <i class="left-menu-icon fas fa-users"></i>
    <i class="left-menu-icon fas fa-bookmark"></i>
    <i class="left-menu-icon fas fa-tv"></i>
    <i class="left-menu-icon fas fa-hourglass-start"></i>
    <i class="left-menu-icon fas fa-shopping-cart"></i>
 --}}





    <ul class="">
        <x-nav-link :href="route('/')" :selected="request()->routeIs('/')">
            {{ __('Home') }}
        </x-nav-link>

        <x-nav-link :href="route('movies')" :selected="request()->routeIs('movies')">
            {{ __('Movies') }}
        </x-nav-link>

        <x-nav-link :href="route('tv')" :selected="request()->routeIs('tv')">
            {{ __('TV Shows') }}
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
      
        </x-nav-link>  --}}
    </ul>
</div>

