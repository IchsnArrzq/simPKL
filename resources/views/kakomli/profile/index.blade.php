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
                    <h5 class="breadcrumbs-title">Profile kakomli</h5>
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
    <div class="row">
        <div class="col s8">
            <div class="card hoverable">
                <form action="{{ route('menu.kakomli.profile.update', $kakomli->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-content">
                        <div class="row">

                            <div class="col s6">
                                <div class="input-field">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <select name="jurusan_id" id="jurusan_id">
                                        @foreach($jurusan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="jurusan_id">Jurusan</label>
                                    @error('jurusan_id')
                                    <strong class="red-text">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <i class="material-icons prefix">cake</i>
                                    <input type="date" name="ttl" value="{{ $kakomli->ttl }}" id="ttl">
                                    @error('ttl')
                                    <strong class="red-text">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input placeholder="John Doe" id="name2" value="{{ $kakomli->nama ?? ''}}" name="nama" type="text">
                                    <label for="first_name">Name</label>
                                    @error('nama')
                                    <strong class="red-text">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn waves-effect waves-light red" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col s12 m4 l4">
            <div id="profile-card" class="card hoverable">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset('template/images/gallary/3.png') }}" alt="user bg">
                </div>
                <div class="card-content">
                    <img src="{{ asset('template/images/avatar/avatar-7.png') }}" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
                    <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                    </a>
                    <span class="card-title activator grey-text text-darken-4">{{$kakomli->nama }}</span>
                    <p>
                        <i class="material-icons">perm_identity</i> {{ auth()->user()->role }}
                    </p>
                    <p>
                        <i class="material-icons">person_pin</i> {{ $kakomli->no_kakomli }}
                    </p>
                    <p>
                        <i class="material-icons">email</i> {{ auth()->user()->email }}
                    </p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Roger Waters
                        <i class="material-icons right">close</i>
                    </span>
                    <p>Here is some more information about this card.</p>
                    <p>
                        <i class="material-icons">perm_identity</i> {{ $kakomli->jurusan->nama ?? 'belum ada jurusan' }}
                    </p>
                    <p>
                        <i class="material-icons">email</i> {{ auth()->user()->email }}
                    </p>
                    <p>
                        <i class="material-icons">cake</i> {{ $kakomli->ttl }}
                    </p>
                    <p>
                    </p>
                    <p>
                        <i class="material-icons">airplanemode_active</i> {{ $kakomli->status }}
                    </p>
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
