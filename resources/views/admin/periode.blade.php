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
                    <h5 class="breadcrumbs-title">periode</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">periode</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">

            <div class="col s7">
                <div class="card hoverable">
                    <div class="card-action">
                        <h4 class="header"><a href="{{ route('menu.admin.periode.create') }}" class="waves-effect waves-light btn blue darken-2 tooltipped" data-position="top" data-tooltip="Add New periode"><i class="material-icons right">add</i></a></h4>

                    </div>
                    <div class="card-content">
                        <table class="responsive-table highlight centered bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-field="periode">mulai</th>
                                    <th>selesai</th>
                                    <th>lama waktu</th>
                                    <th>status</th>
                                    <th data-field="option">Option</th>
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
                                    <td>{{ \Carbon\Carbon::parse($data->lama_waktu)->diffForHumans() }}</td>
                                    <td>{{ $data->status }}</td>

                                    <!-- <td>{{ \Carbon\Carbon::parse($data->long_time)->diffForHumans() }}</td> -->
                                    <td><a href="{{ route('menu.admin.periode.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?"><i class="material-icons right">edit</i></td>
                                    </a></td>
                                    <td><button onclick="deleteUser('{{$data->id}}')" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?"><i class="material-icons right">delete</i></button></td>

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
