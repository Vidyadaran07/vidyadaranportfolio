{{-- Hero: the first screen of the home page, with the stats strip underneath. --}}
@php
    $hero = config('portfolio.hero');
    [$before, $accent, $after] = $hero['headline'];
    $photo = config('portfolio.photo');
    $hasPhoto = $photo && file_exists(public_path($photo));
@endphp

<section id="home" class="hero" aria-labelledby="hero-heading">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-7">
                @if ($availability = config('portfolio.availability'))
                    <div class="status-pill" data-reveal>
                        <span class="status-dot" aria-hidden="true"></span>
                        {{ $availability }}
                    </div>
                @endif

                <div class="hero-intro-row" data-reveal style="--reveal-delay: .05s">
                    @if ($hasPhoto)
                        <img class="avatar" src="{{ asset($photo) }}" alt="Photo of {{ config('portfolio.name') }}" width="52" height="52">
                    @else
                        <span class="avatar avatar-initials" aria-hidden="true">{{ config('portfolio.initials') }}</span>
                    @endif
                    <div class="hero-greeting">
                        {{ $hero['greeting'] }}
                        <span class="hero-role">{{ $hero['role'] }}</span>
                    </div>
                </div>

                <h1 id="hero-heading" class="hero-heading" data-reveal style="--reveal-delay: .1s">
                    {{ $before }} <span class="accent">{{ $accent }}</span> {{ $after }}
                </h1>

                <p class="hero-intro" data-reveal style="--reveal-delay: .15s">{{ $hero['intro'] }}</p>

                <div class="hero-actions" data-reveal style="--reveal-delay: .2s">
                    <a href="#projects" class="btn btn-primary">
                        View my work <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                    </a>
                    <a href="#contact" class="btn btn-ghost-dark">Let's connect</a>
                </div>

                <div data-reveal style="--reveal-delay: .25s">
                    <x-social-links class="hero-links" />
                </div>
            </div>

            <div class="col-lg-5" data-reveal style="--reveal-delay: .2s">
                <x-system-diagram class="surface" />
            </div>

        </div>

        <dl class="stats" data-reveal>
            @foreach (config('portfolio.stats') as $stat)
                <div class="stat">
                    <dt class="stat-value">{{ $stat['value'] }}</dt>
                    <dd class="stat-label mb-0">{{ $stat['label'] }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
