{{-- Projects: the first one is featured, the rest sit in a grid, then the AI project banner. --}}
@php
    $projects = config('portfolio.projects');
    // Preview tint per card (RGB), in project order.
    $tints = ['43, 179, 170', '96, 165, 250', '167, 139, 250', '251, 191, 36'];
@endphp

<section id="projects" class="section" aria-labelledby="projects-heading">
    <div class="container">
        <div class="section-head" data-reveal>
            <span class="pill">Projects</span>
            <h2 id="projects-heading" class="section-title">Selected <span class="accent">work</span></h2>
            <p class="lede">{{ $projects['note'] }}</p>
        </div>

        <div class="project-grid">
            @foreach ($projects['items'] as $project)
                <article @class(['surface', 'glow-card', 'project-card', 'project-featured' => $loop->first])
                         data-reveal style="--reveal-delay: {{ $loop->first ? 0 : ($loop->index - 1) * 0.08 }}s">
                    <div class="project-preview" style="--tint: {{ $tints[$loop->index % count($tints)] }}" aria-hidden="true">
                        <i class="bi {{ $project['icon'] }}"></i>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="project-meta">
                            <span class="project-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <span>{{ $project['category'] }}</span>
                            @if ($loop->first)
                                <span class="featured-badge">Featured</span>
                            @endif
                        </div>

                        <h3 class="project-title">{{ $project['title'] }}</h3>
                        <p class="project-summary">{{ $project['summary'] }}</p>

                        <ul class="project-areas">
                            @foreach ($project['areas'] as $area)
                                <li>{{ $area }}</li>
                            @endforeach
                        </ul>

                        <ul class="chip-list project-stack" aria-label="Technologies">
                            @foreach ($project['stack'] as $tech)
                                <li class="chip">{{ $tech }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>

        @if ($current = $projects['current'] ?? null)
            <div class="surface current-project" data-reveal>
                <div class="tile-icon" aria-hidden="true"><i class="bi bi-cpu"></i></div>
                <div>
                    <div class="project-meta">
                        Currently building
                        <span class="status-pill py-0 px-2 small"><span class="status-dot" aria-hidden="true"></span>{{ $current['status'] }}</span>
                    </div>
                    <h3 class="project-title mb-1">{{ $current['title'] }}</h3>
                    <p class="project-summary mb-0">{{ $current['summary'] }}</p>
                </div>
            </div>
        @endif
    </div>
</section>
