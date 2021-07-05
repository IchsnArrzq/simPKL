@extends('layouts.app')

@section('content')

@section('bread', 'Siswa')
@push('bread')
<li><a href="{{ route('menu.admin.siswa.index') }}">Siswa</a></li>
<li class="active">Siswa</li>
@endpush
<div class="container">
    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-content">
                    <table>
                        <tr>
                            <th>Username</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Nis</th>
                            <td>{{ $user->siswa->nis }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->siswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>Pembimbing Industri Id</th>
                            <td>{{ $user->siswa->pembimbing_industri_id }}</td>
                        </tr>
                        <tr>
                            <th>Pembimbing Sekolah Id</th>
                            <td>{{ $user->siswa->pembimbing_sekolah_id }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
