@extends('layouts.app')

@section('title', __('Reset Password'))

@section('content')
<section style="background:#f5efe6; min-height: calc(100vh - 64px); display: flex; align-items: center; justify-content: center; padding: 40px 24px;">
    <div style="background: white; max-width: 440px; width: 100%; padding: 40px; border-radius: 24px; border: 1px solid #d6ebd5; box-shadow: 0 10px 30px rgba(45, 125, 43, 0.05);">

        <div style="text-align: center; margin-bottom: 32px;">
            <h1 class="font-display" style="font-size: 3rem; color: #2b3a2f; line-height: 1; margin-bottom: 8px;">{{ __('Forgot Password') }}</h1>
            <p style="color: #6b7280; font-size: 0.95rem;">{{ __('Enter your email to receive a password reset link') }}</p>
        </div>

        @if (session('status'))
            <div style="background: #f0fdf4; border: 1px solid #bcf0bd; color: #166534; padding: 12px 16px; border-radius: 12px; margin-bottom: 24px; font-size: 0.88rem;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div style="margin-bottom: 28px;">
                <label for="email" style="display: block; font-size: 0.82rem; font-weight: 700; color: #2b3a2f; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1.5px solid #d1dfd2; font-size: 1rem; color: #2b3a2f; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#2d7d2b'; this.style.outline='none';"
                       onblur="this.style.borderColor='#d1dfd2';">
                @error('email')
                    <p style="color: #dc2626; font-size: 0.8rem; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-green" style="width: 100%; justify-content: center; padding: 16px; font-size: 1rem; border: none; cursor: pointer;">
                {{ __('Send Reset Link') }}
            </button>
        </form>

        <div style="text-align: center; margin-top: 32px; border-top: 1px solid #f3f4f6; padding-top: 24px;">
            <a href="{{ route('login') }}" style="color: #2d7d2b; font-weight: 700; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                {{ __('Back to login') }}
            </a>
        </div>
    </div>
</section>
@endsection
