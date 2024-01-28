@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        @if(session('status'))
            <div class="alert alert-info" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="bg-dark text-white rounded" style="padding: 6rem">
            <h1 class="text-center">Log in</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 ">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           name="password" required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-check ">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center ">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-light">{{ __('Forgot your password?') }}</a>
                    @endif

                    <button type="submit" class="btn btn-primary ml-5">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
