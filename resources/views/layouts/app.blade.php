<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body>
    <div id="app">
        @include('frontend.partials.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')
</body>

</html>
