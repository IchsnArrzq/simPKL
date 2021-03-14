<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li>
            <div class="user-view">
                <div class="background">
                    @if(auth()->user()->role == 'admin')
                    <img src="{{ asset('template/images/gallary/2.png') }}" alt="">
                    @endif
                    @if(auth()->user()->role == 'siswa')
                    <img src="{{ asset('template/images/gallary/13.png') }}" alt="">
                    @endif
                    @if(auth()->user()->role == 'kkk')
                    <img src="{{ asset('template/images/gallary/17.png') }}" alt="">
                    @endif
                    @if(auth()->user()->role == 'ppkl')
                    <img src="{{ asset('template/images/gallary/7.png') }}" alt="">
                    @endif
                </div>
                <a href="#user"><img src="{{ asset('template/images/avatar/avatar-7.png') }}" alt="" class="circle responsive-img valign profile-image blue"></a>
                <a href="#name"><span class="white-text name">{{ auth()->user()->name }}</span></a>
                <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a>
            </div>
        </li>

        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                @if(auth()->user()->role == 'admin')
                <li class="bold{{ request()->is('home') ? ' active' : '' }}">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold{{ request()->is('menu/admin/user') ? ' active' : '' }}">
                    <a href="{{ route('menu.admin.user.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">Kelola User</span>
                    </a>
                </li>

                <li class="bold{{ request()->is('menu/admin/perusahaan') ? ' active' : '' }}">
                    <a href="{{ route('menu.admin.perusahaan.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">location_city</i>
                        <span class="nav-text">Perusahan Magang</span>
                    </a>
                </li>

                <li class="bold{{ request()->is('menu/admin/jurusan') ? ' active' : '' }}">
                    <a href="{{ route('menu.admin.jurusan.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">layers</i>
                        <span class="nav-text">Jurusan</span>
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
                    <a href="{{ route('menu.siswa.jurnal.get') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">folder_shared</i>
                        <span class="nav-text">Jurnal PKL</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="" class="waves-effect waves-cyan">
                        <i class="material-icons">book</i>
                        <span class="nav-text">Laporan PKL</span>
                    </a>
                </li>

                @endif
                @if(auth()->user()->role == 'kkk')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">assignment</i>
                        <span class="nav-text">Task</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'ppkl')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">assignment</i>
                        <span class="nav-text">Task</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only red darken-3">
        <i class="material-icons">menu</i>
    </a>
</aside>
