@extends('layouts.app')
@section('content')
@section('bread', 'perusahaan')
@push('bread')
<li class="active">perusahaan</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">

                    <div class="card-content">

                        <div class="responsive-table">
                            <table class="highlight centered bordered">
                                <thead class="black white-text">
                                    <tr>
                                    <th>No</th>
                                    <th>Perusahaan</th>
                                    <th>Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @forelse($perusahaan as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->kota }}</td>

                                        @empty
                                        <td colspan="9">
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
                    <div class="card-action">
                        <p>{{ $perusahaan->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
