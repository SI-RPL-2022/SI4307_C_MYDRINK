@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="mb-2 text-muted">{{ __('Email Address') }}</label>

                            <div class="mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label for="password" class="text-muted">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                    <a class="float-end" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                <div class="mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer py-3 border-0">
                    <div class="text-center">
                        Belum punya akun? <a href="/register" class="text-dark">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5 text-muted">
        Copyright &copy; 2017-2021 &mdash; My Drink 
    </div>
</div>
@endsection
