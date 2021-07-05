@extends('layouts.app')

@section('content')
@section('bread','Perusahaan')
@push('bread')
<li><a href="{{ route('menu.admin.perusahaan.index') }}">Perusahaan</a></li>
<li class="active">Edit</li>
@endpush
<form action="{{ route('menu.admin.perusahaan.update',$perusahaan->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col s12 m12 l12">
            <main id="app">
                @include('admin.partials.perusahaan-form')
            </main>
        </div>
    </div>
</form>
@endsection
