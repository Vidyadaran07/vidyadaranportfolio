{{--
    Hero visual: how a typical project fits together.
    Browser -> Laravel application -> MySQL, with business modules and APIs on the right.
    Two drawings: a wide one for tablets and desktops, a compact vertical one for phones,
    so the labels stay readable on every screen.
--}}
<figure {{ $attributes->merge(['class' => 'system-diagram']) }}>
    <svg class="diagram-wide" viewBox="0 0 520 400" role="img" aria-labelledby="diagram-title diagram-desc">
        <title id="diagram-title">How my work fits together</title>
        <desc id="diagram-desc">A browser talks to a Laravel application. The application stores data in MySQL and powers CRM, HRM, payroll and booking modules, and connects to REST APIs.</desc>

        {{-- Browser --}}
        <rect class="node" x="20" y="24" width="190" height="56" rx="10"/>
        <text class="label" x="40" y="50">Browser</text>
        <text class="sublabel" x="40" y="68">users, admins</text>

        {{-- Browser to Laravel --}}
        <path class="link link-main" d="M115 80 V140"/>
        <circle class="packet packet-flow" r="3.5"><animateMotion dur="2.2s" begin="0s" repeatCount="indefinite" path="M115 80 V140"/></circle>

        {{-- Laravel application --}}
        <rect class="node node-core" x="20" y="140" width="262" height="120" rx="12"/>
        <text class="title" x="40" y="174">Laravel application</text>
        <text class="sublabel" x="40" y="200">routes / middleware / controllers</text>
        <text class="sublabel" x="40" y="220">auth / business logic / jobs</text>
        <text class="sublabel" x="40" y="240">blade views / REST endpoints</text>

        {{-- Laravel to MySQL --}}
        <path class="link link-main" d="M115 260 V316"/>
        <circle class="packet packet-flow" r="3.5"><animateMotion dur="2.2s" begin="-1.1s" repeatCount="indefinite" path="M115 260 V316"/></circle>

        {{-- MySQL --}}
        <rect class="node" x="20" y="316" width="190" height="56" rx="10"/>
        <text class="label" x="40" y="342">MySQL</text>
        <text class="sublabel" x="40" y="360">relations, multi-db</text>

        {{-- Connections to external services --}}
        <path class="link" d="M282 175 C 310 175, 310 52, 340 52"/>
        <path class="link" d="M282 190 C 320 190, 310 136, 340 136"/>
        <circle class="packet packet-flow" r="3"><animateMotion dur="3s" begin="-0.6s" repeatCount="indefinite" path="M282 175 C 310 175, 310 52, 340 52"/></circle>
        <circle class="packet packet-flow" r="3"><animateMotion dur="3s" begin="-2s" repeatCount="indefinite" path="M282 235 C 310 235, 310 304, 340 304"/></circle>
        <path class="link" d="M282 215 C 320 215, 310 220, 340 220"/>
        <path class="link" d="M282 235 C 310 235, 310 304, 340 304"/>

        {{-- External services --}}
        <rect class="node" x="340" y="28" width="160" height="48" rx="10"/>
        <text class="label" x="358" y="57">REST APIs</text>
        <rect class="node" x="340" y="112" width="160" height="48" rx="10"/>
        <text class="label" x="358" y="141">CRM / leads</text>
        <rect class="node" x="340" y="196" width="160" height="48" rx="10"/>
        <text class="label" x="358" y="225">HRM / Payroll</text>
        <rect class="node" x="340" y="280" width="160" height="48" rx="10"/>
        <text class="label" x="358" y="309">Hall booking</text>
    </svg>

    <svg class="diagram-compact" viewBox="0 0 320 380" role="img" aria-labelledby="diagram-title-sm diagram-desc-sm">
        <title id="diagram-title-sm">How my work fits together</title>
        <desc id="diagram-desc-sm">A browser talks to a Laravel application. The application stores data in MySQL and powers CRM, HRM, payroll and booking modules, and connects to REST APIs.</desc>

        <rect class="node" x="10" y="10" width="300" height="48" rx="10"/>
        <text class="label" x="26" y="39">Browser</text>
        <text class="sublabel" x="98" y="39">users, admins</text>

        <path class="link link-main" d="M160 58 V84"/>

        <rect class="node node-core" x="10" y="84" width="300" height="104" rx="12"/>
        <text class="title" x="26" y="114">Laravel application</text>
        <text class="sublabel" x="26" y="138">routes / middleware / controllers</text>
        <text class="sublabel" x="26" y="156">auth / business logic / jobs</text>
        <text class="sublabel" x="26" y="174">blade views / REST endpoints</text>

        <path class="link link-main" d="M71 188 V220"/>
        <circle class="packet packet-flow" r="3.5"><animateMotion dur="2s" begin="0s" repeatCount="indefinite" path="M71 188 V220"/></circle>
        <path class="link" d="M228 188 V220"/>

        <rect class="node" x="10" y="220" width="122" height="58" rx="10"/>
        <text class="label" x="26" y="245">MySQL</text>
        <text class="sublabel" x="26" y="264">multi-db</text>

        <rect class="node" x="146" y="220" width="164" height="150" rx="10"/>
        <text class="label" x="162" y="250">REST APIs</text>
        <text class="label" x="162" y="282">CRM / leads</text>
        <text class="label" x="162" y="314">HRM / Payroll</text>
        <text class="label" x="162" y="346">Hall booking</text>
    </svg>

    <figcaption>How most of my work fits together: a Laravel app in the middle, a database underneath, and the business modules and APIs around it.</figcaption>
</figure>
