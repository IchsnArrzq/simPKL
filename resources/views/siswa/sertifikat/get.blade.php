@extends('layouts.app')

@section('content')

@section('bread', 'Sertifikat')
@push('bread')
<li class="active">Sertifikat</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">

            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-content">

                    <img src="{{ asset('sertifikat/'.$siswa->judul) }}" alt="">
                    <a target="_blank" class="btn waves-effect waves-light red" href="{{ asset('sertifikat/'.$siswa->judul) }}">File</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
