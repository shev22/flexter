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
            <a href="{{ route('wishlist') }} " @class([
                '  auth ',
                'menubar-selected' => Request::is('wishlist'),
                'active' => session('nightmode'),
            ])>

                Watch List
            </a>
        </li>
    </ul>

    <div>
        @if (!Auth::check())
            <span class="login"><a><i class=" fas fa-lock"> Login </i> </a> </span>
        @else
            <span class="profile auth active">Welcome {{ Auth::user()->name }}
                <i class="fas fa-caret-down"></i>
            </span>
        @endif
    </div>











</div>
