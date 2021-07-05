@extends('layouts.app')

@section('content')

@section('bread','Perusahaan')
@push('bread')
<li class="active">Perusahaan</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-action">
                        <h4 class="header"><a href="{{ route('menu.admin.perusahaan.create') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New perusahaan"><i class="material-icons right">add</i></a></h4>

                    </div>
                    <div class="card-content">

                        <table class="responsive-table highlight centered bordered">
                            <thead class="black white-text">
                                <tr>
                                    <th>No</th>
                                    <th>Perusahaan</th>
                                    <th>Kota</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            @php
                            $no = 1;
                            @endphp
                            <tbody>
                                @foreach($perusahaan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->kota }}</td>
                                    <!-- <td>{{ \Carbon\Carbon::parse($data->long_time)->diffForHumans() }}</td> -->
                                    <td>
                                        <div class="form-btn">
                                            <a href="{{ route('menu.admin.perusahaan.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">edit</i></a>
                                            <button onclick="deleteUser()" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button>
                                        </div>
                                    </td>
                                    <form method="post" id="DeleteUSer" action="{{ route('menu.admin.perusahaan.destroy',$data->id) }}">
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
