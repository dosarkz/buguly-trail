

<nav class="main-nav">
    <div class="container-wide navbar-inner flex-between">
        <!-- Logo -->
        <a href="/" class="logo-link">
            <img src="{{ asset('storage/images/buguly_trail.svg') }}" width="34" height="34" alt="Bugyly Trail">
            <span class="font-display logo-text">BUGYLY TRAIL</span>
        </a>

        <!-- Links -->
        <div class="nav-links-desktop hidden-mobile">
            <a href="/#about" class="nav-link">{{ __('About') }}</a>
            <a href="/#routes" class="nav-link">{{ __('Routes') }}</a>
            <a href="/#gallery" class="nav-link">{{ __('Gallery') }}</a>
            <a href="{{route('participants')}}" class="nav-link">{{ __('Participants') }}</a>
            <a href="/#partners" class="nav-link">{{ __('Partners') }}</a>
        </div>

        <div class="nav-actions">
            <!-- Language Selector -->
            <div class="hidden-mobile" style="position:relative;">
                <select onchange="window.location.href='?lang='+this.value"
                        style="padding:6px 10px;border:1px solid #d0d8d0;border-radius:4px;
                       background:white;color:#174d18;font-size:.85rem;cursor:pointer;">
                    <option value="kz" {{ App::getLocale() == 'kz' ? 'selected' : '' }}>KZ</option>
                    <option value="ru" {{ App::getLocale() == 'ru' ? 'selected' : '' }}>RU</option>
                    <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                </select>
            </div>

            @auth
                <div class="flex-center" style="gap: 12px;">
                    <a href="{{ url('/profile') }}" class="bg-transparent hover:bg-lime-800 text-lime-700 font-semibold hover:text-white py-2 px-4 border border-lime-500 hover:border-transparent rounded">
                        {{ __('Dashboard') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn-logout">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>
            @else
                <div class="flex-center" style="gap: 20px;">
                    <a href="{{ route('login') }}" class="nav-link hidden-mobile" style="font-weight: 600;">{{ __('Login') }}</a>
                    <a href="/#routes" class="btn-green" id="register-btn" style="padding:10px 22px;font-size:.85rem;">
                        {{ __('Register Now') }}
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @endauth

            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-toggle" class="show-mobile" style="background:none; border:none; color:#174d18; cursor:pointer; padding:5px;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu">
        <div class="mobile-menu-header">
            <div class="flex-center" style="gap:10px;">
                <img src="{{ asset('storage/images/buguly_trail.svg') }}" width="30" height="30" alt="Bugyly Trail">
                <span class="font-display" style="font-size:1.25rem; color:#174d18; letter-spacing:.05em;">BUGYLY TRAIL</span>
            </div>
            <button id="mobile-menu-close" style="background:none; border:none; color:#174d18; cursor:pointer; padding:5px;">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="mobile-menu-content">
            <a href="/#about" class="mobile-nav-link">
                {{ __('About') }}
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="/#routes" class="mobile-nav-link">
                {{ __('Routes') }}
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="/#gallery" class="mobile-nav-link">
                {{ __('Gallery') }}
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{route('participants')}}" class="mobile-nav-link">
                {{ __('Participants') }}
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="/#partners" class="mobile-nav-link">
                {{ __('Partners') }}
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <div style="margin-top: 24px;">
                @auth
                    <a href="{{ url('/profile') }}" class="mobile-nav-link">
                        {{ __('Dashboard') }}
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="margin-top: 16px;">
                        @csrf
                        <button type="submit" style="width:100%; text-align:left; background:none; border:none; color:#dc2626; font-size:1.125rem; font-weight:500; cursor:pointer; padding:16px 0; border-bottom:1px solid #f0f0f0;">
                            {{ __('Logout') }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mobile-nav-link">
                        {{ __('Login') }}
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="/#register" class="mobile-nav-link">
                        {{ __('Register Now') }}
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                @endauth
            </div>
        </div>

        <div style="margin-top: auto; padding-top: 32px;">
             <label style="display:block; font-size:0.75rem; color:#6b7280; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">
                 {{ __('Language') }}
             </label>
             <div class="mobile-lang-grid">
                 <a href="?lang=kz" class="mobile-lang-item {{ App::getLocale() == 'kz' ? 'active' : '' }}">KZ</a>
                 <a href="?lang=ru" class="mobile-lang-item {{ App::getLocale() == 'ru' ? 'active' : '' }}">RU</a>
                 <a href="?lang=en" class="mobile-lang-item {{ App::getLocale() == 'en' ? 'active' : '' }}">EN</a>
             </div>
        </div>
    </div>

    <script>
        const toggle = document.getElementById('mobile-menu-toggle');
        const closeBtn = document.getElementById('mobile-menu-close');
        const menu = document.getElementById('mobile-menu');

        const toggleMenu = (show) => {
            menu.classList.toggle('is-active', show);
            document.body.style.overflow = show ? 'hidden' : '';
        };

        if (toggle && menu) {
            toggle.addEventListener('click', () => toggleMenu(true));
            if (closeBtn) {
                closeBtn.addEventListener('click', () => toggleMenu(false));
            }

            // Close menu on link click
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        toggleMenu(false);
                    }
                });
            });
        }
    </script>
</nav>
