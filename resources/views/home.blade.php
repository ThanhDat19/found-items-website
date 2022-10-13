@extends('layouts.app')

@section('content')
    @include('frontend.partials.nav')
    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')
@endsection
