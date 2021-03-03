@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <br>
        <br>
        <div class="col m8 offset-m2">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="{{ asset('template/images/gallary/18.png') }}" height="500">
                    <span class="card-title">Sim Absensi PKL</span>
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h4 class="task-card-title">Login</h4>
                        <br>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="icon_email" type="email" name="email" class="validate">
                                <label for="icon_email">Email</label>
                                @error('email')
                                <strong class="text-red">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="icon_password" type="password" name="password" class="validate">
                                <label for="icon_password">Password</label>
                                @error('password')
                                <strong class="text-red">{{ $message }}</strong>
                                @enderror
                            </div>

                    </div>
                    <div class="card-action">
                        <button class="btn waves-effect waves-light gradient-45deg-red-pink" type="submit" name="action">
                            <i class="material-icons">lock_open</i> Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
