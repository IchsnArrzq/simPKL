@extends('layouts.app')
@section('content')
@section('bread', 'User')
@push('bread')
<li><a href="{{ route('menu.admin.user.index') }}">User</a></li>
<li class="active">Create</li>
@endpush
<form action="{{ route('menu.admin.user.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col s12 m12 l12">
            @include('admin.partials.user-form')
        </div>
    </div>
</form>

@endsection
