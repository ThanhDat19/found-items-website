<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    {{-- Header --}}
    <header class="primary" style="top: 0px;">
        @include('frontend.partials.header')
        @include('frontend.partials.nav')
    </header>
    @yield('content')
    @include('frontend.partials.footer')
    @include('layouts.footer')
</body>

</html>
