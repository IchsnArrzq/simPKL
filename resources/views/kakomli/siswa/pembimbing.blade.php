@extends('layouts.app')

@section('content')
@section('bread','pembimbing')
@push('bread')
<li><a href="{{ route('menu.kakomli.siswa.index') }}">Siswa</a></li>
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
                            @foreach($pembimbing_sekolah as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                @isset( $data->pembimbing_sekolah)
                                <td>{{ $data->pembimbing_sekolah->nama }}</td>
                                <td>{{ $data->pembimbing_sekolah->perusahaan->nama }}</td>
                                <td>{{ $data->pembimbing_sekolah->jurusan->nama }}</td>
                                <td>{{ $data->pembimbing_sekolah->siswa->count() }}</td>
                                @endisset
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-action">
                    <h5>Siswa yang</h5>
                </div>
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Tinkat</th>
                                <th>List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('menu.kakomli.pembimbing.update') }}" method="post">
                            @csrf
                                @foreach($siswa as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jurusan->nama }}</td>
                                    <td>{{ $data->tingkat }}</td>
                                    <td>
                                        <input type="checkbox" id="{{ $data->id }}" name="id[]" value="{{ $data->id }}"/>
                                        <label for="{{ $data->id }}">
                                            Pilih
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><button type="submit">Update</button></td>
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
