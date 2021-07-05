@extends('layouts.app')

@section('content')
@section('bread', 'Periode')
@push('bread')
<li class="active">Periode</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">

            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-action">
                        <h4 class="header"><a href="{{ route('menu.admin.periode.create') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New periode"><i class="material-icons right">add</i></a></h4>

                    </div>
                    <div class="card-content">
                        <table class="responsive-table highlight centered bordered">
                            <thead class="black white-text">
                                <tr>
                                    <th>No</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Tahun Pelajaran</th>
                                    <th>Angkatan</th>
                                    <th>Jumlah Perusahaan</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($periode as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->mulai }}</td>
                                    <td>{{ $data->selesai }}</td>
                                    <td>{{ $data->tahun_pelajaran }}</td>
                                    <td>{{ $data->angkatan }}</td>
                                    <td>{{ count($data->perusahaan) }}</td>
                                    <!-- <td>{{ \Carbon\Carbon::parse($data->long_time)->diffForHumans() }}</td> -->
                                    <td>
                                        <div class="form-btn">
                                            <a href="{{ route('menu.admin.periode.show',$data->id) }}" class="waves-effect waves-light btn blue darken-2 "><i class="material-icons right">visibility</i></a>
                                            <a href="{{ route('menu.admin.periode.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">edit</i></a>
                                            <button onclick="deleteUser('{{$data->id}}')" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button>
                                        </div>
                                    </td>

                                    <form method="post" id="DeleteUser{{$data->id}}" action="{{ route('menu.admin.periode.destroy',$data->id) }}">
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
