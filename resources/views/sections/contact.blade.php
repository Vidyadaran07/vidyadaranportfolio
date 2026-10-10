{{-- "Why work with me" card next to the Contact card (details + message form). --}}
@php
    $email = config('portfolio.email');
    $linkedin = config('portfolio.linkedin_url');
    $why = config('portfolio.why');
@endphp

<section id="contact" class="section" aria-label="Why work with me and contact">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-4">
                <article class="card-panel why-card" data-reveal>
                    <span class="icon-box" aria-hidden="true"><i class="bi bi-patch-check"></i></span>
                    <h2>{{ $why['title'] }}</h2>
                    <ul class="dot-list">
                        @foreach ($why['points'] as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>

                    <div class="why-actions">
                        @if ($linkedin)
                            <a class="btn btn-outline-ink" href="{{ $linkedin }}" target="_blank" rel="noopener">
                                <i class="bi bi-linkedin me-2" aria-hidden="true"></i>View on LinkedIn
                            </a>
                        @endif
                    </div>
                </article>
            </div>

            <div class="col-lg-8">
                <article class="card-panel h-100" data-reveal style="--reveal-delay: .08s">
                    <div class="row g-4">
                        <div class="col-md-5">
                            <h2 class="section-title">Contact Me</h2>
                            <p class="mb-4">{{ config('portfolio.contact.intro') }}</p>

                            <ul class="info-list">
                                @if ($email)
                                    <li>
                                        <span class="icon-box" aria-hidden="true"><i class="bi bi-envelope"></i></span>
                                        <span>
                                            <span class="info-label">Email</span>
                                            <a class="info-value" href="mailto:{{ $email }}">{{ $email }}</a>
                                        </span>
                                    </li>
                                @endif
                                @if ($linkedin)
                                    <li>
                                        <span class="icon-box" aria-hidden="true"><i class="bi bi-linkedin"></i></span>
                                        <span>
                                            <span class="info-label">LinkedIn</span>
                                            <a class="info-value" href="{{ $linkedin }}" target="_blank" rel="noopener">Vidyadaran M</a>
                                        </span>
                                    </li>
                                @endif
                                <li>
                                    <span class="icon-box" aria-hidden="true"><i class="bi bi-geo-alt"></i></span>
                                    <span>
                                        <span class="info-label">Location</span>
                                        <span class="info-value">{{ config('portfolio.location') }}</span>
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-7">
                            @if (session('contact_sent'))
                                <div class="alert alert-success d-flex gap-2" role="status">
                                    <i class="bi bi-check-circle" aria-hidden="true"></i>
                                    <span>Thanks! Your message has been sent. I will get back to you soon.</span>
                                </div>
                            @endif

                            @if (session('contact_failed'))
                                <div class="alert alert-danger d-flex gap-2" role="alert">
                                    <i class="bi bi-exclamation-triangle" aria-hidden="true"></i>
                                    <span>Sorry, your message could not be sent right now. Please email me directly at <a href="mailto:{{ $email }}">{{ $email }}</a>.</span>
                                </div>
                            @endif

                            <form class="contact-form" method="POST" action="{{ route('contact.send') }}" novalidate>
                                @csrf

                                {{-- Spam trap: hidden from people, filled in by bots --}}
                                <div class="form-trap" aria-hidden="true">
                                    <label for="website">Website</label>
                                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="contact-name" class="form-label">Your name</label>
                                    <input type="text" id="contact-name" name="name" value="{{ old('name') }}" required maxlength="100" autocomplete="name"
                                           @class(['form-control', 'is-invalid' => $errors->has('name')])
                                           @error('name') aria-describedby="contact-name-error" @enderror>
                                    @error('name')<div id="contact-name-error" class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact-email" class="form-label">Your email</label>
                                    <input type="email" id="contact-email" name="email" value="{{ old('email') }}" required maxlength="150" autocomplete="email"
                                           @class(['form-control', 'is-invalid' => $errors->has('email')])
                                           @error('email') aria-describedby="contact-email-error" @enderror>
                                    @error('email')<div id="contact-email-error" class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact-message" class="form-label">Message</label>
                                    <textarea id="contact-message" name="message" required minlength="10" maxlength="3000" rows="5"
                                              @class(['form-control', 'is-invalid' => $errors->has('message')])
                                              @error('message') aria-describedby="contact-message-error" @enderror>{{ old('message') }}</textarea>
                                    @error('message')<div id="contact-message-error" class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-send me-2" aria-hidden="true"></i>Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>

        </div>
    </div>
</section>
