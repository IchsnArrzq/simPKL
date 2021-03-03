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
                        <li><a href="{{ route('menu.admin.account.role', 'all' ) }}" class="grey-text text-darken-2">All</a>
                        </li>
                        <li><a href="{{ route('menu.admin.account.role', 'Siswa' ) }}" class="grey-text text-darken-2">Siswa</a>
                        </li>
                        <li><a href="{{ route('menu.admin.account.role', 'PembimbingPKL' ) }}" class="grey-text text-darken-2">Pembimbing PKL</a>
                        </li>
                        <li><a href="{{ route('menu.admin.account.role', 'PembimbingIndustri' ) }}" class="grey-text text-darken-2">Pembimbing Industri</a>
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
        <h4 class="header"><a href="{{ route('menu.admin.account.create') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New User"><i class="material-icons right">add</i> Add</a></h4>
        <div class="row">

            <div class="col s12">
                <table class="responsive-table">
                    <thead class="#ec407a pink lighten-1 white-text">
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
                        @forelse($user as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td><button class="waves-effect waves-light btn tooltipped" data-position="bottom" data-tooltip="{{ $data->password }}"><i class="material-icons right">lock</i>Encrypt</button></td>
                            <td>{{ $data->role }}</td>
                            <td><a href="{{ route('menu.admin.account.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?">Edit</a></td>
                            <td><button onclick="deleteUser()" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?">Delete</button></td>
                            <form method="post" id="DeleteUSer" action="{{ route('menu.admin.account.destroy',$data->id) }}">
                                @csrf
                                @method('delete')
                            </form>
                            <script>
                                function deleteUser() {
                                    swal({
                                            title: "Are you sure?",
                                            text: "Once deleted, you will not be able to recover this imaginary file!",
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                event.preventDefault();
                                                document.getElementById('DeleteUSer').submit();
                                            } else {
                                                swal("okay :)");
                                            }
                                        });
                                }
                            </script>
                            @empty
                            <td colspan="7">
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
@endsection
