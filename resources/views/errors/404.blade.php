{{-- Page not found, in the site's own design. --}}
<x-layouts.app :title="'Page not found | '.config('portfolio.name')">
    <section class="hero not-found" aria-labelledby="not-found-heading">
        <div class="container">
            <span class="pill">Error 404</span>
            <h1 id="not-found-heading" class="hero-heading">Page <span class="accent">not found.</span></h1>
            <p class="hero-intro">The page you are looking for does not exist or has moved.</p>

            <div class="hero-actions">
                <a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>
                <a href="{{ route('home') }}#projects" class="btn btn-ghost-dark">View my work</a>
            </div>
        </div>
    </section>
</x-layouts.app>
