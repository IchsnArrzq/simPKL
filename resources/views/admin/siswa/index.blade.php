@extends('layouts.app')
@section('content')

@section('bread', 'Siswa')
@push('bread')
<li class="active">Siswa</li>
@endpush

<div class="container">
    <div class="divider"></div>
    <div class="row">
        <div class="col s12">
            <div id="responsive-table">
                <div class="card hoverable">
                    <div class="card-action">
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <form action="{{ route('menu.admin.siswa.import') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>File </span>
                                            <input type="file" name="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-red btn red darken-2">Close</a>
                                <button class="btn waves-effect waves-green green darken-2">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="form-btn">
                            <a href="{{ route('menu.admin.siswa.create') }}" class="waves-effect waves-light btn blue darken-2"><i class="material-icons right">add</i>Add</a>
                            <a href="#modal1" class="btn green darken-2  modal-trigger"><i class="material-icons right">file_upload</i>Import</a>
                            <a href="{{ route('menu.admin.user.export') }}" class="btn yellow darken-2"><i class="material-icons right">file_download</i>Export</a>

                        </div>
                    </div>
                    <div class="card-content">
                        <table class="responsive-table highlight centered borderless">
                            <thead class="grey darken-4 white-text">
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th colspan="2">Option</th>
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
                                            <a href="{{ route('menu.admin.siswa.show',$data->id) }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">visibility</i></a>
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
