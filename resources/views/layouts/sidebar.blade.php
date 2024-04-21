<div class="sidebar {{ session('nightmode') ? 'active' : '' }}">

  
  <a href="{{ route('/') }} ">
    <i @class([
      ' fas fa-home',
      'sidebar-selected' => Request::is('/'),
      'left-menu-icon' => !Request::is('/'),
      'active' => session('nightmode'), 
  ])
    >
    </i>
  </a>
   
    <a href="{{ route('search') }} ">
      <i @class([
        ' fas fa-search',
        'sidebar-selected' => Request::is('search'),
        'left-menu-icon' => !Request::is('search'),
        'active' => session('nightmode'), 
    ])
      >
      </i>
    </a> 
    
    <a href="{{ route('actors.index') }}">
        <i @class([
          ' fas fa-users',
          'sidebar-selected' => Request::is('actors'),
          'left-menu-icon' => !Request::is('actors'),
          'active' => session('nightmode'), 
      ])
        >
      </i>
    </a>



    <a @if (Auth::check())  href="{{ route('wishlist') }}"@endif style="cursor: pointer;">
        <i @class([
            ' fas fa-bookmark',
            'sidebar-selected' => Request::is('wishlist'),
            'left-menu-icon' => !Request::is('wishlist'),
            'active' => session('nightmode'),
            'login' => !Auth::check(),
        ])>
        </i>
    </a>



    <i class=" fas fa-tv  left-menu-icon  {{ session('nightmode') ? 'active' : '' }} "></i>

    <i class=" fas fa-hourglass-start left-menu-icon {{ session('nightmode') ? 'active' : '' }}"></i>

    @if (Auth::check() && Auth::user()->role == 'admin')
    <a href="{{ route('admin') }}">
       <i class=" fas fa-user-tie left-menu-icon {{ session('nightmode') ? 'active' : '' }}"></i>
      </a>
    @endif
   


    {{--  <i class="left-menu-icon fas fa-shopping-cart"></i> --}}
</div>
