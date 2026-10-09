{{--
    Marks content that still needs a real value.
    Shown on your machine only; renders nothing on the live site.
--}}
@if (app()->isLocal())
    <span {{ $attributes->merge(['class' => 'placeholder-value']) }}>{{ $slot }}</span>
@endif
