@extends('layouts.common')

@section('title', __('Reset Password'))

@section('content')
<section style="background:#f5efe6; min-height: calc(100vh - 64px); display: flex; align-items: center; justify-content: center; padding: 40px 24px;">
    <div style="background: white; max-width: 440px; width: 100%; padding: 40px; border-radius: 24px; border: 1px solid #d6ebd5; box-shadow: 0 10px 30px rgba(45, 125, 43, 0.05);">

        <div style="text-align: center; margin-bottom: 32px;">
            <h1 class="font-display" style="font-size: 3rem; color: #2b3a2f; line-height: 1; margin-bottom: 8px;">{{ __('Reset Password') }}</h1>
            <p style="color: #6b7280; font-size: 0.95rem;">{{ __('Please enter your new password') }}</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Address -->
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-size: 0.82rem; font-weight: 700; color: #2b3a2f; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus
                       style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1.5px solid #d1dfd2; font-size: 1rem; color: #2b3a2f; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#2d7d2b'; this.style.outline='none';"
                       onblur="this.style.borderColor='#d1dfd2';">
                @error('email')
                    <p style="color: #dc2626; font-size: 0.8rem; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; font-size: 0.82rem; font-weight: 700; color: #2b3a2f; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">
                    {{ __('New Password') }}
                </label>
                <input id="password" type="password" name="password" required
                       style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1.5px solid #d1dfd2; font-size: 1rem; color: #2b3a2f; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#2d7d2b'; this.style.outline='none';"
                       onblur="this.style.borderColor='#d1dfd2';">
                @error('password')
                    <p style="color: #dc2626; font-size: 0.8rem; margin-top: 6px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div style="margin-bottom: 28px;">
                <label for="password_confirmation" style="display: block; font-size: 0.82rem; font-weight: 700; color: #2b3a2f; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1.5px solid #d1dfd2; font-size: 1rem; color: #2b3a2f; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#2d7d2b'; this.style.outline='none';"
                       onblur="this.style.borderColor='#d1dfd2';">
            </div>

            <button type="submit" class="btn-green" style="width: 100%; justify-content: center; padding: 16px; font-size: 1rem; border: none; cursor: pointer;">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>
</section>
@endsection
