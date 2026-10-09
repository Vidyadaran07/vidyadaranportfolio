{{-- Services I offer. --}}
<section id="services" class="section" aria-labelledby="services-heading">
    <div class="container">
        <article class="card-panel" data-reveal>
            <div class="section-head">
                <h2 id="services-heading" class="section-title">Services</h2>
                <p class="section-note">How I can help with your next project.</p>
            </div>

            <div class="row g-3">
                @foreach (config('portfolio.services') as $service)
                    <div class="col-sm-6 col-lg-3">
                        <div class="service-tile lift">
                            <span class="icon-box" aria-hidden="true"><i class="bi {{ $service['icon'] }}"></i></span>
                            <h3>{{ $service['title'] }}</h3>
                            <p>{{ $service['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="process">
                <h3 class="process-title">How it works</h3>
                <ol class="row g-3 list-unstyled mb-0">
                    @foreach (config('portfolio.process') as $step)
                        <li class="col-sm-6 col-lg-3">
                            <div class="process-step">
                                <span class="step-no" aria-hidden="true">{{ $loop->iteration }}</span>
                                <span class="icon-box" aria-hidden="true"><i class="bi {{ $step['icon'] }}"></i></span>
                                <h4>{{ $step['title'] }}</h4>
                                <p>{{ $step['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </article>
    </div>
</section>
