@extends('layouts.app')

@section('content')
@section('bread','Periode')
@push('bread')
<li><a href="{{ route('menu.admin.periode.index') }}">Periode</a></li>
<li class="active">Show</li>
@endpush
<div class="container">
    <div class="row">
        <div class="col s3">
            <div class="card">
                <div class="card-content">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>:</th>
                            <th>{{ $periode->id }}</th>
                        </tr>
                        <tr>
                            <th>Mulai</th>
                            <th>:</th>
                            <th>{{ $periode->mulai }}</th>
                        </tr>
                        <tr>
                            <th>Selesai</th>
                            <th>:</th>
                            <th>{{ $periode->selesai }}</th>
                        </tr>
                        <tr>
                            <th>Tahun Pelajaran</th>
                            <th>:</th>
                            <th>{{ $periode->tahun_pelajaran }}</th>
                        </tr>
                        <tr>
                            <th>Angkatan</th>
                            <th>:</th>
                            <th>{{ $periode->angkatan }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card">
                <div class="card-action">
                <h5>Perusahaan Terdaftar di Periode Ini</h5>
                </div>
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Perusahaan</th>
                                <th>Kota</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($perusahaan as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kota }}</td>
                                <td><a href="{{ route('menu.admin.periode.hapus',$data->id) }}" class="btn">Hapus</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card">
                <div class="card-action">
                    <h5>Perusahan Yang Belum Terdaftar Di Periode</h5>
                </div>
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Perusahaan</th>
                                <th>Kota</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($perusahaan_null as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kota }}</td>
                                <td><a href="{{ route('menu.admin.periode.pilih',[$data->id,$periode->id]) }}" class="btn">Pilih</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
