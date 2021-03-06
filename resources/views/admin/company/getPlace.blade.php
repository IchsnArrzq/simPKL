@extends('layouts.app')

@section('content')
<div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
    </div>
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">Management Place Student</h5>
                <ol class="breadcrumbs">
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active">{{ request()->path() }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="divider"></div>
    <div id="work-collections">
        <div class="row">
            <div class="col s12 m12 l6">
                <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                        <i class="material-icons cyan circle">card_travel</i>
                        <h6 class="collection-header m-0">Company list</h6>
                        <p>Region Place Company</p>
                    </li>
                    @foreach($company as $data)
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s9">
                                <p class="collections-title">{{ $data->company }}</p>
                                <p class="collections-content">{{ $data->region }}</p>
                            </div>
                            <div class="col s3">
                                <span class="task-cat cyan">Development</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col s12 m12 l6">
                <ul id="issues-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                        <i class="material-icons red accent-2 circle">account_circle</i>
                        <h6 class="collection-header m-0">Issues</h6>
                        <p>Assigned to you</p>
                    </li>
                    @foreach($company as $data)
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title">
                                    <strong>#102</strong> Home Page
                                </p>
                                <p class="collections-content">Web Project</p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat deep-orange accent-2">P1</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                    <div class="determinate" style="width: 70%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
