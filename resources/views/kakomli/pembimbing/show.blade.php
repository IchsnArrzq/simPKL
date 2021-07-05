@extends('layouts.app')

@section('content')
@section('bread','pembimbing')
@push('bread')
<li><a href="{{ route('menu.kakomli.pembimbing.index') }}">pembimbing</a></li>
<li class="active">Pembimbing</li>
@endpush
<div class="container">
    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-action">
                    <p>Pembimbing Sekolah</p>
                </div>
                <div class="card-content">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Perusahaan</th>
                            <th>Jurusan</th>
                            <th>Banyak Siswa</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                @isset( $user->pembimbing_sekolah)
                                <td>{{ $user->pembimbing_sekolah->nama }}</td>
                                <td>{{ $user->pembimbing_sekolah->perusahaan->nama }}</td>
                                <td>{{ $user->pembimbing_sekolah->jurusan->nama }}</td>
                                <td>{{ $user->pembimbing_sekolah->siswa->count() }}</td>
                                @endisset
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Tingkat</th>
                                <th>List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('menu.kakomli.pembimbing.update.siswa',$user->pembimbing_sekolah->id) }}" method="post">
                                @csrf
                                @method('put')
                                @foreach($siswa_pembimbing as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    @isset($data->jurusan->nama)
                                    <td>{{ $data->jurusan->nama}}</td>
                                    <td>{{ $data->tingkat}} </td>
                                    @else
                                    <td>Belum isi</td>
                                    <td>Belum isi</td>
                                    @endisset
                                    <td>
                                        <input type="checkbox" id="{{ $data->id }}" name="id[]" value="{{ $data->id }}" />
                                        <label for="{{ $data->id }}">
                                            Pilih
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><button type="submit" class="btn blue">Update</button></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-action">
                    <p>Siswa yang belum ada pembimbing sekolah</p>
                </div>
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Tingkat</th>
                                <th>List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('menu.kakomli.pembimbing.update',$user->pembimbing_sekolah->id) }}" method="post">
                                @csrf
                                @method('put')
                                @foreach($siswa as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    @isset($data->jurusan->nama)
                                    <td>{{ $data->jurusan->nama}}</td>
                                    <td>{{ $data->tingkat}} </td>
                                    @endisset
                                    @isset($data->pembimbing_sekolah->nama)
                                    <td>{{ $data->pembimbing_industri->nama}}</td>
                                    <td>{{ $data->pembimbing_sekolah->nama}}</td>
                                    @endisset
                                    <td>
                                        <input type="checkbox" id="{{ $data->id }}" name="id[]" value="{{ $data->id }}" />
                                        <label for="{{ $data->id }}">
                                            Pilih
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><button type="submit" class="btn blue">Update</button></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
