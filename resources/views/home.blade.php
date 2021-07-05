@extends('layouts.app')
@section('content')
@if(auth()->user()->role == 'admin')
@section('bread', 'Admin')
@push('bread')
<li class="active">Admin</li>
@endpush
<div class="card">

</div>
@endif
@if(auth()->user()->role === 'kakomli')
@section('bread', 'Kakomli')
@push('bread')
<li class="active">Kakomli</li>
@endpush
<div class="container">
    <div class="row">
        <div class="col s6">
            <div class="card">
                <div class="card-content row">
                    @isset($user->kakomli)
                    <form action="{{ route('menu.kakomli.profile.update',$user->kakomli->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group col s6">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->kakomli->nama }}">

                            @error('nama')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col s6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id">
                                @foreach($jurusan as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-btn">
                            <button class="btn green">Submit</button>
                        </div>

                    </form>
                    @endisset
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content row">
                    @isset($user->kakomli->jurusan)
                    <table>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th>{{ $user->kakomli->nama }}</th>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <th>{{ $user->kakomli->jurusan->nama }}</th>
                        </tr>
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->role == 'pembimbing_sekolah')
@section('bread', 'Pembimbing Sekolah')
@push('bread')
<li class="active">Pembimbing Sekolah</li>
@endpush
<div class="container">
    <div class="row">
        <div class="col s6">
            <div class="">
                <div class="card-content row">
                    @isset($user->pembimbing_sekolah)
                    <form action="{{ route('menu.pembimbing_sekolah.profile.update',$user->pembimbing_sekolah->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group col s6">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->pembimbing_sekolah->nama }}">

                            @error('nama')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col s6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id">
                                @foreach($jurusan as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col s6">
                            <label for="perusahaan">Perusahaan</label>
                            <select name="perusahaan_id" id="perusahaan_id">
                                @foreach($perusahaan as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('perusahaan_id')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-btn">
                            <button class="btn green">Submit</button>
                        </div>

                    </form>
                    @endisset
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content row">
                    @isset($user->pembimbing_sekolah->jurusan)
                    <table>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->nama }}</th>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->jurusan->nama }}</th>
                        </tr>
                        <tr>
                            <th>Perusahaan</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->perusahaan->nama }}</th>
                        </tr>
                        @isset($user->pembimbing_sekolah->perusahaan->periode->mulai)
                        <tr>
                            <th>mulai</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->perusahaan->periode->mulai }}</th>
                        </tr>
                        <tr>
                            <th>selesai</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->perusahaan->periode->selesai }}</th>
                        </tr>
                        <tr>
                            <th>Tahun Pelajaran</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->perusahaan->periode->tahun_pelajaran }}</th>
                        </tr>
                        <tr>
                            <th>Angkatan</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_sekolah->perusahaan->periode->angkatan }}</th>
                        </tr>
                        @else
                        <tr>
                            <th>
                                <h3 class="red-text">Tidak Ada di periode</h3>
                            </th>
                        </tr>
                            @endisset
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role == 'pembimbing_industri')
@section('bread', 'pembimbing industri')
@push('bread')
<li class="active">pembimbing industri</li>
@endpush
<div class="container">
    <div class="row">
        <div class="col s6">
            <div class="">
                <div class="card-content row">
                    @isset($user->pembimbing_industri)
                    <form action="{{ route('menu.pembimbing_industri.profile.update',$user->pembimbing_industri->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group col s6">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->pembimbing_industri->nama }}">

                            @error('nama')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col s6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id">
                                @foreach($jurusan as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col s6">
                            <label for="perusahaan">Perusahaan</label>
                            <select name="perusahaan_id" id="perusahaan_id">
                                @foreach($perusahaan as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('perusahaan_id')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-btn">
                            <button class="btn green">Submit</button>
                        </div>

                    </form>
                    @endisset
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content row">
                    @isset($user->pembimbing_industri->jurusan)
                    <hr>
                    <table>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->nama }}</th>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->jurusan->nama }}</th>
                        </tr>
                        <tr>
                            <th>Perusahaan</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->perusahaan->nama }}</th>
                        </tr>
                        @isset($user->pembimbing_industri->perusahaan->periode->mulai)
                        <tr>
                            <th>mulai</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->perusahaan->periode->mulai }}</th>
                        </tr>
                        <tr>
                            <th>selesai</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->perusahaan->periode->selesai }}</th>
                        </tr>
                        <tr>
                            <th>Tahun Pelajaran</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->perusahaan->periode->tahun_pelajaran }}</th>
                        </tr>
                        <tr>
                            <th>Angkatan</th>
                            <th>:</th>
                            <th>{{ $user->pembimbing_industri->perusahaan->periode->angkatan }}</th>
                        </tr>
                        @else
                        <tr>
                            <th>
                                <h3 class="red-text">Tidak Ada di periode</h3>
                            </th>
                        </tr>
                        @endisset
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
