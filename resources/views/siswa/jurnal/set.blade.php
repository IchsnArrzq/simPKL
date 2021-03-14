@extends('layouts.app')

@section('content')
<section id="content">
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Jurnal Siswa</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">{{ request()->path() }}</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">

                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="divider"></div>
    <div class="row">
        <div class="col s10">
            <div class="card hoverable">
                <div class="card-action">
                    <a href="{{ route('menu.siswa.jurnal.get') }}">
                        <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                            <i class="material-icons right">keyboard_return</i>
                        </button>
                    </a>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field">
                                <i class="material-icons prefix">perm_identity</i>
                                <label for="divisi">Divisi</label>
                                <input type="text" name="divisi" class="validate" id="divisi" data-length="80">
                                @error('divisi')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="input-field">
                                <i class="material-icons prefix">date_range</i>
                                <input type="date" name="tanggal">
                                @error('tanggal')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col s4">
                            <div class="input-field">
                                <i class="material-icons prefix">access_time</i>
                                <input type="time" name="mulai">
                                <label for="">Mulai</label>
                                @error('mulai')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="input-field">
                                <i class="material-icons prefix">timer</i>
                                <input type="time" name="selesai">
                                @error('selesai')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field">
                                <i class="material-icons prefix">insert_comment</i>
                                <textarea class="materialize-textarea" name="kegiatan" data-length="120"></textarea>
                                <label for="">Kegiatan</label>
                                @error('kegiatan')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <i class="material-icons prefix">flag</i>
                                <textarea class="materialize-textarea" name="hasil" data-length="120"></textarea>
                                <label for="">Hasil</label>
                                @error('hasil')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field">
                                <i class="material-icons prefix">text_format</i>
                                <textarea class="materialize-textarea" name="keterangan" data-length="120"></textarea>
                                <label for="">Keterangan</label>
                                @error('keterangan')
                                <strong class="red-text">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
