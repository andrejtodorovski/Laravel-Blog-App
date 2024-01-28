@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="bg-dark text-white rounded" style="padding: 6rem">
            <h1 class="text-center">Register</h1>
            <form method="POST" action="{{ route('register') }}" class="bg-dark text-white p-4 rounded">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') }}" required autofocus>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email"
                           value="{{ old('email') }}" required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-3">
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

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="text-light">{{ __('Already registered?') }}</a>
                    <button type="submit" class="btn btn-primary ml-5">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
