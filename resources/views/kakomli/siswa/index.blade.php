@extends('layouts.app')
@section('content')
@section('bread', 'Siswa')
@push('bread')
<li class="active">Siswa</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">

                    <div class="card-content">

                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="black white-text">
                                    <tr>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Tingkat</th>
                                        <th>Pembimbing Sekolah</th>
                                        <th>Pembimbing Industri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @forelse($siswa as $data)
                                    <tr>
                                        <td>{{ $data->nis }}</td>
                                        <td>{{ $data->nama}}</td>
                                        @isset($data->jurusan->nama)
                                        <td>{{ $data->jurusan->nama}}</td>
                                        <td>{{ $data->tingkat}} </td>
                                        @else
                                        <td>Belum Di isi</td>
                                        <td>Belum Di isi</td>
                                        @endisset
                                        @isset($data->pembimbing_sekolah->nama)
                                        <td>{{ $data->pembimbing_sekolah->nama}}</td>
                                        @else
                                        <td>Belum Di isi</td>
                                        @endisset
                                        @isset($data->pembimbing_industri->nama)
                                        <td>{{ $data->pembimbing_industri->nama}}</td>
                                        @else
                                        <td>Belum Di isi</td>
                                        @endisset
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
