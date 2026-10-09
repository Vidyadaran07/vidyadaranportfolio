{{-- Hero: dark band under the navbar with name, role, buttons and photo. --}}
@php
    $hero = config('portfolio.hero');
@endphp

<section id="home" class="hero" aria-labelledby="hero-heading">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-7 order-2 order-lg-1">
                <p class="hero-greeting" data-reveal>{{ $hero['greeting'] }}</p>
                <h1 id="hero-heading" class="hero-name" data-reveal style="--reveal-delay: .05s">
                    <x-brand-name />
                </h1>
                <p class="hero-role" data-reveal style="--reveal-delay: .1s">{{ config('portfolio.title') }}</p>

                <ul class="hero-highlights" data-reveal style="--reveal-delay: .12s">
                    @foreach ($hero['highlights'] as $highlight)
                        <li>{{ $highlight }}</li>
                    @endforeach
                </ul>

                <p class="hero-intro" data-reveal style="--reveal-delay: .15s">{{ $hero['intro'] }}</p>

                <div class="hero-actions" data-reveal style="--reveal-delay: .2s">
                    <a href="#projects" class="btn btn-primary">View Solutions</a>
                    <a href="#contact" class="btn btn-outline-light-subtle">Contact Me</a>
                </div>

                <div data-reveal style="--reveal-delay: .25s">
                    <x-social-links />
                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2" data-reveal style="--reveal-delay: .1s">
                <div class="hero-photo">
                    @if ($photoUrl)
                        <img src="{{ $photoUrl }}" alt="Portrait of {{ config('portfolio.name') }}" width="800" height="800" fetchpriority="high">
                    @else
                        <span class="photo-initials" aria-hidden="true">{{ config('portfolio.initials') }}</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
