@extends('layouts.common')

@section('title', __('Profile'))

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Profile Info -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                <div class="bg-earth-600 p-8 text-white">
                    <h2 class="text-2xl font-display uppercase tracking-widest">{{ __('My Profile') }}</h2>
                </div>
                <div class="p-8">
                    <div class="space-y-6">
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">{{ __('Full Name') }}</label>
                            <p class="text-gray-900 font-medium">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">{{ __('Email') }}</label>
                            <p class="text-gray-900 font-medium">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">{{ __('Date of Birth') }}</label>
                            <p class="text-gray-900 font-medium">{{ $user->date_of_birth ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">{{ __('Gender') }}</label>
                            <p class="text-gray-900 font-medium">{{ $user->gender == 1 ? __('Male') : __('Female') }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">{{ __('Country') }}</label>
                            <p class="text-gray-900 font-medium">{{ $user->country ?? '-' }}</p>
                        </div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="mt-10">
                        @csrf
                        <button type="submit" class="w-full py-4 bg-gray-100 text-gray-600 rounded-2xl font-bold uppercase tracking-widest hover:bg-gray-200 transition-all">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Orders -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                <div class="bg-earth-600 p-8 text-white">
                    <h2 class="text-2xl font-display uppercase tracking-widest">{{ __('My Races') }}</h2>
                </div>
                <div class="p-0">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">#</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Race Name') }}</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Date') }}</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Location') }}</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Distance') }}</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Price') }}</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Payment') }}</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($orders as $order)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $order->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                            {{ $order->sportEvent->name ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $order->sportEvent->start_date_at?->format('d.m.Y') ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $order->sportEvent->location ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-xs font-bold uppercase tracking-wider">
                                                {{ $order->distance->distance ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                            {{ $order->price }} KZT
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            @if($order->status == \App\Models\Order::STATUS_PAID)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    {{ __('Paid') }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    {{ __('Pending') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            @if($order->status != \App\Models\Order::STATUS_PAID)
                                                <a href="{{ route('register.payment', $order) }}" class="text-earth-600 hover:text-earth-700 font-bold uppercase tracking-widest text-xs">
                                                    {{ __('Pay') }}
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-12 text-center text-gray-400 italic">
                                            {{ __('No races found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
