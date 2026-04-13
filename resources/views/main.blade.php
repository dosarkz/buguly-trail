@extends('layouts.app')

@section('title', __('Home'))

@section('content')
    <section class="hero-section hero-bg" style="background-image: url('{{asset('/storage/images/bg_main_1.jpg')}}');">
        <div class="container-wide">
            <!-- Event badge -->
            <div class="fade-up d1" style="margin-bottom:16px;">
                <span class="badge-white">
                     {{ __('July 12–13, 2026 · Qarqaraly, Kazakhstan') }}
                </span>
            </div>

            <h1 class="font-display fade-up d2 hero-title">
                @lang('RUN THE WILD')
            </h1>

            <p class="fade-up d3 hero-subtitle">
                {{ __('Six distances. One mountain range.') }}
            </p>

            <div class="fade-up d4" style="display:flex;flex-wrap:wrap;gap:14px;margin-bottom:60px;">
                <a href="#routes" class="btn-green">{{ __('Explore Distances') }}</a>
                <a href="#gallery" class="btn-ghost">{{ __('View Gallery') }}</a>
            </div>

            <!-- Stats strip -->
            <div class="fade-up d4 stats-strip">
                <div class="stat-box">
                    <div class="font-display stat-value">800+</div>
                    <div class="stat-label">{{ __('Participants') }}</div>
                </div>
                <div class="stat-box">
                    <div class="font-display stat-value">50 km</div>
                    <div class="stat-label">{{ __('Max Distance') }}</div>
                </div>
                <div class="stat-box">
                    <div class="font-display stat-value">996 m</div>
                    <div class="stat-label">{{ __('Max Elevation') }}</div>
                </div>
                <div class="stat-box">
                    <div class="font-display stat-value">6</div>
                    <div class="stat-label">{{ __('Distances') }}</div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="scroll-indicator">
            <span class="scroll-text">{{ __('Scroll') }}</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ===== ABOUT ===== -->
    <section id="about" class="section-white">
        <div class="container-wide">
            <div class="section-header">
                <p class="section-badge">🌿 {{ __('What is Bugyly Trail?') }}</p>
                <h2 class="font-display section-title">@lang('WHERE ADVENTURE BEGINS AT SUNRISE')</h2>
                <p class="section-desc">
                    {{ __('Bugyly Trail description') }}
                </p>
            </div>

            <!-- Feature cards -->
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏕</div>
                    <h3 class="font-display feature-title">{{ __('Supported Aid Stations') }}</h3>
                    <p class="feature-desc">{{ __('Supported Aid Stations Description') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🗻</div>
                    <h3 class="font-display feature-title">{{ __('Certified Terrain') }}</h3>
                    <p class="feature-desc">{{ __('Certified Terrain Description') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎽</div>
                    <h3 class="font-display feature-title">{{ __('Finisher Rewards') }}</h3>
                    <p class="feature-desc">{{ __('Finisher Rewards Description') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== GALLERY ===== -->
    <section id="gallery" class="section-dark">
        <div class="container-wide">
            <p class="section-badge-alt">{{ __('Moments on the mountain') }}</p>
            <h2 class="font-display section-title-white">@lang('FEEL THE ATMOSPHERE')</h2>

            <!-- Unified Photo Grid -->
            <div class="gallery-grid">
                <div class="gallery-item g-large">
                    <img src="https://images.unsplash.com/photo-1594882645126-14ac19a85b41?w=900&q=80" alt="Trail runner in mountains">
                    <div class="gallery-overlay">
                        <span class="gallery-tag">#BugylTrail</span>
                    </div>
                </div>
                <div class="gallery-item g-tall">
                    <img src="https://images.unsplash.com/photo-1502904550040-7534597429ae?w=700&q=80" alt="Runner on ridge">
                    <div class="gallery-overlay">
                        <span class="gallery-tag">#Skyrunning</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=500&q=80" alt="Mountain trail view">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&q=80" alt="Race finish">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600&q=80" alt="Mountain landscape">
                </div>
                <div class="gallery-item g-wide">
                    <img src="https://images.unsplash.com/photo-1508739773434-c26b3d09e071?w=600&q=80" alt="Dawn running">
                    <div class="gallery-overlay">
                        <span class="gallery-tag">{{ __('Feel the energy') }}</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1543941849-ab7a0c56ec88?w=600&q=80" alt="Forest trail">
                </div>
            </div>

            <p style="text-align:center;margin-top:24px;color:rgba(255,255,255,.4);font-size:.8rem;">
                {{ __('Follow #BugylTrail on Instagram for live race-day updates') }}
            </p>
        </div>
    </section>

    <!-- ===== ROUTES TABLE ===== -->
    <section id="routes" style="background:white;padding:88px 24px;">
        <div style="max-width:1200px;margin:0 auto;">
            <p style="color:#2d7d2b;font-size:.72rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;margin-bottom:8px;">{{ __('Pick your challenge') }}</p>
            <h2 class="font-display" style="font-size:clamp(2.8rem,6vw,5rem);color:#2b3a2f;line-height:1.05;margin-bottom:12px;">{{ __('DISTANCES &') }}<br>{{ __('REGISTRATION') }}</h2>
            <p style="color:#9ca3af;font-size:.88rem;line-height:1.7;max-width:540px;margin-bottom:48px;">
                {{ __('Choose your distance, secure your slot, and prepare for the most memorable race of your year.') }}
                {{ __('All prices include finisher medal, timing chip, and aid station access.') }}
            </p>

            <!-- Desktop table -->
            <div class="table-container hidden-mobile" style="overflow-x:auto;border-radius:20px;border:1px solid #e5e7eb;box-shadow:0 2px 20px rgba(0,0,0,.06);">
                <table style="width:100%;min-width:800px;border-collapse:collapse;font-size:.86rem;">
                    <thead>
                    <tr style="background:#2b3a2f;color:white;">
                        <th style="text-align:left;padding:16px 20px;font-weight:600;font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">#</th>
                        <th style="text-align:left;padding:16px 20px;font-weight:600;font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">{{ __('Name') }}</th>
                        <th style="text-align:left;padding:16px 20px;font-weight:600;font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">{{ __('Distance') }}</th>
                        <th style="text-align:left;padding:16px 20px;font-weight:600;font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">{{ __('Price') }}</th>
                        <th style="text-align:left;padding:16px 20px;font-weight:600;font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">{{ __('Slots') }}</th>
                        <th style="text-align:left;padding:16px 20px;font-weight:600;font-size:.75rem;letter-spacing:.06em;text-transform:uppercase;">{{ __('Notes') }}</th>
                        <th style="padding:16px 20px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Route 1: Ultra -->
                    <tr class="route-row" style="border-bottom:1px solid #f3f4f6;">
                        <td style="color:#9ca3af;font-size:.75rem;font-family:monospace;">01</td>
                        <td >
                            <div style="font-weight:700;color:#2b3a2f;">Bugyly Ultra Trail</div>
                            <span style="background:#fee2e2;color:#dc2626;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:2px 8px;border-radius:999px;margin-top:4px;display:inline-block;">ULTRA</span>
                        </td>
                        <td style="font-weight:700;color:#2d7d2b;font-size:1rem;">50 km +</td>
                        <td style="font-weight:700;font-size:1rem;color:#2b3a2f;">21 500 ₸</td>
                        <td >
                            <span style="background:#f0f7f0;color:#174d18;border:1px solid #aed5ac;font-size:.72rem;font-weight:600;padding:4px 5px;border-radius:999px;">100 {{ __('slots') }}</span>
                        </td>
                        <td style="color:#6b7280;font-size:.88rem;max-width:260px;">{{ __('~50 km · 18+ · 5 aid stations · +996 m elevation') }}</td>
                        <td ><a href="{{ route('register', ['distance_id' => 1]) }}" class="bg-lime-600 hover:bg-lime-800 text-white font-bold py-2 px-4 rounded">{{ __('Participate') }}</a></td>
                    </tr>
                    <!-- Route 2: Forest -->
                    <tr class="route-row" style="border-bottom:1px solid #f3f4f6;">
                        <td style="color:#9ca3af;font-size:.75rem;font-family:monospace;">02</td>
                        <td >
                            <div style="font-weight:700;color:#2b3a2f;">Bugyly Forest Trail</div>
                            <span style="background:#fff7ed;color:#ea580c;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:2px 8px;border-radius:999px;margin-top:4px;display:inline-block;">FOREST</span>
                        </td>
                        <td style="font-weight:700;color:#2d7d2b;font-size:1rem;">21 km +</td>
                        <td style="font-weight:700;font-size:1rem;color:#2b3a2f;">19 000 ₸</td>
                        <td >
                            <span style="background:#f0f7f0;color:#174d18;border:1px solid #aed5ac;font-size:.72rem;font-weight:600;padding:4px 5px;border-radius:999px;">250 {{ __('slots') }}</span>
                        </td>
                        <td style="color:#6b7280;font-size:.88rem;max-width:260px;">{{ __('~21 km · 18+ · 2 aid stations · +500 m elevation') }}</td>
                        <td ><a href="{{ route('register', ['distance_id' => 2]) }}" class="bg-lime-600 hover:bg-lime-800 text-white font-bold py-2 px-4 rounded">{{ __('Participate') }}</a></td>
                    </tr>
                    <!-- Route 3: Shaitankol -->
                    <tr class="route-row" style="border-bottom:1px solid #f3f4f6;">
                        <td style="color:#9ca3af;font-size:.75rem;font-family:monospace;">03</td>
                        <td >
                            <div style="font-weight:700;color:#2b3a2f;">Shaitankol Trail</div>
                            <span style="background:#fefce8;color:#ca8a04;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:2px 8px;border-radius:999px;margin-top:4px;display:inline-block;">TRAIL</span>
                        </td>
                        <td style="font-weight:700;color:#2d7d2b;font-size:1rem;">10 km +</td>
                        <td style="font-weight:700;font-size:1rem;color:#2b3a2f;">14 000 ₸</td>
                        <td style="">
                            <span style="background:#f0f7f0;color:#174d18;border:1px solid #aed5ac;font-size:.72rem;font-weight:600;padding:4px 5px;border-radius:999px;">320 {{ __('slots') }}</span>
                        </td>
                        <td style="color:#6b7280;font-size:.88rem;max-width:260px;">{{ __('~10 km · 18+ · 1 aid station · +300 m elevation') }}</td>
                        <td style=""><a href="{{ route('register', ['distance_id' => 3]) }}" class="bg-lime-600 hover:bg-lime-800 text-white font-bold py-2 px-4 rounded">{{ __('Participate') }}</a></td>
                    </tr>
                    <!-- Route 4: Young -->
                    <tr class="route-row" style="border-bottom:1px solid #f3f4f6;">
                        <td style="color:#9ca3af;font-size:.75rem;font-family:monospace;">04</td>
                        <td style="">
                            <div style="font-weight:700;color:#2b3a2f;">Young Trail</div>
                            <span style="background:#f0fdf4;color:#16a34a;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:2px 8px;border-radius:999px;margin-top:4px;display:inline-block;">YOUTH</span>
                        </td>
                        <td style="font-weight:700;color:#2d7d2b;font-size:1rem;">5 km</td>
                        <td style="font-weight:700;font-size:1rem;color:#2b3a2f;">5 000 ₸</td>
                        <td style="">
                            <span style="background:#f0f7f0;color:#174d18;border:1px solid #aed5ac;font-size:.72rem;font-weight:600;padding:4px 5px;border-radius:999px;">50 {{ __('slots') }}</span>
                        </td>
                        <td style="color:#6b7280;font-size:.88rem;max-width:260px;">{{ __('Teens 13–17 · +30 m elevation gain') }}</td>
                        <td style=""><a href="{{ route('register', ['distance_id' => 4]) }}" class="bg-lime-600 hover:bg-lime-800 text-white font-bold py-2 px-4 rounded">{{ __('Participate') }}</a></td>
                    </tr>
                    <!-- Route 5: Kids -->
                    <tr class="route-row" style="border-bottom:1px solid #f3f4f6;">
                        <td style="color:#9ca3af;font-size:.75rem;font-family:monospace;">05</td>
                        <td style="">
                            <div style="font-weight:700;color:#2b3a2f;">Kids Trail</div>
                            <span style="background:#eff6ff;color:#2563eb;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:2px 8px;border-radius:999px;margin-top:4px;display:inline-block;">KIDS</span>
                        </td>
                        <td style="font-weight:700;color:#2d7d2b;font-size:1rem;">1 km</td>
                        <td style="font-weight:700;font-size:1rem;color:#2b3a2f;">3 000 ₸</td>
                        <td style="">
                            <span style="background:#f0f7f0;color:#174d18;border:1px solid #aed5ac;font-size:.72rem;font-weight:600;padding:4px 5px;border-radius:999px;">30 {{ __('slots') }}</span>
                        </td>
                        <td style="color:#6b7280;font-size:.88rem;max-width:260px;">{{ __('Children 9–12 · +10 m elevation gain') }}</td>
                        <td style=""><a href="{{ route('register', ['distance_id' => 5]) }}" class="bg-lime-600 hover:bg-lime-800 text-white font-bold py-2 px-4 rounded">{{ __('Participate') }}</a></td>
                    </tr>
                    <!-- Route 6: Nordic Walking -->
                    <tr class="route-row">
                        <td style="color:#9ca3af;font-size:.75rem;font-family:monospace;">06</td>
                        <td style="">
                            <div style="font-weight:700;color:#2b3a2f;">Nordic Walking</div>
                            <span style="background:#f5f3ff;color:#7c3aed;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:2px 8px;border-radius:999px;margin-top:4px;display:inline-block;">NORDIC</span>
                        </td>
                        <td style="font-weight:700;color:#2d7d2b;font-size:1rem;">10 km +</td>
                        <td style="font-weight:700;font-size:1rem;color:#2b3a2f;">12 000 ₸</td>
                        <td >
                            <span style="background:#f0f7f0;color:#174d18;border:1px solid #aed5ac;font-size:.72rem;font-weight:600;padding:4px 5px;border-radius:999px;">50 {{ __('slots') }}</span>
                        </td>
                        <td style="color:#6b7280;font-size:.88rem;max-width:260px;">{{ __('~10 km · 18+ · Nordic Walking · 1 aid station · +300 m') }}</td>
                        <td ><a href="{{ route('register', ['distance_id' => 6]) }}" class="bg-lime-600 hover:bg-lime-800 text-white font-bold py-2 px-4 rounded">{{ __('Participate') }}</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="route-cards-mobile show-mobile">
                <!-- Card 1 -->
                <div class="route-card">
                    <div class="route-card-header">
                        <div class="route-card-title">Bugyly Ultra Trail</div>
                        <span class="route-card-badge" style="background:#fee2e2;color:#dc2626;">ULTRA</span>
                    </div>
                    <div class="route-card-info">
                        <div class="route-card-distance">50 km +</div>
                        <div class="route-card-price">21 500 ₸</div>
                    </div>
                    <span class="route-card-slots">100 {{ __('slots') }}</span>
                    <p class="route-card-notes">{{ __('~50 km · 18+ · 5 aid stations · +996 m elevation') }}</p>
                    <a href="{{ route('register', ['distance_id' => 1]) }}" class="btn-green" style="width: 100%;">{{ __('Register Now') }}</a>
                </div>

                <!-- Card 2 -->
                <div class="route-card">
                    <div class="route-card-header">
                        <div class="route-card-title">Bugyly Forest Trail</div>
                        <span class="route-card-badge" style="background:#fff7ed;color:#ea580c;">FOREST</span>
                    </div>
                    <div class="route-card-info">
                        <div class="route-card-distance">21 km +</div>
                        <div class="route-card-price">19 000 ₸</div>
                    </div>
                    <span class="route-card-slots">250 {{ __('slots') }}</span>
                    <p class="route-card-notes">{{ __('~21 km · 18+ · 2 aid stations · +500 m elevation') }}</p>
                    <a href="{{ route('register', ['distance_id' => 2]) }}" class="btn-green" style="width: 100%;">{{ __('Register Now') }}</a>
                </div>

                <!-- Card 3 -->
                <div class="route-card">
                    <div class="route-card-header">
                        <div class="route-card-title">Shaitankol Trail</div>
                        <span class="route-card-badge" style="background:#fefce8;color:#ca8a04;">TRAIL</span>
                    </div>
                    <div class="route-card-info">
                        <div class="route-card-distance">10 km +</div>
                        <div class="route-card-price">14 000 ₸</div>
                    </div>
                    <span class="route-card-slots">320 {{ __('slots') }}</span>
                    <p class="route-card-notes">{{ __('~10 km · 18+ · 1 aid station · +300 m elevation') }}</p>
                    <a href="{{ route('register', ['distance_id' => 3]) }}" class="btn-green" style="width: 100%;">{{ __('Register Now') }}</a>
                </div>

                <!-- Card 4 -->
                <div class="route-card">
                    <div class="route-card-header">
                        <div class="route-card-title">Young Trail</div>
                        <span class="route-card-badge" style="background:#f0fdf4;color:#16a34a;">YOUTH</span>
                    </div>
                    <div class="route-card-info">
                        <div class="route-card-distance">5 km</div>
                        <div class="route-card-price">5 000 ₸</div>
                    </div>
                    <span class="route-card-slots">50 {{ __('slots') }}</span>
                    <p class="route-card-notes">{{ __('Teens 13–17 · +30 m elevation gain') }}</p>
                    <a href="{{ route('register', ['distance_id' => 4]) }}" class="btn-green" style="width: 100%;">{{ __('Register Now') }}</a>
                </div>

                <!-- Card 5 -->
                <div class="route-card">
                    <div class="route-card-header">
                        <div class="route-card-title">Kids Trail</div>
                        <span class="route-card-badge" style="background:#eff6ff;color:#2563eb;">KIDS</span>
                    </div>
                    <div class="route-card-info">
                        <div class="route-card-distance">1 km</div>
                        <div class="route-card-price">3 000 ₸</div>
                    </div>
                    <span class="route-card-slots">30 {{ __('slots') }}</span>
                    <p class="route-card-notes">{{ __('Children 9–12 · +10 m elevation gain') }}</p>
                    <a href="{{ route('register', ['distance_id' => 5]) }}" class="btn-green" style="width: 100%;">{{ __('Register Now') }}</a>
                </div>

                <!-- Card 6 -->
                <div class="route-card">
                    <div class="route-card-header">
                        <div class="route-card-title">Nordic Walking</div>
                        <span class="route-card-badge" style="background:#f5f3ff;color:#7c3aed;">NORDIC</span>
                    </div>
                    <div class="route-card-info">
                        <div class="route-card-distance">10 km +</div>
                        <div class="route-card-price">12 000 ₸</div>
                    </div>
                    <span class="route-card-slots">50 {{ __('slots') }}</span>
                    <p class="route-card-notes">{{ __('~10 km · All ages · 1 aid station · +300 m elevation') }}</p>
                    <a href="{{ route('register', ['distance_id' => 6]) }}" class="btn-green" style="width: 100%;">{{ __('Register Now') }}</a>
                </div>
            </div>

            <p style="text-align:center;margin-top:16px;color:#9ca3af;font-size:.75rem;">
                * {{ __('Prices in Kazakhstani Tenge (₸). Early bird discounts available until June 1, 2025.') }}
            </p>

            <!-- Elevation profile cards -->
            <div class="hidden-mobile" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;margin-top:52px;">
                <!-- Ultra -->
                <div style="background:#f5efe6;border:1px solid #d6ebd5;border-radius:18px;padding:28px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
                        <span class="font-display" style="font-size:1.5rem;color:#2b3a2f;">Bugyly Ultra</span>
                        <span style="background:#fee2e2;color:#dc2626;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;">50 km</span>
                    </div>
                    <div style="display:flex;gap:24px;margin-bottom:18px;">
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Elevation') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.2rem;">+996 m</span></div>
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Aid Stations') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.2rem;">5</span></div>
                    </div>
                    <svg viewBox="0 0 200 55" style="width:100%;height:52px;">
                        <defs><linearGradient id="g1" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ef4444" stop-opacity=".25"/><stop offset="100%" stop-color="#ef4444" stop-opacity="0"/></linearGradient></defs>
                        <polygon points="0,54 18,44 38,30 58,10 75,18 95,7 112,18 130,32 148,24 168,38 200,54" fill="url(#g1)"/>
                        <polyline points="0,54 18,44 38,30 58,10 75,18 95,7 112,18 130,32 148,24 168,38 200,54" fill="none" stroke="#ef4444" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
                <!-- Forest -->
                <div style="background:#f5efe6;border:1px solid #d6ebd5;border-radius:18px;padding:28px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
                        <span class="font-display" style="font-size:1.5rem;color:#2b3a2f;">Forest Trail</span>
                        <span style="background:#fff7ed;color:#ea580c;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;">21 km</span>
                    </div>
                    <div style="display:flex;gap:24px;margin-bottom:18px;">
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Elevation') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.2rem;">+500 m</span></div>
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Aid Stations') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.2rem;">2</span></div>
                    </div>
                    <svg viewBox="0 0 200 55" style="width:100%;height:52px;">
                        <defs><linearGradient id="g2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#f97316" stop-opacity=".25"/><stop offset="100%" stop-color="#f97316" stop-opacity="0"/></linearGradient></defs>
                        <polygon points="0,54 28,40 58,22 88,30 118,16 150,28 180,40 200,54" fill="url(#g2)"/>
                        <polyline points="0,54 28,40 58,22 88,30 118,16 150,28 180,40 200,54" fill="none" stroke="#f97316" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
                <!-- Shaitankol -->
                <div style="background:#f5efe6;border:1px solid #d6ebd5;border-radius:18px;padding:28px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
                        <span class="font-display" style="font-size:1.5rem;color:#2b3a2f;">Shaitankol</span>
                        <span style="background:#fefce8;color:#ca8a04;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;">10 km</span>
                    </div>
                    <div style="display:flex;gap:24px;margin-bottom:18px;">
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Elevation') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.2rem;">+300 m</span></div>
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Aid Stations') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.2rem;">1</span></div>
                    </div>
                    <svg viewBox="0 0 200 55" style="width:100%;height:52px;">
                        <defs><linearGradient id="g3" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#eab308" stop-opacity=".25"/><stop offset="100%" stop-color="#eab308" stop-opacity="0"/></linearGradient></defs>
                        <polygon points="0,54 35,42 70,28 100,34 140,20 175,36 200,54" fill="url(#g3)"/>
                        <polyline points="0,54 35,42 70,28 100,34 140,20 175,36 200,54" fill="none" stroke="#eab308" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div class="elevation-cards-mobile show-mobile" style="margin-top: 32px;">
                <!-- Ultra -->
                <div style="background:#f5efe6;border:1px solid #d6ebd5;border-radius:18px;padding:24px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
                        <span class="font-display" style="font-size:1.35rem;color:#2b3a2f;">Bugyly Ultra</span>
                        <span style="background:#fee2e2;color:#dc2626;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;">50 km</span>
                    </div>
                    <div style="display:flex;gap:24px;margin-bottom:18px;">
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Elevation') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.1rem;">+996 m</span></div>
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Aid Stations') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.1rem;">5</span></div>
                    </div>
                    <svg viewBox="0 0 200 55" style="width:100%;height:48px;">
                        <polygon points="0,54 18,44 38,30 58,10 75,18 95,7 112,18 130,32 148,24 168,38 200,54" fill="url(#g1)"/>
                        <polyline points="0,54 18,44 38,30 58,10 75,18 95,7 112,18 130,32 148,24 168,38 200,54" fill="none" stroke="#ef4444" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
                <!-- Forest -->
                <div style="background:#f5efe6;border:1px solid #d6ebd5;border-radius:18px;padding:24px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
                        <span class="font-display" style="font-size:1.35rem;color:#2b3a2f;">Forest Trail</span>
                        <span style="background:#fff7ed;color:#ea580c;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;">21 km</span>
                    </div>
                    <div style="display:flex;gap:24px;margin-bottom:18px;">
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Elevation') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.1rem;">+500 m</span></div>
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Aid Stations') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.1rem;">2</span></div>
                    </div>
                    <svg viewBox="0 0 200 55" style="width:100%;height:48px;">
                        <polygon points="0,54 28,40 58,22 88,30 118,16 150,28 180,40 200,54" fill="url(#g2)"/>
                        <polyline points="0,54 28,40 58,22 88,30 118,16 150,28 180,40 200,54" fill="none" stroke="#f97316" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
                <!-- Shaitankol -->
                <div style="background:#f5efe6;border:1px solid #d6ebd5;border-radius:18px;padding:24px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
                        <span class="font-display" style="font-size:1.35rem;color:#2b3a2f;">Shaitankol</span>
                        <span style="background:#fefce8;color:#ca8a04;font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;">10 km</span>
                    </div>
                    <div style="display:flex;gap:24px;margin-bottom:18px;">
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Elevation') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.1rem;">+300 m</span></div>
                        <div><span style="color:#9ca3af;font-size:.7rem;display:block;text-transform:uppercase;letter-spacing:.07em;">{{ __('Aid Stations') }}</span><span style="font-weight:700;color:#2b3a2f;font-size:1.1rem;">1</span></div>
                    </div>
                    <svg viewBox="0 0 200 55" style="width:100%;height:48px;">
                        <polygon points="0,54 35,42 70,28 100,34 140,20 175,36 200,54" fill="url(#g3)"/>
                        <polyline points="0,54 35,42 70,28 100,34 140,20 175,36 200,54" fill="none" stroke="#eab308" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PARTNERS ===== -->
    <section id="partners" style="background:#f5efe6;padding:80px 24px;">
        <div style="max-width:1200px;margin:0 auto;">
            <p style="color:#2d7d2b;font-size:.72rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;margin-bottom:8px;text-align:center;">{{ __('Trusted by') }}</p>
            <h2 class="font-display" style="font-size:clamp(2.5rem,5vw,4.5rem);color:#2b3a2f;text-align:center;margin-bottom:48px;">{{ __('OUR PARTNERS') }}</h2>

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:16px;margin-bottom:36px;">
                <div class="partner-box"><span style="font-size:2rem;">🏔</span><span style="font-size:.72rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.08em;">Adidas Terrex</span></div>
                <div class="partner-box"><span style="font-size:2rem;">⚡</span><span style="font-size:.72rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.08em;">Salomon</span></div>
                <div class="partner-box"><span style="font-size:2rem;">📷</span><span style="font-size:.72rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.08em;">GoPro</span></div>
                <div class="partner-box"><span style="font-size:2rem;">⌚</span><span style="font-size:.72rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.08em;">Garmin</span></div>
                <div class="partner-box"><span style="font-size:2rem;">🏅</span><span style="font-size:.72rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.08em;">Active KZ</span></div>
                <div class="partner-box"><span style="font-size:2rem;">🍃</span><span style="font-size:.72rem;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.08em;">Mountain Fuel</span></div>
            </div>

            <p style="text-align:center;color:#9ca3af;font-size:.85rem;">
                {{ __('Interested in sponsoring?') }}
                <a href="mailto:sponsor@bugyltrail.kz" style="color:#2d7d2b;font-weight:600;text-decoration:none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">{{ __('Get in touch →') }}</a>
            </p>
        </div>
    </section>

    <!-- ===== INSTAGRAM CTA ===== -->
    <section style="background:#2b3a2f;padding:72px 24px;text-align:center;">
        <div style="max-width:640px;margin:0 auto;">
            <p style="color:#7ab878;font-size:.72rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;margin-bottom:10px;">{{ __('Follow our journey') }}</p>
            <h2 class="font-display" style="font-size:clamp(2.5rem,6vw,4.5rem);color:white;margin-bottom:16px;">{{ __('SHARE YOUR STORY') }}</h2>
            <p style="color:rgba(255,255,255,.55);font-size:.9rem;line-height:1.7;margin-bottom:28px;">
                {{ __('Tag your training photos with #BugylTrail and get featured on our official page. Join a community of trail runners who love the mountains as much as you do.') }}
            </p>
            <a href="https://instagram.com/bugyltrail" target="_blank"
               style="display:inline-flex;align-items:center;gap:10px;background:linear-gradient(135deg,#f59e0b,#ec4899,#8b5cf6);color:white;font-weight:600;padding:14px 30px;border-radius:999px;text-decoration:none;font-size:.92rem;box-shadow:0 8px 24px rgba(0,0,0,.25);transition:opacity .2s,transform .2s;"
               onmouseover="this.style.opacity='.9';this.style.transform='scale(1.04)'"
               onmouseout="this.style.opacity='1';this.style.transform='scale(1)'">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                @bugyltrail
            </a>
        </div>
    </section>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const t = document.querySelector(a.getAttribute('href'));
                if (t) { e.preventDefault(); t.scrollIntoView({ behavior:'smooth', block:'start' }); }
            });
        });
    </script>
@endsection
