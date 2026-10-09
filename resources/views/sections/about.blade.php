{{-- About: bento grid of tiles. --}}
@php
    $paragraphs = config('portfolio.about.paragraphs');
@endphp

<section id="about" class="section" aria-labelledby="about-heading">
    <div class="container">
        <div class="section-head" data-reveal>
            <span class="pill">About</span>
            <h2 id="about-heading" class="section-title">A developer who sees the <span class="accent">whole system</span></h2>
        </div>

        <div class="bento">
            <article class="surface glow-card tile-about" data-reveal>
                <div class="tile-label">About me</div>
                <p class="about-lead">{{ $paragraphs[0] }}</p>
                @foreach (array_slice($paragraphs, 1) as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </article>

            <article class="surface glow-card tile-building" data-reveal style="--reveal-delay: .08s">
                <div class="tile-icon" aria-hidden="true"><i class="bi bi-cpu"></i></div>
                <div class="tile-label">Currently building</div>
                <h3 class="tile-title">{{ config('portfolio.projects.current.title') }}</h3>
                <p class="mb-0 text-body-secondary">Exploring how intelligent systems fit into real applications.</p>
            </article>

            <article class="surface glow-card tile-location" data-reveal style="--reveal-delay: .16s">
                <div class="tile-label">Based in</div>
                <div class="location-name">{{ config('portfolio.location') }}</div>
                <p class="location-note">Open to remote and freelance work</p>
                <span class="radar" aria-hidden="true"></span>
            </article>

            <article class="surface glow-card tile-code" data-reveal>
                <div class="code-bar" aria-hidden="true">
                    <span></span><span></span><span></span>
                    <span class="code-file">routes/api.php · the kind of code I write</span>
                </div>
<pre><code><span class="t-cls">Route</span>::<span class="t-fn">post</span>(<span class="t-str">'/leads'</span>, <span class="t-key">function</span> (<span class="t-cls">StoreLeadRequest</span> <span class="t-var">$request</span>) {
    <span class="t-var">$lead</span> = <span class="t-cls">Lead</span>::<span class="t-fn">create</span>(<span class="t-var">$request</span>-><span class="t-fn">validated</span>());

    <span class="t-key">return</span> <span class="t-fn">response</span>()-><span class="t-fn">json</span>(<span class="t-var">$lead</span>, <span class="t-num">201</span>);
});</code></pre>
            </article>

            <a href="#contact" class="surface glow-card tile-contact" data-reveal style="--reveal-delay: .08s">
                <div>
                    <div class="tile-label">Have a project?</div>
                    <h3 class="tile-title mb-0">Let's build it together.</h3>
                </div>
                <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
