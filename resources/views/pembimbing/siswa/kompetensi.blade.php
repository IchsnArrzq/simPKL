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
                    <h5 class="breadcrumbs-title">Update User</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">{{ request()->path() }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($nilai as $data)
<form action="{{ route('menu.pembimbing.set.kompetensi',$data->id) }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            <main id="app">
                <div class="row">
                    <div class="col s12 m8 l8 offset-m2 offset-l2">

                        <div class="card hoverable">
                            <div class="card-action">

                            </div>
                            <div class="card-content">

                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input placeholder="John Doe" id="name2" name="nilai" type="text">
                                    <label for="first_name">nilai</label>
                                    @error('nilai')
                                    <strong class="red-text">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <br>
                                <br>

                            </div>
                            <div class="card-action">
                                <button class="btn waves-effect waves-light red" type="submit" name="action">
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>
</form>
@endforeach
@endsection
