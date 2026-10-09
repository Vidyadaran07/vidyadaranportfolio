{{--
    GitHub, LinkedIn and Email links, used in the hero, footer and contact section.
    A missing value shows a placeholder on your machine and is hidden on the live site.
--}}
@php
    $email = config('portfolio.email');

    $links = [
        ['label' => 'GitHub', 'icon' => 'bi-github', 'url' => config('portfolio.github_url'), 'placeholder' => 'YOUR_GITHUB_URL'],
        ['label' => 'LinkedIn', 'icon' => 'bi-linkedin', 'url' => config('portfolio.linkedin_url'), 'placeholder' => 'YOUR_LINKEDIN_URL'],
        ['label' => 'Email', 'icon' => 'bi-envelope', 'url' => $email ? "mailto:{$email}" : null, 'placeholder' => 'YOUR_EMAIL'],
    ];
@endphp

<ul {{ $attributes->merge(['class' => 'social-links']) }}>
    @foreach ($links as $link)
        @if ($link['url'])
            <li>
                <a href="{{ $link['url'] }}" @unless (str_starts_with($link['url'], 'mailto:')) target="_blank" rel="noopener" @endunless>
                    <i class="bi {{ $link['icon'] }}" aria-hidden="true"></i>
                    <span>{{ $link['label'] }}</span>
                </a>
            </li>
        @elseif (app()->isLocal())
            <li>
                <i class="bi {{ $link['icon'] }}" aria-hidden="true"></i>
                <span>{{ $link['label'] }}</span>
                <span class="placeholder-value">{{ $link['placeholder'] }}</span>
            </li>
        @endif
    @endforeach
</ul>
