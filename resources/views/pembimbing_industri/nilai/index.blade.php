@extends('layouts.app')
@section('content')
@section('bread', 'Nilai')
@push('bread')
<li class="active">Nilai</li>
@endpush
<div class="container">
    <div class="divider"></div>
    <div id="responsive-table">
        <div class="row">
            <div class="col s12">
                <div class="card hoverable">
                    <div class="card-action">
                        Nilai Siswa
                    </div>
                    <div class="card-content">
                    @isset($rapot)
                        <form action="{{ route('menu.pembimbing_industri.nilai.update',$siswa) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">kedisiplinan</label>
                                <input type="text" name="kedisiplinan" class="form-control" value="{{ $rapot->kedisiplinan }}">
                            </div>
                            <div class="form-group">
                                <label for="">kompetensi</label>
                                <input type="text" name="kompetensi" class="form-control" value="{{ $rapot->kompetensi }}">
                            </div>
                            <div class="form-group">
                                <label for="">sikap</label>
                                <input type="text" name="sikap" class="form-control" value="{{ $rapot->sikap }}">
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn blue">Submit</button>
                            </div>
                        </form>
                        @else
                        <div class="alert alert-info">Refresh Browser jika tidak ada</div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
