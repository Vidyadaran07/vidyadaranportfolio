{{-- Journey: work experience and education on one timeline, newest first. --}}
<section id="journey" class="section" aria-labelledby="journey-heading">
    <div class="container">
        <div class="section-head" data-reveal>
            <span class="pill">Journey</span>
            <h2 id="journey-heading" class="section-title">My <span class="accent">journey</span> so far</h2>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <ol class="timeline">
                    @foreach (config('portfolio.experience') as $job)
                        <li class="timeline-item" data-reveal>
                            <article class="surface glow-card timeline-card">
                                <div class="timeline-top">
                                    <span class="timeline-kind"><i class="bi bi-briefcase" aria-hidden="true"></i> Work</span>
                                    <span class="timeline-date">
                                        @if ($loop->first)
                                            <span class="status-dot" aria-hidden="true"></span> Current ·
                                        @endif
                                        {{ $job['duration'] }}
                                    </span>
                                </div>

                                <h3 class="timeline-role">{{ $job['role'] }}</h3>
                                <div class="timeline-org">
                                    @if ($job['company'])
                                        {{ $job['company'] }}
                                    @else
                                        <x-todo>COMPANY_NAME</x-todo>
                                    @endif
                                </div>

                                <p class="timeline-summary">{{ $job['summary'] }}</p>
                                <ul class="check-list">
                                    @foreach ($job['points'] as $point)
                                        <li><i class="bi bi-check2" aria-hidden="true"></i>{{ $point }}</li>
                                    @endforeach
                                </ul>
                            </article>
                        </li>
                    @endforeach

                    @foreach (config('portfolio.education') as $edu)
                        <li class="timeline-item" data-reveal>
                            <article class="surface glow-card timeline-card">
                                <div class="timeline-top">
                                    <span class="timeline-kind"><i class="bi bi-mortarboard" aria-hidden="true"></i> Education</span>
                                    <span class="timeline-date">{{ $edu['year'] }}</span>
                                </div>

                                <h3 class="timeline-role">{{ $edu['degree'] }}</h3>
                                <div class="timeline-org">{{ $edu['institution'] }}</div>
                                <p class="timeline-summary mb-0">{{ $edu['summary'] }}</p>
                            </article>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
