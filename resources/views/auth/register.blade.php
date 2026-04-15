@extends('layouts.common')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <div class="p-6 md:p-10 border-b border-gray-100">
                <h3 class="text-3xl font-display text-earth-700 uppercase tracking-tight">{{ __('Registration to Race') }}</h3>
                <p class="text-gray-500 mt-2 font-light">{{ __('Registration to Race Description') }}</p>
            </div>

            <div class="p-6 md:p-10 bg-gray-50/30">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-50 border border-red-100 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm shadow-sm">
                        <p class="font-semibold mb-1">{{ __('Please correct the following errors:') }}</p>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" id="regForm">
                    @csrf
                    {{-- Hidden fields --}}
                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="total_price" id="total_price" value="{{ old('total_price', 0) }}">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- ── Personal info ── --}}
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-earth-500 rounded-full"></span>
                                {{ __('Personal info') }}
                            </h4>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="name">{{ __('Full name') }} <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all @error('name') border-red-300 bg-red-50 @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Иван Иванов Иванович">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="phone">{{ __('Phone') }} <span class="text-red-500">*</span></label>
                                    <input type="tel" id="phone" name="phone"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all @error('phone') border-red-300 bg-red-50 @enderror"
                                           value="{{ old('phone') }}"
                                           placeholder="+7 (___) ___-__-__">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="email">{{ __('Email') }} <span class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all @error('email') border-red-300 bg-red-50 @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="yourmail@host.com">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('Gender') }} <span class="text-red-500">*</span></label>
                                    <div class="flex items-center space-x-6 py-1">
                                        <label class="flex items-center space-x-3 cursor-pointer group">
                                            <input type="radio" name="gender" value="0"
                                                   {{ old('gender') === '0' ? 'checked' : '' }}
                                                   class="w-5 h-5 text-earth-600 border-gray-300 focus:ring-earth-500 focus:ring-offset-0">
                                            <span class="text-gray-700 group-hover:text-earth-700 transition-colors">{{ __('Female') }}</span>
                                        </label>
                                        <label class="flex items-center space-x-3 cursor-pointer group">
                                            <input type="radio" name="gender" value="1"
                                                   {{ old('gender') === '1' ? 'checked' : '' }}
                                                   class="w-5 h-5 text-earth-600 border-gray-300 focus:ring-earth-500 focus:ring-offset-0">
                                            <span class="text-gray-700 group-hover:text-earth-700 transition-colors">{{ __('Male') }}</span>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="emergency_number">{{ __('Emergency phone') }} <span class="text-red-500">*</span></label>
                                    <input type="tel" id="emergency_number" name="emergency_number"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all @error('emergency_number') border-red-300 bg-red-50 @enderror"
                                           value="{{ old('emergency_number') }}"
                                           placeholder="+7 (___) ___-__-__">
                                </div>
                            </div>
                        </div>

                        {{-- ── Location & Club ── --}}
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-earth-500 rounded-full"></span>
                                {{ __('Location & club') }}
                            </h4>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="country">{{ __('Country') }} <span class="text-red-500">*</span></label>
                                    <input type="text" id="country" name="country"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all @error('country') border-red-300 bg-red-50 @enderror"
                                           value="{{ old('country') }}"
                                           placeholder="Kazakhstan">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="city">{{ __('City') }} <span class="text-red-500">*</span></label>
                                    <input type="text" id="city" name="city"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all @error('city') border-red-300 bg-red-50 @enderror"
                                           value="{{ old('city') }}"
                                           placeholder="Астана">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="running_club">{{ __('Running club') }}</label>
                                    <input type="text" id="running_club" name="running_club"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all"
                                           value="{{ old('running_club') }}"
                                           placeholder="Marathon">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="id_intra">{{ __('Itra ID') }}</label>
                                    <input type="text" id="id_intra" name="id_intra"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all"
                                           value="{{ old('id_intra') }}"
                                           placeholder="Any string">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="confirmation_of_qualification">{{ __('Qualification proof') }}</label>
                                    <input type="text" id="confirmation_of_qualification" name="confirmation_of_qualification"
                                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-earth-500 focus:ring-4 focus:ring-earth-500/10 outline-none transition-all"
                                           value="{{ old('confirmation_of_qualification') }}"
                                           placeholder="Link or document reference">
                                    <p class="mt-1.5 text-xs text-gray-400">{{ __('Required for Ultra & Forest Trail') }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- ── Distance ── --}}
                        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-earth-500 rounded-full"></span>
                                {{ __('Choose your distance') }}
                                <span class="text-sm font-normal text-gray-400 ml-2">— {{ __('select one') }}</span>
                            </h4>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="distanceGrid">
                                @foreach($distances as $dist)
                                    <label class="relative flex flex-col p-5 border-2 rounded-2xl cursor-pointer transition-all hover:shadow-md group {{ old('distance', $selectedDistanceId) == $dist->id ? 'border-earth-500 bg-earth-50' : 'border-gray-100 hover:border-earth-200' }}"
                                           id="dc{{ $dist->id }}"
                                           onclick="selectDist({{ $dist->id }}, {{ $dist->price }})">
                                        <input type="radio" name="distance" value="{{ $dist->id }}"
                                               {{ old('distance', $selectedDistanceId) == $dist->id ? 'checked' : '' }}
                                               class="sr-only">

                                        <div class="flex justify-between items-start mb-3">
                                            <div class="font-display text-xl uppercase tracking-wider text-earth-700">{{ $dist->name }}</div>
                                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition-colors {{ old('distance', $selectedDistanceId) == $dist->id ? 'border-earth-500 bg-earth-500' : 'border-gray-200 group-hover:border-earth-300' }}">
                                                <svg class="w-3 h-3 text-white fill-current {{ old('distance', $selectedDistanceId) == $dist->id ? 'block' : 'hidden' }}" viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="text-2xl font-bold text-gray-900 mb-1">{{ $dist->km }}</div>
                                        <div class="text-earth-600 font-semibold mb-3">₸{{ number_format($dist->price, 0, '.', ',') }}</div>
                                        <div class="mt-auto pt-3 border-t border-gray-100/50 text-[10px] uppercase tracking-widest text-gray-400 font-bold">
                                            {{ $dist->slots }} {{ __('slots available') }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            @error('distance')
                                <p class="mt-3 text-sm text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- ── T-shirt ── --}}
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-earth-500 rounded-full"></span>
                                {{ __('T-shirt size') }} <span class="text-red-500 ml-1">*</span>
                            </h4>

                            <div class="flex flex-wrap gap-3">
                                @foreach($sizes as $size)
                                    <label class="flex-1 min-w-[60px]">
                                        <input type="radio" name="t_shirt" value="{{ $size }}"
                                               {{ old('t_shirt') === $size ? 'checked' : '' }}
                                               class="sr-only"
                                               onchange="selectSize(this)">
                                        <div class="text-center py-2.5 rounded-xl border-2 cursor-pointer transition-all hover:bg-gray-50 font-bold {{ old('t_shirt') === $size ? 'border-earth-500 text-earth-700 bg-earth-50' : 'border-gray-100 text-gray-400' }}">
                                            {{ $size }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            @error('t_shirt')
                                <p class="mt-3 text-sm text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- ── Price summary ── --}}
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-earth-500 rounded-full"></span>
                                {{ __('Payment summary') }}
                            </h4>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center text-gray-600">
                                    <span>{{ __('Registration fee') }}</span>
                                    <span id="regFeeDisplay" class="font-semibold">— {{ __('select distance') }}</span>
                                </div>
                                <div class="h-px bg-gray-100"></div>
                                <div class="flex justify-between items-end">
                                    <span class="text-sm text-gray-400 font-medium uppercase tracking-widest">{{ __('Total') }}</span>
                                    <div class="text-right">
                                        <div class="text-3xl font-black text-gray-900 leading-none" id="totalDisplay">₸0</div>
                                        <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">KZT</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ── Privacy & Submit ── --}}
                        <div class="lg:col-span-2 bg-white p-6 md:p-10 rounded-2xl shadow-sm border border-gray-100 mt-4">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
                                <div class="flex-1">
                                    <label class="flex items-start gap-4 group cursor-pointer">
                                        <div class="mt-1">
                                            <input type="checkbox" id="confirmation_privacy" name="confirmation_privacy"
                                                   value="1" {{ old('confirmation_privacy') ? 'checked' : '' }}
                                                   class="w-6 h-6 text-earth-600 border-gray-300 rounded-lg focus:ring-earth-500 focus:ring-offset-0 transition-all">
                                        </div>
                                        <div class="text-sm text-gray-500 leading-relaxed group-hover:text-gray-700 transition-colors">
                                            {{ __('I agree to the') }} <a href="#" class="text-earth-600 font-semibold hover:underline underline-offset-4">{{ __('Privacy Policy Link') }}</a> {{ __('and') }}
                                            <a href="#" class="text-earth-600 font-semibold hover:underline underline-offset-4">{{ __('Terms of Participation Link') }}</a>
                                            <p class="mt-1 text-xs opacity-75">{{ __('Privacy terms description') }}</p>
                                        </div>
                                    </label>
                                    @error('confirmation_privacy')
                                        <p class="mt-3 text-sm text-red-500 font-medium pl-10">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="bg-lime-700 hover:bg-lime-900 text-white font-bold py-2 px-4 rounded-full">
                                    {{ __('Register for the race →') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/imask"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const phoneMaskOptions = {
                mask: '+{7} (000) 000-00-00'
            };

            const phoneInput = document.getElementById('phone');
            const emergencyInput = document.getElementById('emergency_number');

            if (phoneInput) IMask(phoneInput, phoneMaskOptions);
            if (emergencyInput) IMask(emergencyInput, phoneMaskOptions);

            // Distance Selection Logic
            const distancePrices = @json(collect($distances)->mapWithKeys(fn($d) => [$d->id => $d->price]));

            window.fmt = function(n) {
                return '₸' + Number(n).toLocaleString('en-US');
            }

            window.selectDist = function(id, price) {
                // Remove selected class from all
                document.querySelectorAll('#distanceGrid label').forEach(el => {
                    el.classList.remove('border-earth-500', 'bg-earth-50');
                    el.classList.add('border-gray-100', 'hover:border-earth-200');
                    el.querySelector('.w-5').classList.remove('border-earth-500', 'bg-earth-500');
                    el.querySelector('.w-5').classList.add('border-gray-200');
                    el.querySelector('svg').classList.add('hidden');
                    el.querySelector('svg').classList.remove('block');
                });

                // Add to current
                const card = document.getElementById('dc' + id);
                if (card) {
                    card.classList.add('border-earth-500', 'bg-earth-50');
                    card.classList.remove('border-gray-100', 'hover:border-earth-200');
                    card.querySelector('.w-5').classList.add('border-earth-500', 'bg-earth-500');
                    card.querySelector('.w-5').classList.remove('border-gray-200');
                    card.querySelector('svg').classList.remove('hidden');
                    card.querySelector('svg').classList.add('block');
                    card.querySelector('input[type="radio"]').checked = true;
                }

                document.getElementById('total_price').value = price;
                document.getElementById('regFeeDisplay').textContent = fmt(price);
                document.getElementById('totalDisplay').textContent  = fmt(price);
            }

            window.selectSize = function(radio) {
                // Remove selected from all
                const labels = radio.closest('.flex').querySelectorAll('.text-center');
                labels.forEach(el => {
                    el.classList.remove('border-earth-500', 'text-earth-700', 'bg-earth-50');
                    el.classList.add('border-gray-100', 'text-gray-400');
                });

                // Add to selected
                const target = radio.nextElementSibling;
                target.classList.add('border-earth-500', 'text-earth-700', 'bg-earth-50');
                target.classList.remove('border-gray-100', 'text-gray-400');
            }

            // Restore/Initial Selection
            const initialDistance = @json(old('distance', $selectedDistanceId));
            if (initialDistance) {
                const price = distancePrices[initialDistance];
                if (price) selectDist(initialDistance, price);
            }
        });
    </script>
@endsection
