@php
    $onHome = request()->routeIs('home');
    // On the home page links scroll to sections; elsewhere they go back home first.
    $sectionUrl = fn (string $id) => $onHome ? "#{$id}" : route('home')."#{$id}";
@endphp

{{-- Floating glass pill; the wrapper keeps it sticky at the top. --}}
<div class="site-nav-wrap">
    <nav class="navbar navbar-expand-lg site-nav" aria-label="Main">
        <a class="navbar-brand" href="{{ $sectionUrl('home') }}">
            <span class="brand-mark" aria-hidden="true">{ }</span>
            {{ config('portfolio.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#siteMenu"
                aria-controls="siteMenu" aria-expanded="false" aria-label="Open menu">
            <i class="bi bi-list" aria-hidden="true"></i>
        </button>

        <div class="collapse navbar-collapse" id="siteMenu">
            <ul class="navbar-nav mx-lg-auto">
                @foreach (config('portfolio.nav') as $id => $label)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $sectionUrl($id) }}" data-section="{{ $id }}">{{ $label }}</a>
                    </li>
                @endforeach
            </ul>

            <a class="btn btn-primary btn-sm nav-cta" href="{{ $sectionUrl('contact') }}">Hire me</a>
        </div>
    </nav>
</div>
