<div class="profile-dropdown-container" style="display: none">
    <ul>
        <li style="   border-top-right-radius: 8px; border-top-left-radius: 8px;">
            <a href="{{ route('profile.edit') }}" class="auth  {{ session('nightmode') ? 'active' : '' }}"> Profile</a>
        </li>
        <li style="   border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf


                <a class="auth  {{ session('nightmode') ? 'active' : '' }}" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </li>
    </ul>
</div>
