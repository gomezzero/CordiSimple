@auth
    @include('layouts.partials.app-navbar')
@else
    @include('layouts.partials.guest-navbar')
@endauth