{{-- Home page: one partial per section, in navigation order. --}}
<x-layouts.app>

    @include('sections.hero')
    @include('sections.about') {{-- About and Skills cards side by side --}}
    @include('sections.experience')
    @include('sections.work')
    @include('sections.projects')
    @include('sections.services')
    @include('sections.contact') {{-- Resume and Contact cards side by side --}}

</x-layouts.app>
