@extends('layouts.app')
@section('content')
@section('bread', 'User')
@push('bread')
<li class="active">User</li>
@endpush
<div class="container">
    <div id="responsive-table">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-action">
                        <div class="form-btn">
                            <a href="{{ route('menu.admin.user.create') }}" class="waves-effect waves-light btn blue darken-2"><i class="material-icons right">add</i>Add</a>
                            <a href="{{ route('menu.admin.user.export') }}" class="btn yellow darken-2"><i class="material-icons right">file_download</i>Export</a>
                            <a class="btn dropdown-settings waves-effect waves-light orange darken-2 breadcrumbs-btn" href="#!" data-activates="dropdown1">
                                <span class="hide-on-small-onl"></span>
                                <i class="material-icons right">settings</i>
                                Filter
                            </a>
                            <ul id="dropdown1" class="dropdown-content">
                                <li><a href="{{ route('menu.admin.user.role', 'all' ) }}" class="grey-text text-darken-2">All</a>
                                </li>
                                <li><a href="{{ route('menu.admin.user.role', 'kakomli' ) }}" class="grey-text text-darken-2">Ketua Kompetensi Keahlian</a>
                                </li>
                                <li><a href="{{ route('menu.admin.user.role', 'pembimbing_industri' ) }}" class="grey-text text-darken-2">Pembimbing Industri</a>
                                </li>
                                <li><a href="{{ route('menu.admin.user.role', 'pembimbing_sekolah' ) }}" class="grey-text text-darken-2">Pembimbing Sekolah</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="responsive-table highlight centered borderless">
                            <thead class="grey darken-4 white-text">
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
                                    <td>
                                        <div class="form-btn">
                                            <!-- <a href="{{ route('menu.admin.user.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">edit</i></a> -->
                                            <button onclick="deleteUser('{{$data->id}}')" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button>
                                        </div>
                                    </td>
                                    <form method="post" id="DeleteUser{{$data->id}}" action="{{ route('menu.admin.user.destroy', $data->id) }}">
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
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>
@endsection
