@props([
    'title' => config('portfolio.meta.title'),
    'description' => config('portfolio.meta.description'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Lets CSS hide scroll-reveal elements only when JavaScript is running --}}
    <script>document.documentElement.classList.add('js')</script>

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Social sharing --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('portfolio.name') }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ config('portfolio.name') }}, {{ config('portfolio.title') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('og-image.png') }}">

    <meta name="theme-color" content="#0A0C10">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    {{-- Fonts: Geist (text), Geist Mono (labels), Instrument Serif (accent words) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400..700&family=Geist+Mono:wght@400..600&family=Instrument+Serif:ital@1&display=swap" rel="stylesheet">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <a href="#main" class="skip-link visually-hidden-focusable">Skip to content</a>

    <div class="page-grid" aria-hidden="true"></div>
    <div class="cursor-glow" aria-hidden="true"></div>

    @include('partials.navbar')

    <main id="main">
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>
</html>
