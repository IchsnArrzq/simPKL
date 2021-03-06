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
                    <h5 class="breadcrumbs-title">Company</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">Company</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header"><a href="{{ route('menu.admin.company.create') }}" class="waves-effect waves-light btn  tooltipped" data-position="top" data-tooltip="Add New Company"><i class="material-icons right">add</i> Add</a></h4>
        <div class="row">

            <div class="col s12">
                <table class="responsive-table">
                    <thead class="#ec407a pink lighten-1 white-text">
                        <tr>
                            <th>#</th>
                            <th data-field="Company">Company</th>
                            <th data-field="Region">Region</th>
                            <th data-field="Start Date">Start Date</th>
                            <th data-field="Finish Date">Finish Date</th>
                            <th data-field="Long Time">Long Time</th>
                            <th data-field="option" colspan="2">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->company }}</td>
                            <td>{{ $data->region }}</td>
                            <td>{{ $data->start_date }}</td>

                            <td>{{ $data->finish_date }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->long_time)->diffForHumans() }}</td>

                            <td><a href="{{ route('menu.admin.company.edit',$data->id) }}" class="waves-effect waves-light btn yellow darken-2 tooltipped" data-position="top" data-tooltip="Edit {{ $data->name }}?">Edit</a></td>
                            <td><button onclick="deleteUser()" class="waves-effect waves-light btn red darken-2 tooltipped" data-position="top" data-tooltip="Delete {{ $data->name }}?">Delete</button></td>
                            <form method="post" id="DeleteUSer" action="{{ route('menu.admin.company.destroy',$data->id) }}">
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
        </div>
    </div>
</div>
@endsection
