@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Payment</h1>

        @if($errors->has('payment'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ $errors->first('payment') }}</div>
        @endif

        <div class="bg-white border rounded-lg p-6 mb-6 shadow-sm">
            <h2 class="text-lg font-semibold mb-4">Order Summary</h2>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Participant:</span>
                    <span class="font-medium">{{ $order->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Email:</span>
                    <span>{{ $order->user->email }}</span>
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
                    <span class="font-semibold">Total:</span>
                    <span class="font-bold text-xl text-blue-600">
                    {{ number_format($order->price, 0, '.', ' ') }} ₸
                </span>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('register.pay', $order) }}">
            @csrf
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded transition">
                Pay {{ number_format($order->price, 0, '.', ' ') }} ₸
            </button>
        </form>

        <p class="text-xs text-gray-400 text-center mt-4">
            You will be charged via a secure bank gateway.
        </p>
    </div>
@endsection
