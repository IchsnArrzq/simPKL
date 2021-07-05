@extends('layouts.app')
@section('content')
@section('bread', 'Pembimbing')
@push('bread')
<li class="active">Pembimbing</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s6">
                <div class="card hoverable">
                    <div class="card-action">
                        <p>Pembimbing Sekolah</p>
                    </div>

                    <div class="card-content">
                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="black white-text">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Jurusan</th>
                                        <th>Total Siswa</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($pembimbing_sekolah as $row)
                                    <tr>
                                        @isset($row->pembimbing_sekolah->nama)
                                        <td>{{ $row->pembimbing_sekolah->nama }}</td>
                                        <td>{{ $row->pembimbing_sekolah->perusahaan->nama }}</td>
                                        <td>{{ $row->pembimbing_sekolah->jurusan->nama }}</td>
                                        <td>{{ count($row->pembimbing_sekolah->siswa) }}</td>
                                        <td><a href="{{ route('menu.kakomli.pembimbing.show',$row->id) }}" class="btn blue">Pemilihan Pembimbing</a></td>
                                        @else
                                        <td>Profile Belum Lengkap</td>
                                        @endisset
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-action">
                        <p>{{ $pembimbing_sekolah->links() }}</p>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card hoverable">
                    <div class="card-action">
                        <p>Pembimbibng Industri</p>
                    </div>
                    <div class="card-content">

                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="black white-text">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($pembimbing_industri as $row)
                                    <tr>
                                    @isset($row->pembimbing_industri->nama)
                                        <td>{{ $row->pembimbing_industri->nama }}</td>
                                        <td>{{ $row->pembimbing_industri->perusahaan->nama }}</td>
                                        <td>{{ $row->pembimbing_industri->jurusan->nama }}</td>
                                        @else
                                        <td>Profile Belum Lengkap</td>
                                    @endisset
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-action">
                        <p>{{ $pembimbing_industri->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
