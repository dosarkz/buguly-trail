@extends('layouts.common')

@section('title', __('Participants'))

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="bg-earth-600 p-8 md:p-12 text-white">
            <h1 class="text-4xl font-display uppercase tracking-widest">{{ __('Participants') }}</h1>
            <p class="text-earth-100 mt-2 font-light italic">{{ __('List of registered participants') }}</p>
        </div>

        <div class="p-6 md:p-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">№</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Full name') }}</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Gender') }}</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Age') }}</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Distance') }}</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Country') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($participants as $index => $participant)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ ($participants->currentPage() - 1) * $participants->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                    {{ $participant->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $participant->gender == 1 ? __('Male') : __('Female') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $participant->age ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-lg text-xs font-bold uppercase tracking-wider border border-green-100">
                                        {{ $participant->paidOrder->distance->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $participant->country }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400 italic">
                                    {{ __('No participants found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                {{ $participants->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
