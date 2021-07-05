<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
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
                <li class="bold{{ request()->is('menu/admin/siswa') ? ' active' : '' }}">
                    <a href="{{ route('menu.admin.siswa.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_box</i>
                        <span class="nav-text">Kelola Siswa</span>
                    </a>
                </li>
                <li class="bold{{ request()->is('menu/admin/perusahaan') ? ' active' : '' }}">
                    <a href="{{ route('menu.admin.perusahaan.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">location_city</i>
                        <span class="nav-text">Perusahan Magang</span>
                    </a>
                </li>
                <li class="bold{{ request()->is('menu/admin/periode') ? ' active' : '' }}">
                    <a href="{{ route('menu.admin.periode.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">event</i>
                        <span class="nav-text">Periode</span>
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
                    <a href="{{ route('menu.siswa.laporan.get') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">book</i>
                        <span class="nav-text">Laporan PKL</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.siswa.rapot.get') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">chrome_reader_mode</i>
                        <span class="nav-text">Rapot PKL</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.siswa.sertifikat.get') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">chrome_reader_mode</i>
                        <span class="nav-text">Sertifikat</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'kakomli')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.kakomli.pembimbing.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_box</i>
                        <span class="nav-text">Daftar Pembimbing</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.kakomli.siswa.index') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">Rekap Data Siswa</span>
                    </a>
                </li>

                <li class="bold">
                    <a href="{{ route('menu.kakomli.nilai.get') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">chrome_reader_mode</i>
                        <span class="nav-text">Rekap Daftar Nilai</span>
                    </a>
                </li>

                <li class="bold">
                    <a href="{{ route('menu.kakomli.laporan.get') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">book</i>
                        <span class="nav-text">Laporan</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'pembimbing_sekolah')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.pembimbing_sekolah.siswa') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">Siswa</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'pembimbing_industri')
                <li class="bold">
                    <a href="{{ route('home') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.pembimbing_industri.siswa') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">Siswa</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ route('menu.pembimbing_industri.perusahaan') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">Perusahaan</span>
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
