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
                    <h5 class="breadcrumbs-title">Create New User</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">{{ request()->path() }}</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-activates="dropdown1">
                        <i class="material-icons hide-on-med-and-up">settings</i>
                        <span class="hide-on-small-onl">Settings</span>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="#!" class="grey-text text-darken-2">All</a>
                        </li>
                        <li><a href="#!" class="grey-text text-darken-2">Siswa</a>
                        </li>
                        <li><a href="#!" class="grey-text text-darken-2">Pembimbing</a>
                        </li>
                        <li><a href="#!" class="grey-text text-darken-2">Instruktur</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            @include('admin.partials.userForm')
        </div>
    </div>
</form>

@endsection
