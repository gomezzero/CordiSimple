@auth
    @include('layouts.app-navbar')
@else
    @include('layouts.guest-navbar')
@endauth