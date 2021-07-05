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
                    <form action="{{ route('menu.pembimbing_industri.sertifikat.store',$siswa->id) }}" method="post" enctype="multipart/form-data">
                        <div class="card-action">
                            <h5>Sertifikat Untuk {{ $siswa->nama }}</h5>
                            @isset($siswa->sertifikat)
                            <a target="_blank" href="{{ asset('sertifikat/'.$siswa->sertifikat->judul) }}">{{ $siswa->sertifikat->judul }}</a>
                            <a href="{{ route('menu.pembimbing_industri.sertifikat.delete', $siswa->sertifikat->id) }}" class="btn red">Delete</a>
                            @endisset
                        </div>
                        <div class="card-content">
                            @csrf
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="sertifikat" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn waves-effect waves-light red" type="submit" name="action">
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
