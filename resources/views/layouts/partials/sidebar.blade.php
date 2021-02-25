<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="{{ asset('template/images/avatar/avatar-7.png') }}" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown-nav" class="dropdown-content">
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">face</i> Profile</a>
                        </li>
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
                            <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="grey-text text-darken-1">
                                <i class="material-icons">keyboard_tab</i> Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav">{{ auth()->user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">{{ auth()->user()->role }}</p>
                </div>
            </div>
        </li>
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                @if(auth()->user()->role == 'admin')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.admin.user') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">User Account</span>
                    </a>
                </li>

                <li class="bold">
                    <a href="{{ route('menu.admin.company') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">location_city</i>
                        <span class="nav-text">Company Internship</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'siswa')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">folder_shared</i>
                        <span class="nav-text">Absent</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'instruktur')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
        <i class="material-icons">menu</i>
    </a>
</aside>
