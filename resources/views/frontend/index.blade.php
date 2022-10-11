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
                    @foreach ($latest_posts as $post)
                    <li>
                        <span>
                            <h6 class="font-weight-bold">
                                <a href="/posts/{{$post->category->slug}}/{{$post->slug}}" class="text-dark">{{$post->name}}</a>
                            </h6>
                            <p class="text-muted">
                                {{$post->description}}
                            </p>
                        </span>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer')
    @include('layouts.footer')
</body>

</html>
