

<nav style="position:sticky;top:0;z-index:50;background:rgba(255,255,255,.97);backdrop-filter:blur(8px);border-bottom:1px solid #e2ece2;">
    <div style="max-width:1200px;margin:0 auto;padding:0 24px;height:64px;display:flex;align-items:center;justify-content:space-between;">
        <!-- Logo -->
        <a href="/" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
            <img src="{{ asset('storage/images/buguly_trail.svg') }}" width="34" height="34" alt="Bugyly Trail">
            <span class="font-display" style="font-size:1.5rem;color:#174d18;letter-spacing:.05em;">BUGYLY TRAIL</span>
        </a>

        <!-- Links -->
        <div style="display:flex;gap:32px;align-items:center;" class="hidden-mobile">
            <a href="#about" class="nav-link">{{ __('About') }}</a>
            <a href="#routes" class="nav-link">{{ __('Routes') }}</a>
            <a href="#gallery" class="nav-link">{{ __('Gallery') }}</a>
            <a href="#partners" class="nav-link">{{ __('Partners') }}</a>
        </div>

        <div style="display:flex;align-items:center;gap:16px;">
        <!-- Language Selector -->
        <div style="position:relative;">
            <select onchange="window.location.href='?lang='+this.value"
                    style="padding:6px 10px;border:1px solid #d0d8d0;border-radius:4px;
                   background:white;color:#174d18;font-size:.85rem;cursor:pointer;">
                <option value="kz" {{ App::getLocale() == 'kz' ? 'selected' : '' }}>KZ</option>
                <option value="ru" {{ App::getLocale() == 'ru' ? 'selected' : '' }}>RU</option>
                <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>EN</option>
            </select>
        </div>



        @auth
            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                {{ __('Dashboard') }}
            </a>
        @else
            <a href="#routes" class="btn-green" style="padding:10px 22px;font-size:.85rem;">
                {{ __('Register Now') }}
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        @endauth
        </div>

    </div>
</nav>
