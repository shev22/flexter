<div class="footer {{ session('nightmode') ? 'active' : '' }}">

    {{-- <span class="auth {{ session('nightmode') ? 'active' : '' }}">
        &copy; <span style="color: #3c8809;">{{ date('Y') }}  </span>
    </span> --}}

    {{-- <button>
        Feedback
    </button> --}}

    <span class="auth {{ session('nightmode') ? 'active' : '' }}">

        <small>Powered by</small>
        <img src="{{ asset('img/tmdb.png') }}" >
        <p> This product uses the TMDB API but is not endorsed or certified by TMDB
        </p>
    </span>

   

</div>
