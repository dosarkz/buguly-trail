@extends('layouts.common')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-2xl">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
            {{-- Header --}}
            <div class="bg-earth-600 p-8 text-center text-white">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-2xl mb-4 backdrop-blur-sm">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-display uppercase tracking-wider">{{ __('Payment') }}</h1>
                <p class="text-earth-100 mt-2 font-light">{{ __('Finalize your registration by completing the payment') }}</p>
            </div>

            <div class="p-8 md:p-10">
                @if($errors->has('payment'))
                    <div class="bg-red-50 border border-red-100 text-red-600 p-4 rounded-xl mb-6 flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium">{{ $errors->first('payment') }}</span>
                    </div>
                @endif

                <div class="bg-gray-50 rounded-2xl p-6 mb-8 border border-gray-100">
                    <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6 border-b border-gray-200 pb-4">{{ __('Order Summary') }}</h2>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center group">
                            <span class="text-gray-500 group-hover:text-gray-700 transition-colors">{{ __('Participant') }}</span>
                            <span class="font-bold text-gray-900">{{ $order->user->name }}</span>
                        </div>
                        <div class="flex justify-between items-center group">
                            <span class="text-gray-500 group-hover:text-gray-700 transition-colors">{{ __('Distance') }}</span>
                            <span class="px-3 py-1 bg-earth-50 text-earth-700 rounded-lg text-xs font-bold uppercase tracking-wider border border-earth-100">{{ $order->distance->name }}</span>
                        </div>
                        <div class="flex justify-between items-center group pt-4 border-t border-gray-200 mt-4">
                            <span class="text-lg font-bold text-gray-900">{{ __('Total Amount') }}</span>
                            <div class="text-right">
                                <span class="text-3xl font-black text-earth-600 block leading-tight">
                                    {{ number_format($order->price, 0, '.', ' ') }} ₸
                                </span>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">KZT</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('register.pay', $order) }}">
                    @csrf
                    <button type="submit"
                            class="w-full bg-earth-600 hover:bg-earth-700 text-white font-bold py-5 rounded-2xl shadow-xl shadow-earth-500/20 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 text-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        {{ __('Pay Now') }}
                    </button>
                </form>

                <div class="mt-8 flex items-center justify-center gap-4 grayscale opacity-40">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="h-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-6">
                </div>

                <p class="text-[11px] text-gray-400 text-center mt-6 uppercase tracking-wider font-medium">
                    {{ __('Secure Payment Processing') }}
                </p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('register') }}" class="text-sm font-semibold text-gray-400 hover:text-earth-600 transition-colors underline-offset-4 hover:underline">
                {{ __('← Back to registration') }}
            </a>
        </div>
    </div>
@endsection
