@extends('layouts.app')

@section('content')
@section('bread', 'Periode')
@push('bread')
<li><a href="{{ route('menu.admin.periode.index') }}">Periode</a></li>
<li class="active">Edit</li>
@endpush
<form action="{{ route('menu.admin.periode.update',$periode->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col s12 m12 l12">
            <main id="app">
                @include('admin.partials.periode-form')
            </main>
        </div>
    </div>
</form>
@endsection
