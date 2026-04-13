@extends('layouts.app')

@section('title', __('Sign In'))

@section('content')
<section class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            <h1 class="auth-title">{{ __('Welcome Back') }}</h1>
            <p class="auth-subtitle">{{ __('Please enter your details to sign in') }}</p>
        </div>

        @if (session('status'))
            <div class="auth-alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="auth-form-group">
                <label for="email" class="auth-label">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="auth-input">
                @error('email')
                    <p class="auth-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div style="margin-bottom: 12px;">
                <label for="password" class="auth-label">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" name="password" required
                       class="auth-input">
                @error('password')
                    <p class="auth-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px;">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.88rem; color: #6b7280;">
                    <input type="checkbox" name="remember" style="accent-color: #2d7d2b; width: 16px; height: 16px;">
                    {{ __('Remember me') }}
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link" style="font-size: 0.88rem; font-weight: 600;">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-green" style="width: 100%; justify-content: center; padding: 16px; font-size: 1rem; border: none; cursor: pointer;">
                {{ __('Sign In') }}
            </button>
        </form>

        <div class="auth-footer">
            <p>
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="auth-link">
                    {{ __('Register Now') }}
                </a>
            </p>
        </div>
    </div>
</section>
@endsection
