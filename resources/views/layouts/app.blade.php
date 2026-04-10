<!DOCTYPE html>
<html lang="en" class="h-full bg-white text-slate-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — Buguly Trail</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

{{-- NAVBAR --}}
@include('partials.navbar')

{{-- MAIN CONTENT --}}
<main class="flex-1">
    @yield('content')
</main>

{{-- FOOTER --}}
@include('partials.footer')
<script>
    // Activity pill toggle
    document.querySelectorAll('.activity-pill').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.activity-pill').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    // Sticky nav shadow on scroll
    const nav = document.querySelector('.nav');
    window.addEventListener('scroll', () => {
        nav.style.boxShadow = window.scrollY > 8
            ? '0 2px 20px rgba(26,20,16,.10)'
            : 'none';
    }, { passive: true });
</script>
</body>
</html>
