{{-- Home page: one partial per section, in navigation order. --}}
<x-layouts.app>

    @include('sections.hero')
    @include('sections.about')
    @include('sections.skills')
    @include('sections.projects')
    @include('sections.journey')
    @include('sections.contact')

</x-layouts.app>
