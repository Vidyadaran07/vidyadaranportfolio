{{-- Skills: scrolling logo strip, then grouped skills and application areas. --}}
@php
    $logos = config('portfolio.logos');
@endphp

<section id="skills" class="section" aria-labelledby="skills-heading">
    <div class="container">
        <div class="section-head" data-reveal>
            <span class="pill">Skills</span>
            <h2 id="skills-heading" class="section-title">Tools I <span class="accent">build</span> with</h2>
            <p class="lede">Backend-first, with the frontend, database and tooling needed to ship complete features.</p>
        </div>
    </div>

    {{-- The list is rendered twice so the strip loops seamlessly; the copy is hidden from screen readers. --}}
    <div class="marquee" data-reveal>
        <div class="marquee-track">
            @foreach ([false, true] as $isCopy)
                <ul class="d-flex gap-3 list-unstyled m-0" @if ($isCopy) aria-hidden="true" @endif>
                    @foreach ($logos as $name => $icon)
                        <li class="logo-chip"><i class="{{ $icon }}" aria-hidden="true"></i>{{ $name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row g-3 skill-groups">
            @foreach (config('portfolio.skills') as $skill)
                <div class="col-sm-6 col-lg-3" data-reveal style="--reveal-delay: {{ $loop->index * 0.06 }}s">
                    <div class="surface glow-card skill-group">
                        <h3 class="skill-group-title">
                            <i class="bi {{ $skill['icon'] }}" aria-hidden="true"></i>
                            {{ $skill['group'] }}
                        </h3>
                        <ul class="chip-list">
                            @foreach ($skill['items'] as $item)
                                <li class="chip">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="surface areas-strip" data-reveal>
            <h3 class="skill-group-title mb-0">
                <i class="bi bi-briefcase" aria-hidden="true"></i>
                Application areas
            </h3>
            <ul class="chip-list">
                @foreach (config('portfolio.application_areas') as $area)
                    <li class="chip">{{ $area }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
