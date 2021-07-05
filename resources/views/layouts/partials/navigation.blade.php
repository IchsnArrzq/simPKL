<div class="navbar-fixed">
    <nav class="navbar-color #1565c0 blue darken-3">
        <div class="nav-wrapper">
            <ul class="left">
                <li>
                    <h1 class="logo-wrapper">
                        <a href="" class="brand-logo darken-1">
                            <img src="{{ asset('template/images/logo/materialize-logo.png') }}" alt="materialize logo">
                            <span class="logo-text hide-on-med-and-down">SIM PKL</span>
                        </a>
                    </h1>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                        <span class="avatar-status avatar-online">
                            <img src="{{ asset('template/images/avatar/avatar-7.png') }}" alt="avatar">
                            <i></i>
                        </span>
                    </a>
                </li>
            </ul>
            <ul id="profile-dropdown" class="dropdown-content">
                <li>
                    <a href="{{ route('logout') }}" class="grey-text text-darken-1" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="material-icons">keyboard_tab</i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
