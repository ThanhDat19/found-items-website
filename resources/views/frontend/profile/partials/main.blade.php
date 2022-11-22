<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    @include('frontend.partials.nav')
    @yield('content')
    @include('frontend.partials.footer')
    @include('layouts.footer')
</body>

</html>
