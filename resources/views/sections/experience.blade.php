{{-- Experience and education on one timeline, newest first. --}}
<section id="experience" class="section" aria-labelledby="experience-heading">
    <div class="container">
        <article class="card-panel" data-reveal>
            <h2 id="experience-heading" class="section-title">Experience &amp; Education</h2>

            <ol class="timeline">
                @foreach (config('portfolio.experience') as $job)
                    <li class="timeline-item">
                        <span class="icon-box" aria-hidden="true"><i class="bi bi-briefcase"></i></span>
                        <div>
                            <div class="timeline-head">
                                <div>
                                    <h3 class="timeline-role">{{ $job['role'] }}</h3>
                                    <div class="timeline-org">
                                        @if ($job['company'])
                                            {{ $job['company'] }}
                                        @else
                                            <x-todo>COMPANY_NAME</x-todo>
                                        @endif
                                    </div>
                                </div>
                                <div class="timeline-date">
                                    @if ($loop->first)<span class="status-dot" aria-hidden="true"></span>@endif{{ $job['duration'] }}
                                </div>
                            </div>
                            <p class="timeline-summary">{{ $job['summary'] }}</p>
                            <ul class="dot-list">
                                @foreach ($job['points'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach

                @foreach (config('portfolio.education') as $edu)
                    <li class="timeline-item">
                        <span class="icon-box" aria-hidden="true"><i class="bi bi-mortarboard"></i></span>
                        <div>
                            <div class="timeline-head">
                                <div>
                                    <h3 class="timeline-role">{{ $edu['degree'] }}</h3>
                                    <div class="timeline-org">{{ $edu['institution'] }}</div>
                                </div>
                                <div class="timeline-date">{{ $edu['year'] }}</div>
                            </div>
                            <p class="timeline-summary mb-0">{{ $edu['summary'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </article>
    </div>
</section>
