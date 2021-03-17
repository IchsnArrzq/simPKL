@extends('layouts.app')
@section('content')
<section id="content">
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <blockquote>
                        <h5 class="breadcrumbs-title">Table User</h5>
                        <ol class="breadcrumbs">
                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="active">User</li>
                        </ol>
                    </blockquote>
                </div>
                <div class="col s2 m6 l6">

                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card hoverable">
                    <div class="card-action">
                        <a href="{{ route('menu.kakomli.siswa.get') }}" class="waves-effect waves-light btn grey darken-2 tooltipped" data-position="top" data-tooltip="Refresh"><i class="material-icons">restore</i></a>

                        <a class="btn dropdown-settings waves-effect waves-light red darken-2 breadcrumbs-btn" href="#!" data-activates="dropdown2">
                            <span class="hide-on-small-onl"></span>
                            <i class="material-icons right">face</i>
                        </a>
                        <ul id="dropdown2" class="dropdown-content">
                            @foreach($pembimbing as $data)
                            <li>
                                <a href="{{ route('menu.kakomli.pembimbing.get', $data->id ) }}" class="grey-text text-darken-2">{{ $data->nama }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <a class="btn dropdown-settings waves-effect waves-light yellow darken-2 breadcrumbs-btn" href="#!" data-activates="dropdown3">
                            <span class="hide-on-small-onl"></span>
                            <i class="material-icons right">location_city</i>
                        </a>
                        <ul id="dropdown3" class="dropdown-content">
                            @foreach($perusahaan as $data)
                            <li>
                                <a href="{{ route('menu.kakomli.perusahaan.get', $data->id ) }}" class="grey-text text-darken-2">{{ $data->perusahaan }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <a class="btn dropdown-settings waves-effect waves-light blue darken-2 breadcrumbs-btn" href="#!" data-activates="dropdown1">
                            <span class="hide-on-small-onl"></span>
                            <i class="material-icons right">watch_later</i>
                        </a>
                        <ul id="dropdown1" class="dropdown-content">
                            @foreach($periode as $data)
                            <li>
                                <a href="{{ route('menu.kakomli.periode.get', $data->id ) }}" class="grey-text text-darken-2">{{ $data->mulai }} - {{ $data->selesai }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                        @if($data = Session::get('siswa'))
                            {{ $data }}
                        @endif
                    <div class="card-content">
                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="">
                                    <tr>
                                        <th>nis</th>
                                        <th>nisn</th>
                                        <th>nama</th>
                                        <th>ttl</th>
                                        <th>jurusan_id</th>
                                        <th>periode_id</th>
                                        <th>pembimbing_id</th>
                                        <th>kakomli_id</th>
                                        <th>user_id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @forelse($siswa as $data)
                                    <tr>
                                        <td>{{ $data->nis ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->nisn ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->ttl ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->jurusan->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->periode_id ?? 'Belum Di Tambahkan Oleh Siswa' }}</td>
                                        <td>{{ $data->pembimbing->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->kakomli->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->user_id }}</td>
                                        @empty
                                        <td colspan="9">
                                            <div class="card-panel gradient-45deg-red-pink gradient-shadow">
                                                <span class="white-text">Empty <i class="material-icons left">search</i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-action">
                        <p>{{ $siswa->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
