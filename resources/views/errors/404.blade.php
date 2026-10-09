{{-- Page not found, in the site's own design. --}}
<x-layouts.app :title="'Page not found | '.config('portfolio.name')">
    <section class="hero not-found" aria-labelledby="not-found-heading">
        <div class="container">
            <p class="hero-greeting">Error 404</p>
            <h1 id="not-found-heading" class="hero-name">Page not found.</h1>
            <p class="hero-intro">The page you are looking for does not exist or has moved.</p>

            <div class="hero-actions">
                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                <a href="{{ route('home') }}#projects" class="btn btn-outline-light-subtle">View Solutions</a>
            </div>
        </div>
    </section>
</x-layouts.app>
