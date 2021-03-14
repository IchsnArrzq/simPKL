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
                    <h5 class="breadcrumbs-title">Jurnal Siswa</h5>
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
                    <div class="card-action">
                <h4 class="header"><a href="{{ route('menu.siswa.jurnal.set') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New perusahaan"><i class="material-icons right">add</i></a></h4>

                    </div>
                    <div class="card-content">

                        <table class="responsive-table highlight centered bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-field="divisi">divisi</th>
                                    <th data-field="tanggal">tanggal</th>
                                    <th data-field="mulai">mulai</th>
                                    <th data-field="selesai">selesai</th>
                                    <th data-field="kegiatan">kegiatan</th>
                                    <th data-field="hasil">hasil</th>
                                    <th data-field="keterangan">keterangan</th>
                                    <th data-field="option" colspan="2">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jurnal as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->divisi }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{ $data->mulai }}</td>
                                    <td>{{ $data->selesai }}</td>
                                    <td>{{ $data->kegiatan }}</td>
                                    <td>{{ $data->hasil }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <!-- <td>{{ \Carbon\Carbon::parse($data->long_time)->diffForHumans() }}</td> -->
                                    <td><a href="{{ route('menu.admin.perusahaan.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">edit</i></a></td>
                                    <td><button onclick="deleteUser()" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button></td>
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
