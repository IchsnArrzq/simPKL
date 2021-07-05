@extends('layouts.app')
@section('content')

@section('bread', 'Siswa')
@push('bread')
<li><a href="{{ route('menu.admin.siswa.index') }}">Siswa</a></li>
<li class="active">Create</li>
@endpush
<form action="{{ route('menu.admin.siswa.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            @include('admin.partials.siswa-form')
        </div>
    </div>
</form>
@endsection
