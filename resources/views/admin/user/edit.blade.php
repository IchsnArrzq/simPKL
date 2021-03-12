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
<form action="{{ route('menu.admin.user.update',$user->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col s12 m12 l12">
            <main id="app">
                @include('admin.partials.userForm')
            </main>
        </div>
    </div>
</form>
@endsection
