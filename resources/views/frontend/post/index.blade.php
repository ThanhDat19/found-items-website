@extends('frontend.index')


@section('content')
<h5 class="font-weight-bold spanborder"><span>{{ $category->name }}</span></h5>
    @foreach ($posts as $post)
        <div class="mb-3 d-flex justify-content-between">
            <div class="pr-3 flex-grow-1">
                <h2 class="mb-1 h4 font-weight-bold">
                    <a class="text-dark" href="./{{$category->slug}}/{{$post->slug}}">
                        {{$post->name}}
                    </a>
                </h2>
                <p>
                    {{$post->description}}
                </p>
                <div class="card-text text-muted small">
                  {{-- thiếu tác giả --}}
                </div>
                <small class="text-muted">{{$post->created_at->format('d/m/Y')}}</small>
            </div>
            <img height="120"   src="{{$post->image}}">
        </div>
    @endforeach
    <div class="your-paginate">
        {{$posts->links()}}
    </div>
@endsection
