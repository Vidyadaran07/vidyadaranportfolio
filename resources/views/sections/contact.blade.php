{{-- Closing card: career objective and contact in one place. --}}
@php
    $objective = config('portfolio.objective.paragraphs');
    $labels = ['Now', 'Next', 'Long term'];
@endphp

<section id="contact" class="section" aria-labelledby="contact-heading">
    <div class="container">
        <div class="surface closing" data-reveal>
            @if ($availability = config('portfolio.availability'))
                <span class="status-pill">
                    <span class="status-dot" aria-hidden="true"></span>
                    {{ $availability }}
                </span>
            @endif

            <h2 id="contact-heading" class="section-title mt-4">Let's build something <span class="accent">useful</span></h2>
            <p class="lede">{{ config('portfolio.contact.intro') }}</p>

            <div class="contact-actions">
                @if ($email = config('portfolio.email'))
                    <a class="btn btn-primary" href="mailto:{{ $email }}">
                        <i class="bi bi-envelope me-2" aria-hidden="true"></i>{{ $email }}
                    </a>
                @endif
                @if ($linkedin = config('portfolio.linkedin_url'))
                    <a class="btn btn-ghost-dark" href="{{ $linkedin }}" target="_blank" rel="noopener">
                        <i class="bi bi-linkedin me-2" aria-hidden="true"></i>Message on LinkedIn
                    </a>
                @endif
            </div>

            <x-social-links class="contact-links" />

            <div class="objective-points">
                @foreach ($objective as $point)
                    <div>
                        <div class="tile-label">{{ $labels[$loop->index] ?? '' }}</div>
                        {{ $point }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
