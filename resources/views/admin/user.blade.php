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
                    <h5 class="breadcrumbs-title">User</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">User</li>
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

<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header"><a class="waves-effect waves-light btn"><i class="material-icons right">add</i> Add</a></h4>
        <div class="row">

            <div class="col s12">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-field="id">Name</th>
                            <th data-field="name">Email</th>
                            <th data-field="password">Password</th>
                            <th data-field="role">Role</th>
                            <th data-field="option" colspan="2">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->password }}</td>
                            <td>{{ $data->role }}</td>
                            <td><a href="" class="waves-effect waves-light btn yellow">Edit</a></td>
                            <td><a href="" class="waves-effect waves-light btn red">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
