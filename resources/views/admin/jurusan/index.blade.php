@extends('layouts.app')

@section('content')
@section('bread', 'Jurusan')
@push('bread')
<li class="active">Jurusan</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">

            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-action">
                        <h4 class="header"><a href="{{ route('menu.admin.jurusan.create') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New jurusan"><i class="material-icons right">add</i></a></h4>

                    </div>
                    <div class="card-content">
                        <table class="responsive-table highlight centered bordered">
                            <thead class="black white-text">
                                <tr>
                                    <th>#</th>
                                    <th data-field="jurusan">jurusan</th>
                                    <th data-field="option">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                                @foreach($jurusan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <!-- <td>{{ \Carbon\Carbon::parse($data->long_time)->diffForHumans() }}</td> -->
                                    <td><button onclick="deleteUser('{{$data->id}}')" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button></td>
                                    <form method="post" id="DeleteUser{{$data->id}}" action="{{ route('menu.admin.jurusan.destroy',$data->id) }}">
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
