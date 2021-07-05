@extends('layouts.app')
@section('content')
@section('bread', 'Periode')
@push('bread')
<li><a href="{{ route('menu.admin.periode.index') }}">Periode</a></li>
<li class="active">Create</li>
@endpush
<form action="{{ route('menu.admin.periode.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            @include('admin.partials.periode-form')
        </div>
    </div>
</form>

@endsection
