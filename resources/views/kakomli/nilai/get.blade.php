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
                    <h5 class="breadcrumbs-title">Nilai Siswa</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">{{ request()->path() }}</li>
                    </ol>
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

            <div class="col s12">
                <div class="card hoverable">

                    <div class="card-content">

                        <table class="responsive-table highlight centered bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Pembimbing Industri</th>
                                    <th data-field="kedisiplinan">kedisiplinan</th>
                                    <th data-field="kompetensi">kompetensi</th>
                                    <th data-field="sikap">sikap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($nilai as $data)
                                <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->siswa->nama}}</td>
                                @isset($data->siswa->pembimbing_industri->nama)
                                <td>{{ $data->siswa->pembimbing_industri->nama }}</td>
                                @else
                                <td>Belum di setting</td>
                                @endisset
                                <td>{{ $data->kedisiplinan }}</td>
                                <td>{{ $data->kompetensi }}</td>
                                <td>{{ $data->sikap }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
