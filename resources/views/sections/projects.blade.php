{{--
    Solutions I can build: sample concepts offered to clients, labelled as such.
    "Build this" jumps to the contact form with the solution filled in (see app.js).
--}}
@php
    $projects = config('portfolio.projects');
@endphp

<section id="projects" class="section" aria-labelledby="projects-heading">
    <div class="container">
        <article class="card-panel" data-reveal>
            <div class="section-head">
                <h2 id="projects-heading" class="section-title">{{ $projects['title'] }}</h2>
                <p class="section-note">{{ $projects['note'] }}</p>
            </div>

            <div class="row g-4">
                @foreach ($projects['items'] as $project)
                    @php
                        // A real screenshot ({slug}.png) wins over the illustration ({slug}-preview.webp).
                        $screenshot = 'images/projects/'.$project['slug'].'.png';
                        $illustration = 'images/projects/'.$project['slug'].'-preview.webp';
                        $hasScreenshot = is_file(public_path($screenshot));
                        $hasIllustration = ! $hasScreenshot && is_file(public_path($illustration));
                        $offered = ! empty($project['features']);
                    @endphp

                    {{-- Three per row; the last two share the second row (the very last spans the row on tablets) --}}
                    <div @class([
                        'col-md-6 col-lg-4' => $loop->index < 3,
                        'col-lg-6' => $loop->index >= 3,
                        'col-md-12' => $loop->index >= 3 && $loop->last && $loop->count % 2 === 1,
                        'col-md-6' => $loop->index >= 3 && ! ($loop->last && $loop->count % 2 === 1),
                    ])>
                        <div class="project-card lift">
                            <div class="project-thumb">
                                @if ($hasScreenshot)
                                    <img src="{{ asset($screenshot) }}" alt="Screenshot of {{ $project['short_title'] }}" width="1200" height="675" loading="lazy">
                                @elseif ($hasIllustration)
                                    <img src="{{ asset($illustration) }}" alt="Sample concept of a {{ $project['short_title'] }} screen with sample data" width="1200" height="675" loading="lazy">
                                @else
                                    <span class="mock-icon" aria-hidden="true"><i class="bi {{ $project['icon'] }}"></i></span>
                                @endif

                                @if ($offered)
                                    <span class="thumb-note">{{ $projects['badge'] }}</span>
                                @elseif (isset($project['status']))
                                    <span class="thumb-note">{{ $project['status'] }}</span>
                                @endif
                            </div>

                            <div class="project-body">
                                <div class="project-category">{{ $project['category'] }}</div>
                                <h3>{{ $project['short_title'] }}</h3>
                                <p>{{ $project['summary'] }}</p>

                                @if ($offered)
                                    <ul class="project-facts">
                                        <li><i class="bi bi-people" aria-hidden="true"></i><span><strong>Ideal for:</strong> {{ $project['ideal_for'] }}</span></li>
                                        <li><i class="bi bi-clock" aria-hidden="true"></i><span><strong>Typical timeline:</strong> {{ $project['timeline'] }}</span></li>
                                    </ul>
                                @endif

                                <div class="project-foot">
                                    @if ($project['stack'])
                                        <ul class="tag-list" aria-label="Technologies">
                                            @foreach ($project['stack'] as $tech)
                                                <li class="tag">{{ $tech }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @isset($project['status'])
                                        <span class="badge-progress"><span class="status-dot" aria-hidden="true"></span>{{ $project['status'] }}</span>
                                    @endisset

                                    @if ($offered)
                                        <div class="project-actions">
                                            <a href="#contact" class="btn btn-primary btn-sm" data-interest="{{ $project['short_title'] }}">Build this for me</a>
                                            <button type="button" class="link-arrow" data-bs-toggle="modal" data-bs-target="#project-{{ $project['slug'] }}">
                                                What you get <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    @else
                                        <div class="project-actions">
                                            <a href="#contact" class="btn btn-outline-ink btn-sm" data-interest="{{ $project['short_title'] }}">Ask about this</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </div>

    {{-- Detail dialogs --}}
    @foreach ($projects['items'] as $project)
        @continue(empty($project['features']))

        <div class="modal fade project-modal" id="project-{{ $project['slug'] }}" tabindex="-1" aria-labelledby="project-{{ $project['slug'] }}-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <div class="project-category mb-1">{{ $projects['badge'] }} · {{ $project['category'] }}</div>
                            <h3 class="modal-title fs-5" id="project-{{ $project['slug'] }}-title">{{ $project['title'] }}</h3>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">{{ $project['summary'] }}</p>

                        <h4>What you get</h4>
                        <ul class="dot-list">
                            @foreach ($project['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>

                        <h4>Ideal for</h4>
                        <p class="mb-0">{{ $project['ideal_for'] }}</p>

                        <h4>Typical timeline</h4>
                        <p class="mb-0">{{ $project['timeline'] }} for a first version, customised to your business.</p>

                        <h4>Built with</h4>
                        <ul class="tag-list">
                            @foreach ($project['stack'] as $tech)
                                <li class="tag">{{ $tech }}</li>
                            @endforeach
                        </ul>

                        <p class="modal-note">This is a sample concept. Every system is built and customised for your requirements.</p>
                    </div>
                    <div class="modal-footer">
                        {{-- A button, not a link: Bootstrap would treat an href as the element to close --}}
                        <button type="button" class="btn btn-primary w-100" data-interest="{{ $project['short_title'] }}" data-bs-dismiss="modal">
                            Build this for my business
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
