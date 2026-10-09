@php
    $onHome = request()->routeIs('home');
    $sectionUrl = fn (string $id) => $onHome ? "#{$id}" : route('home')."#{$id}";
    $nav = config('portfolio.nav');
@endphp

<footer class="site-footer">
    <div class="container">
        <div class="footer-card">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="footer-name"><x-brand-name /></div>
                    <p class="footer-tagline">{{ config('portfolio.tagline') }}</p>
                    <x-social-links />
                </div>

                <div class="col-6 col-lg-3 offset-lg-1">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul class="footer-links">
                        @foreach (config('portfolio.footer_nav') as $id)
                            <li><a href="{{ $sectionUrl($id) }}">{{ $nav[$id] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-6 col-lg-3">
                    <h2 class="footer-heading">My Services</h2>
                    <ul class="footer-links">
                        @foreach (config('portfolio.services') as $service)
                            <li><a href="{{ $sectionUrl('services') }}">{{ $service['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="footer-base d-flex flex-column flex-md-row justify-content-between gap-2">
                <span>&copy; {{ now()->year }} {{ config('portfolio.name') }}. All rights reserved.</span>
                <span>Built with Laravel</span>
            </div>
        </div>
    </div>
</footer>
