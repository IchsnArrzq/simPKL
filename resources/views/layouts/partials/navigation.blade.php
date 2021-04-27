<div class="navbar-fixed">
    @if(auth()->user()->role == 'admin')
    <nav class="navbar-color gradient-45deg-indigo-blue">
    @endif
    @if(auth()->user()->role == 'siswa')
    <nav class="navbar-color gradient-45deg-purple-deep-orange">
    @endif
    @if(auth()->user()->role == 'kkk')
    <nav class="navbar-color gradient-45deg-purple-deep-purple">
    @endif
    @if(auth()->user()->role == 'ppkl')
    <nav class="navbar-color gradient-45deg-green-teal">
    @endif
        <div class="nav-wrapper">
            <ul class="left">
                <li>
                    <h1 class="logo-wrapper">
                        <a href="index.html" class="brand-logo darken-1">
                            <img src="{{ asset('template/images/logo/materialize-logo.png') }}" alt="materialize logo">
                            <span class="logo-text hide-on-med-and-down">Materialize</span>
                        </a>
                    </h1>
                </li>
            </ul>
            <div class="header-search-wrapper hide-on-med-and-down">
                <i class="material-icons">search</i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
            </div>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                        <span class="flag-icon flag-icon-gb"></span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                        <i class="material-icons">settings_overscan</i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                        <i class="material-icons">notifications_none
                            <small class="notification-badge pink accent-2">5</small>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                        <span class="avatar-status avatar-online">
                            <img src="{{ asset('template/images/avatar/avatar-7.png') }}" alt="avatar">
                            <i></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                        <i class="material-icons">format_indent_increase</i>
                    </a>
                </li>
            </ul>
            <!-- translation-button -->
            <ul id="translation-dropdown" class="dropdown-content">
                <li>
                    <a href="#!" class="grey-text text-darken-1">
                        <i class="flag-icon flag-icon-gb"></i> English</a>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-1">
                        <i class="flag-icon flag-icon-fr"></i> French</a>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-1">
                        <i class="flag-icon flag-icon-cn"></i> Chinese</a>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-1">
                        <i class="flag-icon flag-icon-de"></i> German</a>
                </li>
            </ul>
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
                <li>
                    <h6>NOTIFICATIONS
                        <span class="new badge">5</span>
                    </h6>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#!" class="grey-text text-darken-2">
                        <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-2">
                        <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-2">
                        <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-2">
                        <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                </li>
                <li>
                    <a href="#!" class="grey-text text-darken-2">
                        <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
                @if(auth()->user()->role === 'siswa')
                <li>
                    <a href="{{ route('menu.siswa.profile.index') }}" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                </li>
                @endif
                @if(auth()->user()->role === 'kkk')
                <li>
                    <a href="{{ route('menu.kakomli.profile.index') }}" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                </li>
                @endif
                @if(auth()->user()->role === 'ppkl')
                <li>
                    <a href="{{ route('menu.pembimbing.profile.index') }}" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                </li>
                @endif
                <li>
                    <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">settings</i> Settings</a>
                </li>
                <li>
                    <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">live_help</i> Help</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">lock_outline</i> Lock</a>
                </li>
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
