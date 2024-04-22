

<div class="navbar">
    <div class="navbar-container {{ session('nightmode') ? 'active' : '' }}">
        <div class="logo-container">

            {{-- <img src="img/logo/logo-5.png" alt="" width="80"> --}}
            <h1 class="logo"><a href="{{ route('/') }}">Flexter</a> </h1>
        </div>
        <div class="menu-container ">
            <ul class="menu-list">
  

                <li @class(['menu-list-item ', 'selected' => Request::is('/')])> <a href="{{ route('/') }}" @class(['auth', 'active' => session('nightmode')])>Home</a>
                </li>
                <li @class(['menu-list-item ', 'selected' => Request::is('movies')])> <a href="{{ route('movies') }}" @class(['auth', 'active' => session('nightmode')])> Movies</a>
                </li>
                <li @class(['menu-list-item ', 'selected' => Request::is('tv')])> <a href="{{ route('tv') }}" @class(['auth', 'active' => session('nightmode')])> Series</a>
                </li>
                <li @class(['menu-list-item ', 'selected' => Request::is('toprated')])> <a  href="{{ route('toprated') }}" @class(['auth', 'active' => session('nightmode')])><span style="color:rgb(230, 150, 3); font-weight:bold; font-size:14px; margin-right:3px">IMDB </span> Top Rated</a> </li>
                {{-- <li @class(['menu-list-item ', 'selected' => Request::is('')])> <a @class(['auth', 'active' => session('nightmode')])>Trending</a> </li> --}}
                {{-- <li @class(['menu-list-item ', 'selected' => Request::is('actors.index')])> <a href="{{ route('actors.index') }}"
                        @class(['auth', 'active' => !$nightMode])>Actors</a> </li> --}}

                {{-- <li href="{{ route('movies') }}" class="menu-list-item {{Request::is('movies') ? 'selected' : '';}} ">Movies</li>
                <li href="{{ route('tv') }}" class="menu-list-item {{Request::is('tv') ? 'selected' : '';}} ">Series</li>
                <li href="{{ route('/') }}" class="menu-list-item" >Popular</li>
                <li href="{{ route('/') }}" class="menu-list-item  ">Trends</li>
                <li href="{{ route('actors.index') }}" class="menu-list-item {{Request::is('actors') ? 'selected' : '';}} ">Trends</li> --}}




            </ul>
            <livewire:search-dropdown />

        </div>



        <div class="profile-container ">
            {{-- <i class='fas fa-bell'></i> --}}
            @auth
                <img class="profile-picture" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"   >
                <div class="profile-text-container">
                    <span class="profile-text profile" style="font-weight:bold">{{ Auth::user()->name }}</span>
                    <i class="fas fa-caret-down"></i>
                </div>
            @else
                <div class="profile-text-container">
                    <span class="profile-text "><a class="auth login {{session('nightmode') ? 'active' : '' }}">Log in</a> | <a
                            class="auth register {{ session('nightmode') ? 'active' : '' }}"> Register</a></span>
                    {{-- <span class="profile-text"></span> --}}

                </div>
            @endauth
            <div class="toggle {{ session('nightmode')? 'active' : '' }}">
                <i class="fas fa-moon toggle-icon"></i>
                <i class="fas fa-sun toggle-icon"></i>
                <div class="toggle-ball {{ session('nightmode') ? 'active' : '' }}"></div>
            </div>
            <div class="menu-dropdown ">
                <i class='fa fa-bars '></i>
            </div>

        </div>


    </div>
    <x-register />
    <x-login />
    <x-recover />
    <x-profile-dropdown />
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
</div>
