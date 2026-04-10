<nav class="nav">
    <div class="container nav__inner">
        <a href="/" class="text-nav__logo">
            <img src="{{ asset('storage/images/buguly_trail.svg') }}" width="130" alt="Bugyly Trail">
        </a>
        <ul class="nav__links">
            <li><a href="#">Результаты</a></li>
            <li><a href="#">Стартовый протокол</a></li>
            <li><a href="#">О нас</a></li>
        </ul>
        <div class="nav__actions">

            @auth
                <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Dashboard
                </a>
            @else
                <a href="#" class="btn btn-ghost" style="padding:.55rem 1.2rem; font-size:.85rem;">Войти</a>
                <a href="{{ route('register') }}" class="btn btn-blue" style="padding:.55rem 1.2rem; font-size:.85rem;">Регистрация</a>
            @endauth


        </div>
    </div>
</nav>

