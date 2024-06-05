<div class="menubar {{ session('nightmode') ? 'active' : '' }}">
    <ul class="nav-links">
        <li>
            <a href="{{ route('/') }} " @class([
                '  auth ',
                'menubar-selected' => Request::is('/'),
                'active' => session('nightmode'),
            ])>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('movies') }} " @class([
                '  auth ',
                'menubar-selected' => Request::is('movies'),
                'active' => session('nightmode'),
            ])>
                Movies
            </a>
        </li>
        <li>
            <a href="{{ route('tv') }} " @class([
                '  auth ',
                'menubar-selected' => Request::is('tv'),
                'active' => session('nightmode'),
            ])>

                Series
            </a>
        </li>
        <li>
            <a href="{{ route('actors.index') }} " @class([
                '  auth ',
                'menubar-selected' => Request::is('actors.index'),
                'active' => session('nightmode'),
            ])>

                Actors
            </a>
        </li>
        <li>
            <a href="{{ route('toprated') }} " @class([
                '  auth ',
                'menubar-selected' => Request::is('toprated'),
                'active' => session('nightmode'),
            ])>

                Top Rated
            </a>
        </li>
        <li>
            <a @if (Auth::check())  href="{{ route('wishlist') }}"@endif  @class([
                '  auth ',
                'menubar-selected' => Request::is('wishlist'),
                'active' => session('nightmode'),
                'login' => !Auth::check(),
            ])>

                Watch List
            </a>
        </li>
        <li>
            <a href="{{ route('search') }} " class="auth  {{ session('nightmode') ? 'active' : '' }}">
                <i @class([
                    ' fas fa-search',
                    'menubar-selected' => Request::is('search'),
                    'active' => session('nightmode'),
                ])>
                </i>
                Live Search 
            </a>
        </li>
    </ul>

    <div>
        @if (!Auth::check())
            <span class="login "><a 
                        style="font-size: 13px; color:gray"><i class=" fas fa-lock"></i></span></a> </span>
        @else
            <span class="profile auth  {{ session('nightmode') ? 'active' : '' }}">Welcome
                {{ explode(' ', Auth::user()->name)[0] }}
                <i class="fas fa-caret-down"></i>
            </span>
        @endif
    </div>

</div>
