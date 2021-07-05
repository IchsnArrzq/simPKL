@extends('layouts.app')

@section('content')
@section('bread','Perusahaan')
@push('bread')
<li><a href="{{ route('menu.admin.perusahaan.index') }}">Perusahaan</a></li>
<li class="active">Create</li>
@endpush
<form action="{{ route('menu.admin.perusahaan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12">
            @include('admin.partials.perusahaan-form')
        </div>
    </div>
</form>
@endsection
