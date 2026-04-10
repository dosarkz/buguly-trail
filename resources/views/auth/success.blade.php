@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto py-16 px-4 text-center">
        <div class="text-green-500 mb-4">
            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold mb-2">Registration Successful!</h1>
        <p class="text-gray-500 mb-6">Your registration has been confirmed and payment received.</p>

        <div class="bg-white border rounded-lg p-6 text-left shadow-sm mb-6">
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Order #:</span>
                    <span class="font-medium">{{ $order->id }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Participant:</span>
                    <span class="font-medium">{{ $order->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Distance:</span>
                    <span class="font-medium">{{ $order->distance->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Category:</span>
                    <span>{{ $order->distance->distance }}</span>
                </div>
                <div class="flex justify-between border-t pt-2 mt-2">
                    <span class="font-semibold">Amount Paid:</span>
                    <span class="font-bold text-green-600">
                    {{ number_format($order->price, 0, '.', ' ') }} ₸
                </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Paid at:</span>
                    <span>{{ $order->paid_at?->format('d.m.Y H:i') }}</span>
                </div>
            </div>
        </div>

        <a href="{{ route('registration.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">
            Register Another Participant
        </a>
    </div>
@endsection
