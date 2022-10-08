<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    @include('frontend.partials.nav')
    @include('frontend.partials.header')
    <!--------------------------------------
            MAIN
            --------------------------------------->
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4 pl-4">
                <h5 class="font-weight-bold spanborder"><span>Tin Mới Nhất</span></h5>
                <ol class="list-featured">
                    {{-- <li>
                        <span>
                            <h6 class="font-weight-bold">
                                <a href="./article.html" class="text-dark">Did Supernovae Kill Off Large Ocean
                                    Animals?</a>
                            </h6>
                            <p class="text-muted">
                                Jake Bittle in SCIENCE
                            </p>
                        </span>
                    </li> --}}
                </ol>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer')
    @include('layouts.footer')
</body>

</html>
