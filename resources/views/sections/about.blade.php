{{-- About card (photo, text, info list) next to the Skills card. --}}
@php
    $email = config('portfolio.email');
    $info = [
        ['icon' => 'bi-person', 'label' => 'Name', 'value' => config('portfolio.name')],
        ['icon' => 'bi-geo-alt', 'label' => 'Location', 'value' => config('portfolio.location')],
        ['icon' => 'bi-envelope', 'label' => 'Email', 'value' => $email, 'href' => $email ? "mailto:{$email}" : null, 'wide' => true],
        ['icon' => 'bi-calendar-check', 'label' => 'Availability', 'value' => config('portfolio.availability'), 'dot' => true, 'wide' => true],
    ];
@endphp

<section class="section" aria-label="About and skills">
    <div class="container">
        <div class="row g-4">

            <div class="col-xl-6" id="about">
                <article class="card-panel h-100" data-reveal>
                    <div class="row g-4">
                        <div class="col-sm-5">
                            @if ($aboutPhotoUrl)
                                <img class="about-photo" src="{{ $aboutPhotoUrl }}" alt="{{ config('portfolio.name') }} with arms crossed" width="640" height="800" loading="lazy">
                            @else
                                <div class="about-photo about-photo-initials" aria-hidden="true">{{ config('portfolio.initials') }}</div>
                            @endif
                        </div>

                        <div class="col-sm-7">
                            <h2 class="section-title">About Me</h2>
                            <div class="about-copy">
                                @foreach (config('portfolio.about.paragraphs') as $paragraph)
                                    <p @class(['mb-0' => $loop->last])>{{ $paragraph }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <ul class="info-list about-info">
                        @foreach ($info as $item)
                            <li @class(['info-wide' => ! empty($item['wide'])])>
                                <span class="icon-box" aria-hidden="true"><i class="bi {{ $item['icon'] }}"></i></span>
                                <span>
                                    <span class="info-label">{{ $item['label'] }}</span>
                                    @if (! empty($item['href']))
                                        <a class="info-value" href="{{ $item['href'] }}">{{ $item['value'] }}</a>
                                    @else
                                        <span class="info-value">
                                            @if (! empty($item['dot']))<span class="status-dot" aria-hidden="true"></span>@endif{{ $item['value'] }}
                                        </span>
                                    @endif
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            </div>

            <div class="col-xl-6" id="skills">
                <article class="card-panel h-100" data-reveal style="--reveal-delay: .08s">
                    <h2 class="section-title">Skills</h2>

                    <div class="row g-3">
                        @foreach (config('portfolio.skills') as $skill)
                            <div class="col-sm-6">
                                <div class="skill-tile lift">
                                    <span class="icon-box" aria-hidden="true"><i class="bi {{ $skill['icon'] }}"></i></span>
                                    <div>
                                        <h3>{{ $skill['group'] }}</h3>
                                        <p>{{ implode(', ', $skill['items']) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
            </div>

        </div>
    </div>
</section>
