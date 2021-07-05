@extends('layouts.app')
@section('content')
@section('bread', 'Jurusan')
@push('bread')
<li><a href="{{ route('menu.admin.jurusan.index') }}">Jurusan</a></li>
<li class="active">Create</li>
@endpush
<form action="{{ route('menu.admin.jurusan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            @include('admin.partials.jurusan-form')
        </div>
    </div>
</form>

@endsection
