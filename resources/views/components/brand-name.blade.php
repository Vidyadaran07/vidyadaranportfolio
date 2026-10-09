{{-- Name with the last word in the accent colour: "Vidyadaran M". --}}
@php
    $parts = explode(' ', config('portfolio.name'));
    $last = array_pop($parts);
@endphp
{{ implode(' ', $parts) }} <span class="text-accent">{{ $last }}</span>
