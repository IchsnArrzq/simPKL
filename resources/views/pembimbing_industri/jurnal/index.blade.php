@extends('layouts.app')
@section('content')
@section('bread', 'Jurnal')
@push('bread')
<li class="active">Jurnal</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-action">
                        Jurnal Siswa
                    </div>
                    <div class="card-content">

                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="black white-text">
                                    <tr>
                                        <th>divisi</th>
                                        <th>tanggal</th>
                                        <th>mulai</th>
                                        <th>selesai</th>
                                        <th>kegiatan</th>
                                        <th>hasil</th>
                                        <th>keterangan</th>
                                        <th>Waktu Di Buat Jurnal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @forelse($jurnal as $data)
                                    <tr>
                                        <td>{{ $data->divisi }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->mulai }}</td>
                                        <td>{{ $data->selesai }}</td>
                                        <td>{{ $data->kegiatan }}</td>
                                        <td>{{ $data->hasil }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ $data->created_at }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
