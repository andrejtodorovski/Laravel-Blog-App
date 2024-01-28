@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mb-4 text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="bg-dark text-white p-4 rounded">
            @csrf

            <!-- Email Address -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
@endsection
