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
                    <blockquote>
                        <h5 class="breadcrumbs-title">Table User</h5>
                        <ol class="breadcrumbs">
                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="active">User</li>
                        </ol>
                    </blockquote>
                </div>
                <div class="col s2 m6 l6">

                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12 m7 l7">
                <div class="card hoverable">
                    <div class="card-action">
                        <a href="{{ route('menu.admin.account.create') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New User"><i class="material-icons right">add</i></a>
                        <a class="btn dropdown-settings waves-effect waves-light grey darken-2 breadcrumbs-btn right" href="#!" data-activates="dropdown1">
                            <span class="hide-on-small-onl"></span>
                            <i class="material-icons right">settings</i>
                        </a>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="{{ route('menu.admin.account.role', 'all' ) }}" class="grey-text text-darken-2">All</a>
                            </li>
                            <li><a href="{{ route('menu.admin.account.role', 'siswa' ) }}" class="grey-text text-darken-2">Siswa</a>
                            </li>
                            <li><a href="{{ route('menu.admin.account.role', 'kkk' ) }}" class="grey-text text-darken-2">Ketua Kompetensi Keahlian</a>
                            </li>
                            <li><a href="{{ route('menu.admin.account.role', 'ppkl' ) }}" class="grey-text text-darken-2">Pembimbing PKL</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <table class="responsive-table highlight centered bordered">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th data-field="name">Email</th>
                                    <th data-field="role">Role</th>
                                    <th data-field="option" colspan="2">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse($user as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td><a href="{{ route('menu.admin.account.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">edit</i></a></td>
                                    <td><button onclick="deleteUser('{{$data->id}}')" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button></td>
                                    <form method="post" id="DeleteUser{{$data->id}}" action="{{ route('menu.admin.account.destroy', $data->id) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <script>
                                        function deleteUser(id) {
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
                                                        document.getElementById(`DeleteUser${id}`).submit();
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
                    <div class="card-action">
                        <p>{{ $user->links() }}</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 l5">
                <ul class="collapsible popout">
                    <li>
                        <div class="collapsible-header">

                            <h4>Role User</h4>

                        </div>
                        <div class="collapsible-body">
                            <h5>Description</h5>
                            <p>kkk (Ketua Kompetensi Keahlian)</p>
                            <p>ppkl (Pembimbing PKL)</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">person</i>Siswa</div>
                        <div class="collapsible-body"><span>Siswa Yang Sedang Menjalankan PKL</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">person</i>Ketua Komptensi Keahlian</div>
                        <div class="collapsible-body"><span>Ketua Jurusan</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">person</i>Pembimbing PKL</div>
                        <div class="collapsible-body"><span>Guru / Pembimbing di PKL</span></div>
                    </li>
                </ul>
                <!-- <ul id="issues-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                        <i class="material-icons red accent-2 circle">card_travel</i>
                        <h5 class="collection-header m-0">Role User</h5>
                        <p>Level</p>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red white-text">person</i>
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title">
                                    <strong>Siswa</strong>
                                </p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat deep-orange accent-2">{{ $meanSiswa }}</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                    <div class="determinate" style="width: {{ $meanSiswa }}%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue white-text">person</i>
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title">
                                    <strong>Pembimbing PKL</strong>
                                </p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat cyan">{{ $meanPpkl }}</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                    <div class="determinate" style="width: {{ $meanPpkl }}%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle green white-text">person</i>
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title">
                                    <strong>Ketua Kompetensi Keahlian</strong>
                                </p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat cyan">{{ $meanKkp }}</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                    <div class="determinate" style="width: {{ $meanKkp }}%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
@endsection
