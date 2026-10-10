{{-- Work experience timeline, newest first. --}}
<section id="experience" class="section" aria-labelledby="experience-heading">
    <div class="container">
        <article class="card-panel" data-reveal>
            <h2 id="experience-heading" class="section-title">Experience</h2>

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
                            @if ($job['summary'])
                                <p class="timeline-summary">{{ $job['summary'] }}</p>
                            @endif
                            @if ($job['points'])
                                <ul class="dot-list">
                                    @foreach ($job['points'] as $point)
                                        <li>{{ $point }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ol>
        </article>
    </div>
</section>
