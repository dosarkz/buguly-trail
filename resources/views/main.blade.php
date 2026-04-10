@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <section class="hero">
        <div class="container" style="display:contents;">
            <video autoplay loop muted class="video-slide">
                <source src="{{ asset('storage/video_slide4.mp4') }}" type="video/mp4">
{{--                <source src="{{ asset('storage/video_slide.mp4') }}" type="video/mp4">--}}
            </video>
            <div class="hero__content" style="padding-inline: clamp(1.5rem, 5vw, 3rem);">

                <h1 class="hero__title">Жұмақ та, жұмбақ өлкем - <br> <em><b>Қарқаралым!</b></em></h1>
                <p class="hero__subtitle">Наш маршрут проходит мимо легендарного озера Шайтанколь (Чёртово озеро), окружено скалистым кратером потухшего вулкана.</p>
                <div class="hero__actions">
                    <a href="{{route('register')}}" class="btn btn-white">Принять участие</a>
                </div>

            </div>

            <div class="hero__visual" style="padding-inline-end: clamp(1.5rem, 5vw, 3rem);">
                <div class="hero__map-card">
                    <div class="hero__map-img">
                        <!-- Topo lines SVG -->
                        <svg width="100%" height="100%" viewBox="0 0 520 300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" style="position:absolute;inset:0;">
                            <path d="M0,200 Q130,140 260,160 T520,130" fill="none" stroke="white" stroke-width="1.5"/>
                            <path d="M0,220 Q130,160 260,180 T520,150" fill="none" stroke="white" stroke-width="1.5"/>
                            <path d="M0,240 Q130,180 260,200 T520,170" fill="none" stroke="white" stroke-width="1.5"/>
                            <path d="M0,170 Q100,100 240,130 T520,100" fill="none" stroke="white" stroke-width="1"/>
                            <path d="M0,150 Q100,80 230,110 T520,80"  fill="none" stroke="white" stroke-width="1"/>
                        </svg>
                        <!-- Map pin -->
                        <div class="hero__map-pin" style="top:38%; left:54%;"></div>
                    </div>
                    <div class="hero__route-info">
                        <div style="font-weight:700; font-size:1rem; margin-bottom:.5rem; color:var(--clr-earth);">Bugyly Ultra Trail — 50km +</div>
                        <div class="hero__route-meta">
                            <span class="hero__route-badge hero__route-badge--green">Easy</span>
                            <span class="hero__route-badge">Hiking</span>
                            <span class="hero__route-badge">Scenic</span>
                        </div>
                        <div class="hero__route-stats">
                            <span class="hero__route-stat"><strong>14.2 km</strong> distance</span>
                            <span class="hero__route-stat"><strong>320 m</strong> elevation</span>
                            <span class="hero__route-stat"><strong>3h 20m</strong> est.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ───────── ACTIVITY TYPES ───────── -->
    <section class="activities">
        <div class="container">
            <div class="section-header section-header--center">
                <p class="label">Explore your way</p>
                <h2>Every outdoor sport,<br><em style="font-style:italic; color:var(--clr-moss);">perfectly planned</em></h2>
            </div>
            <div class="activities__grid">
                <button class="activity-pill active">
                    <span class="activity-pill__icon">🥾</span>
                    <span class="activity-pill__name">Hiking</span>
                </button>
                <button class="activity-pill">
                    <span class="activity-pill__icon">🚵</span>
                    <span class="activity-pill__name">Mountain Bike</span>
                </button>
                <button class="activity-pill">
                    <span class="activity-pill__icon">🚴</span>
                    <span class="activity-pill__name">Road Cycling</span>
                </button>
                <button class="activity-pill">
                    <span class="activity-pill__icon">🏃</span>
                    <span class="activity-pill__name">Trail Running</span>
                </button>
                <button class="activity-pill">
                    <span class="activity-pill__icon">🎿</span>
                    <span class="activity-pill__name">Nordic Skiing</span>
                </button>
            </div>
        </div>
    </section>

    <!-- ───────── FEATURES ───────── -->
    <section class="features">
        <div class="container">
            <div class="section-header" style="max-width:540px;">
                <p class="label">Why komoot</p>
                <h2>Everything you need for the<br><em style="font-style:italic; color:var(--clr-moss);">perfect adventure</em></h2>
            </div>
            <div class="features__grid">
                <div class="feature-block">
                    <div class="feature-block__icon">🗺️</div>
                    <h3>Smart route planning</h3>
                    <p>Generate sport-specific routes adapted to your fitness level. Choose smooth asphalt, singletracks, or peaceful forest trails with a single click.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-block__icon">🔍</div>
                    <h3>Discover new places</h3>
                    <p>Filter by distance, difficulty, or transport links. Millions of community-approved tips and photos guide you to the best spots near you.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-block__icon">🧭</div>
                    <h3>Offline navigation</h3>
                    <p>Turn-by-turn voice guidance works even without signal. Download your route before you leave and explore freely, deep in the wilderness.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-block__icon">📸</div>
                    <h3>Share your story</h3>
                    <p>Post photos and highlights from your latest adventure. Inspire 45 million explorers and build your outdoor reputation in the community.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ───────── COLLECTIONS ───────── -->
    <section class="collections">
        <div class="container">
            <div class="section-header" style="display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <p class="label">Curated collections</p>
                    <h2>The world's greatest<br><em style="font-style:italic; color:var(--clr-moss);">outdoor routes</em></h2>
                </div>
                <a href="#" class="btn btn-ghost" style="flex-shrink:0; margin-bottom:1rem;">Browse all →</a>
            </div>
            <div class="collections__scroll">

                <a href="#" class="collection-card">
                    <div class="collection-card__img">
                        <span class="collection-card__tag">Road Cycling</span>
                    </div>
                    <div class="collection-card__body">
                        <p class="collection-card__title">North Coast 500 – Escape to the Highlands</p>
                        <div class="collection-card__meta">
                            <div class="collection-card__avatar"></div>
                            <span>Liam Yates · 15 stages</span>
                        </div>
                    </div>
                </a>

                <a href="#" class="collection-card">
                    <div class="collection-card__img">
                        <span class="collection-card__tag">Hiking</span>
                    </div>
                    <div class="collection-card__body">
                        <p class="collection-card__title">John Muir Trail – Sierra Nevada</p>
                        <div class="collection-card__meta">
                            <div class="collection-card__avatar"></div>
                            <span>Caro "Bandit" · 21 stages</span>
                        </div>
                    </div>
                </a>

                <a href="#" class="collection-card">
                    <div class="collection-card__img">
                        <span class="collection-card__tag">Hiking</span>
                    </div>
                    <div class="collection-card__body">
                        <p class="collection-card__title">GR20 – Europe's toughest trail, Corsica</p>
                        <div class="collection-card__meta">
                            <div class="collection-card__avatar"></div>
                            <span>Vanessa · 16 stages</span>
                        </div>
                    </div>
                </a>

                <a href="#" class="collection-card">
                    <div class="collection-card__img">
                        <span class="collection-card__tag">Mountain Bike</span>
                    </div>
                    <div class="collection-card__body">
                        <p class="collection-card__title">Colorado Trail – Ten incredible days in the Rockies</p>
                        <div class="collection-card__meta">
                            <div class="collection-card__avatar"></div>
                            <span>Joey · 10 stages</span>
                        </div>
                    </div>
                </a>

                <a href="#" class="collection-card">
                    <div class="collection-card__img">
                        <span class="collection-card__tag">Cycling</span>
                    </div>
                    <div class="collection-card__body">
                        <p class="collection-card__title">India to Nepal – An unforeseen journey</p>
                        <div class="collection-card__meta">
                            <div class="collection-card__avatar"></div>
                            <span>Robin Patijn · 18 stages</span>
                        </div>
                    </div>
                </a>

                <a href="#" class="collection-card">
                    <div class="collection-card__img">
                        <span class="collection-card__tag">Mountain Bike</span>
                    </div>
                    <div class="collection-card__body">
                        <p class="collection-card__title">European Divide Trail – 7,600 km across the continent</p>
                        <div class="collection-card__meta">
                            <div class="collection-card__avatar"></div>
                            <span>European Divide Trail · 42 stages</span>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- ───────── APP BANNER ───────── -->
    <section class="app-banner">
        <div class="container">
            <div class="app-banner__inner">
                <div>
                    <p class="label">Get the app</p>
                    <h2>Your adventure starts<br>in your pocket</h2>
                    <p>Navigate offline, plan on the go, and capture every moment. Available for iOS and Android — free to download.</p>
                    <div class="app-banner__stores">
                        <a href="#" class="store-btn">
                            <span class="store-btn__icon">🍎</span>
                            <span>App Store</span>
                        </a>
                        <a href="#" class="store-btn">
                            <span class="store-btn__icon">▶</span>
                            <span>Google Play</span>
                        </a>
                    </div>
                </div>
                <div class="app-banner__mockup">
                    <div class="phone-frame">
                        <div class="phone-frame__screen"></div>
                    </div>
                    <div class="phone-frame phone-frame--tall">
                        <div class="phone-frame__screen" style="background:linear-gradient(160deg,#3a5c2e 0%,#6a9e5e 60%,#1a3018 100%);"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ───────── TESTIMONIALS ───────── -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header section-header--center">
                <p class="label">Community love</p>
                <h2>Loved by explorers<br><em style="font-style:italic; color:var(--clr-moss);">everywhere</em></h2>
            </div>
            <div class="testimonials__grid">
                <div class="testimonial-card">
                    <div class="testimonial-card__stars">★★★★★</div>
                    <blockquote>"Komoot has completely changed how I plan my cycling trips. The route suggestions are spot on and the offline maps saved me more than once in the mountains."</blockquote>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__avatar" style="background:#c6dbbf;"></div>
                        <div>
                            <p class="testimonial-card__name">Sophie M.</p>
                            <p class="testimonial-card__role">Road cyclist · UK</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-card__stars">★★★★★</div>
                    <blockquote>"The community highlights on trails are pure gold. I've discovered so many hidden gems just from tips left by other hikers. It's like having a local guide."</blockquote>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__avatar" style="background:#b5d4f4;"></div>
                        <div>
                            <p class="testimonial-card__name">Marcus T.</p>
                            <p class="testimonial-card__role">Hiker · Germany</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-card__stars">★★★★★</div>
                    <blockquote>"I use komoot every weekend for trail running. The elevation profiles and surface data are incredibly accurate. I can't imagine exploring without it now."</blockquote>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__avatar" style="background:#fde8d8;"></div>
                        <div>
                            <p class="testimonial-card__name">Elena R.</p>
                            <p class="testimonial-card__role">Trail runner · Spain</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
