{{-- Real projects from my jobs, right after the experience timeline. --}}
@php
    $work = config('portfolio.work');
@endphp

<section id="work" class="section" aria-labelledby="work-heading">
    <div class="container">
        <article class="card-panel" data-reveal>
            <div class="section-head">
                <h2 id="work-heading" class="section-title">{{ $work['title'] }}</h2>
                <p class="section-note">{{ $work['note'] }}</p>
            </div>

            <div class="row g-3">
                @foreach ($work['items'] as $item)
                    <div class="col-sm-6 col-lg-3">
                        <div class="service-tile lift">
                            <span class="icon-box" aria-hidden="true"><i class="bi {{ $item['icon'] }}"></i></span>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                            <ul class="tag-list mt-3" aria-label="Technologies">
                                @foreach ($item['stack'] as $tech)
                                    <li class="tag">{{ $tech }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </div>
</section>
