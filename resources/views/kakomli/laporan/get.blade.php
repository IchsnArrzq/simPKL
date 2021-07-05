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
                    <h5 class="breadcrumbs-title">Jurnal Siswa</h5>
                    <ol class="breadcrumbs">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">{{ request()->path() }}</li>
                    </ol>
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

            <div class="col s12">
                <div class="card hoverable">

                    <div class="card-content">

                        <table class="responsive-table highlight centered bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-field="file">file</th>
                                    <th data-field="siswa">siswa</th>
                                    <th data-field="option">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($laporan as $data)
                                <td>{{ $no++ }}</td>
                                <td><a target="_blank" class="btn waves-effect waves-light red" href="{{ asset('laporanSiswa/'.$data->laporan) }}">File</a></td>
                                <td>{{ $data->siswa->nama }}</td>
                                <form method="post" id="DeleteLaporan{{$data->id}}" action="{{ route('menu.siswa.laporan.delete', $data->id) }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                @endforeach
                                <script>
                                    function deleteLaporan(id) {
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
                                                    document.getElementById(`DeleteLaporan${id}`).submit();
                                                } else {
                                                    swal("okay :)");
                                                }
                                            });
                                    }
                                </script>
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
