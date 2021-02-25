@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" type="role" class="form-control @error('role') is-invalid @enderror" name="role" required autocomplete="current-role">
                                    <option value="">require</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="pembimbing">Pembimbing</option>
                                    <option value="instruktur">Instruktur</option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="col s12 m12 l12">
        <div class="card horizontal">
            <div class="card-image">
                <img src="{{ asset('template/images/gallary/18.png') }}" height="400">
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
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="icon_password" type="password" name="password" class="validate">
                            <label for="icon_password">Password</label>
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
@endsection
