<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white text-slate-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — Buguly Trail</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-sand text-dusk">

{{-- NAVBAR --}}
@include('partials.navbar')

{{-- MAIN CONTENT --}}
<main class="flex-1">
    @yield('content')
</main>

{{-- FOOTER --}}
@include('partials.footer')
</body>
</html>
