@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-16 max-w-2xl text-center">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
            <div class="bg-green-500 p-10 text-white relative">
                <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
                     <svg class="w-64 h-64 -ml-20 -mt-20" fill="currentColor" viewBox="0 0 20 20">
                         <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                     </svg>
                </div>

                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-3xl mb-6 backdrop-blur-md">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-display uppercase tracking-widest">{{ __('Registration Successful!') }}</h1>
                    <p class="text-green-50 mt-2 font-light">{{ __('Your spot in the race is secured. See you at the start!') }}</p>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <div class="bg-gray-50 rounded-2xl p-8 text-left border border-gray-100 mb-10">
                    <h2 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6 border-b border-gray-200 pb-4">{{ __('Registration Details') }}</h2>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-1">
                            <span class="text-gray-500">{{ __('Order #') }}</span>
                            <span class="font-bold text-gray-900">#{{ $order->id }}</span>
                        </div>
                        <div class="flex justify-between items-center py-1">
                            <span class="text-gray-500">{{ __('Participant') }}</span>
                            <span class="font-bold text-gray-900">{{ $order->user->name }}</span>
                        </div>
                        <div class="flex justify-between items-center py-1">
                            <span class="text-gray-500">{{ __('Distance') }}</span>
                            <span class="px-3 py-1 bg-green-50 text-green-700 rounded-lg text-xs font-bold uppercase tracking-wider border border-green-100">{{ $order->distance->name }}</span>
                        </div>
                        <div class="flex justify-between items-center py-1 group pt-4 border-t border-gray-200 mt-4">
                            <span class="text-lg font-bold text-gray-900">{{ __('Amount Paid') }}</span>
                            <div class="text-right">
                                <span class="text-2xl font-black text-green-600 block leading-tight">
                                    {{ number_format($order->price, 0, '.', ' ') }} ₸
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('main') }}" class="flex-1 bg-gray-900 hover:bg-black text-white px-8 py-4 rounded-2xl font-bold transition-all hover:-translate-y-1 active:scale-95">
                        {{ __('Return to Main Page') }}
                    </a>
                    <a href="{{ route('register') }}" class="flex-1 border-2 border-gray-200 hover:border-earth-600 hover:text-earth-600 text-gray-600 px-8 py-4 rounded-2xl font-bold transition-all hover:-translate-y-1 active:scale-95">
                        {{ __('Register Another Participant') }}
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 p-6 border-t border-gray-100">
                <p class="text-xs text-gray-400 leading-relaxed max-w-sm mx-auto">
                    {{ __('Confirmation email has been sent to') }} <span class="font-semibold text-gray-600">{{ $order->user->email }}</span>. {{ __('Please check your inbox (and spam folder) for further instructions.') }}
                </p>
            </div>
        </div>
    </div>
@endsection
