@extends('layouts.app')

@section('content')
    <div class="container  ">
        <div class="bg-white shadow-sm p-6 md:p-10">

            <h3 class="font-extralight">Registration to Race</h3>
            <p>Buguly Trail 2026</p>

            <div class="p-2 mt-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    {{-- Hidden fields --}}
                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="total_price" id="total_price" value="{{ old('total_price', 0) }}">

                    <div class="form-grid">
                        {{-- ── Personal info ── --}}
                        <div class="card">
                            <div class="card-title">Personal info</div>

                            <div class="field">
                                <label class="lbl" for="name">Full name <span class="req">*</span></label>
                                <input type="text" id="name" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}"
                                       placeholder="Иван Иванов Иванович">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>



                            <div class="field">
                                <label class="lbl" for="phone">Phone <span class="req">*</span></label>
                                <input type="tel" id="phone" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}"
                                       placeholder="+7 777 777 77 77">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="field">
                                <label class="lbl" for="email">Email <span class="req">*</span></label>
                                <input type="email" id="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="yourmail@host.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="field">
                                <label class="lbl" for="gender">Gender <span class="req">*</span></label>

                                   <div class="flex items-center space-x-2.5">
                                   <label class="flex items-center space-x-2">
                                       <input
                                           type="radio"
                                           name="gender"
                                           value="0"
                                           {{ old('gender') === '0' ? 'checked' : '' }}
                                           class="h-4 w-4 text-lime-600 border-gray-300 focus:ring-lime-500"
                                       >
                                       <span class="text-sm text-gray-700">Female</span>
                                   </label>

                                   <label class="flex items-center space-x-2">
                                       <input
                                           type="radio"
                                           name="gender"
                                           value="1"
                                           {{ old('gender') === '1' ? 'checked' : '' }}
                                           class="h-4 w-4 text-lime-600 border-gray-300 focus:ring-lime-500"
                                       >
                                       <span class="text-sm text-gray-700">Male</span>
                                   </label>
                               </div>


                                @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="field">
                                <label class="lbl" for="emergency_number">Emergency contact <span class="req">*</span></label>
                                <input type="tel" id="emergency_number" name="emergency_number"
                                       class="form-control @error('emergency_number') is-invalid @enderror"
                                       value="{{ old('emergency_number') }}"
                                       placeholder="+7 777 777 77 77">
                                @error('emergency_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        {{-- ── Location & Club ── --}}
                        <div class="card">
                            <div class="card-title">Location &amp; club</div>

                            <div class="field">
                                <label class="lbl" for="country">Country <span class="req">*</span></label>
                                <input type="text" id="country" name="country"
                                       class="form-control @error('country') is-invalid @enderror"
                                       value="{{ old('country') }}"
                                       placeholder="Kazakhstan">
                                @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="field">
                                <label class="lbl" for="city">City <span class="req">*</span></label>
                                <input type="text" id="city" name="city"
                                       class="form-control @error('city') is-invalid @enderror"
                                       value="{{ old('city') }}"
                                       placeholder="Астана">
                                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="field">
                                <label class="lbl" for="running_club">Running club</label>
                                <input type="text" id="running_club" name="running_club"
                                       class="form-control"
                                       value="{{ old('running_club') }}"
                                       placeholder="Marathon">
                            </div>

                            <div class="field">
                                <label class="lbl" for="id_intra">Intra ID</label>
                                <input type="text" id="id_intra" name="id_intra"
                                       class="form-control"
                                       value="{{ old('id_intra') }}"
                                       placeholder="Any string">
                            </div>

                            <div class="field">
                                <label class="lbl" for="confirmation_of_qualification">Qualification proof</label>
                                <input type="text" id="confirmation_of_qualification" name="confirmation_of_qualification"
                                       class="form-control"
                                       value="{{ old('confirmation_of_qualification') }}"
                                       placeholder="Link or document reference">
                                <div class="hint">Required for Ultra &amp; Forest Trail</div>
                            </div>
                        </div>

                        {{-- ── Distance ── --}}
                        <div class="card col-span-2">
                            <div class="card-title">Choose your distance <span style="font-weight:400;text-transform:none;letter-spacing:0;color:var(--text-hint);font-size:11px;margin-left:4px">— select one</span></div>

                            <div class="distance-grid" id="distanceGrid">
                                @foreach($distances as $id => $dist)
                                    <label class="dist-label {{ old('distance') == $dist['id'] ? 'selected' : '' }}" id="dc{{ $dist['id'] }}">
                                        <input type="radio" name="distance" value="{{ $dist['id'] }}"
                                               {{ old('distance') == $dist['id'] ? 'checked' : '' }}
                                               onchange="selectDist({{ $dist['id'] }}, {{ $dist['price'] }})">
                                        <div class="dist-check"></div>
                                        <div class="dist-name">{{ $dist['name'] }}</div>
                                        <div class="dist-km">{{ $dist['km'] }}</div>
                                        <div class="dist-price">₸{{ number_format($dist['price'], 0, '.', ',') }}</div>
                                        <div class="dist-slots">{{ $dist['slots'] }} slots available</div>
                                    </label>
                                @endforeach
                            </div>

                            @error('distance')
                            <div class="dist-error">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ── T-shirt ── --}}
                        <div class="card">
                            <div class="card-title">T-shirt size <span class="req">*</span></div>
                            <div class="tshirt-row">
                                @foreach($sizes as $size)
                                    <label class="size-label {{ old('t_shirt') === $size ? 'selected' : '' }}">
                                        <input type="radio" name="t_shirt" value="{{ $size }}"
                                               {{ old('t_shirt') === $size ? 'checked' : '' }}
                                               onchange="selectSize(this)">
                                        {{ $size }}
                                    </label>
                                @endforeach
                            </div>
                            @error('t_shirt')<div class="invalid-feedback" style="margin-top:8px">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Price summary ── --}}
                        <div class="card">
                            <div class="card-title">Payment summary</div>
                            <div class="price-box">
                                <div class="price-row">
                                    <span>Registration fee</span>
                                    <span id="regFeeDisplay">— select distance</span>
                                </div>
                                <hr class="price-divider">
                                <div class="price-total">
                                    <span class="price-total-lbl">Total</span>
                                    <span>
                            <span class="price-total-val" id="totalDisplay">₸0</span>
                            <span class="price-currency">KZT</span>
                        </span>
                                </div>
                            </div>
                        </div>

                        {{-- ── Privacy & Submit ── --}}
                        <div class="card col-span-2">
                            <div class="privacy-box">
                                <input type="checkbox" id="confirmation_privacy" name="confirmation_privacy"
                                       value="1" {{ old('confirmation_privacy') ? 'checked' : '' }}>
                                <div class="privacy-text">
                                    I agree to the <a href="#">Privacy Policy</a> and
                                    <a href="#">Terms of Participation</a>.
                                    I confirm that I have read the event rules and meet the age and health requirements
                                    for my chosen distance. I consent to the processing of my personal data for
                                    race registration purposes.
                                </div>
                            </div>
                            @error('confirmation_privacy')
                            <div class="invalid-feedback" style="margin-top:8px">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn-submit">Register for the race →</button>
                        </div>

                    </div>{{-- .form-grid --}}
                </form>
            </div>

        </div>
    </div>

<script>
    const distancePrices = @json(collect($distances)->mapWithKeys(fn($d) => [$d['id'] => $d['price']]));

    function fmt(n) {
        return '₸' + Number(n).toLocaleString('en-US');
    }

    function selectDist(id, price) {
        document.querySelectorAll('.dist-label').forEach(el => el.classList.remove('selected'));
        const card = document.getElementById('dc' + id);
        if (card) card.classList.add('selected');
        document.getElementById('total_price').value = price;
        document.getElementById('regFeeDisplay').textContent = fmt(price);
        document.getElementById('totalDisplay').textContent  = fmt(price);
    }

    function selectSize(radio) {
        document.querySelectorAll('.size-label').forEach(el => el.classList.remove('selected'));
        radio.closest('.size-label').classList.add('selected');
    }

    // Restore on page reload with validation errors
    const oldDistance = {{ old('distance', 'null') }};
    if (oldDistance) {
        const price = distancePrices[oldDistance];
        if (price) selectDist(oldDistance, price);
    }
</script>
@endsection
