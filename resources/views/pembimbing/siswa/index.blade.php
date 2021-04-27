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

                    </div>
                    <div class="card-content">
                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="">
                                    <tr>
                                        <th>nis</th>
                                        <th>nama</th>
                                        <th>jurusan_id</th>
                                        <th>periode_id</th>
                                        <th>pembimbing_id</th>
                                        <th>kakomli_id</th>
                                        <th>user_id</th>
                                        <th>Kompetensi</th>
                                        <th>Kedisiplinan</th>
                                        <th>Sikap</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @forelse($siswa as $data)
                                    <tr>
                                        <td>{{ $data->nis ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->jurusan->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->periode_id ?? 'Belum Di Tambahkan Oleh Siswa' }}</td>
                                        <td>{{ $data->pembimbing->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->kakomli->nama ?? 'Belum Di Tambahkan Oleh Siswa'}}</td>
                                        <td>{{ $data->user_id }}</td>
                                        <td><a href="{{ route('menu.pembimbing.get.kompetensi', $data->id) }}" class="waves-effect waves-light btn blue darken-2">{{ $data->rapot->kompetensi }}</a></td>
                                        <td><a href="{{ route('menu.pembimbing.get.kedisiplinan',$data->id) }}" class="waves-effect waves-light btn blue darken-2">{{ $data->rapot->kedisiplinan }}</a></td>
                                        <td><a href="{{ route('menu.pembimbing.get.sikap',$data->id) }}" class="waves-effect waves-light btn blue darken-2">{{ $data->rapot->sikap }}</a></td>
                                        <td><span class="badge badge-success">{{ $data->periode->status ?? ''}}</span></td>
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
