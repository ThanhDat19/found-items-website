@extends('frontend.post.partials.main')


@section('content')
    {{-- Head --}}
    <div class="container">
        <div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
            <div class="h-100 tofront">
                <div class="row justify-content-between">
                    <div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
                        <p class="text-uppercase font-weight-bold">
                            <a class="text-danger" href="/posts/{{ $category->slug }}">{{ $category->name }}</a>
                        </p>
                        <h1 class="display-4 secondfont mb-3 font-weight-bold">{{ $post->name }}</h1>
                        <p class="mb-3">
                            {{ $post->description }}
                        </p>
                        <div class="d-flex align-items-center">
                            {{-- <img class="rounded-circle" src="assets/img/demo/avatar2.jpg" width="70"> --}}
                            <small class="ml-2">Jane Seymour <span
                                    class="text-muted d-block">{{ $post->created_at->format('d/m/Y') }}</span>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <img src="{{ $post->image }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main --}}
    <div class="container pt-4 pb-4">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                @php
                    echo $post->content;
                @endphp
                <div class="border p-5 bg-lightblue">
                    <div class="row justify-content-between">
                        <div class="col-md-5 mb-2 mb-md-0">
                            <h5 class="font-weight-bold secondfont">Liên hệ tác giả</h5>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Enter your e-mail address">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-success btn-block">Send Author</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Comment --}}
        <div class="comment-area mt-4">
            @if (session('message'))
                <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
            @endif
            <div class="card card-body">
                <h6 class="card-title">Leave a comment</h6>
                <form action="{{ url('comments') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                    <textarea name="comment_body" rows="3" class="form-control" required></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>

            @foreach ($post->comments as $item)
                <div class="card card-body shadow-sm mt-3">
                    <div class="detail-area">
                        <h6 class="user-name mb-1">
                            {!! $item->user->name !!}
                            <small class="ms-3 text-primary">Commented on: {!! $item->created_at->format('d/m/Y') !!}</small>
                        </h6>
                        <p class="user-comment mb-1">
                            {!! $item->comment_body !!}
                        </p>
                    </div>

                    @if (Auth::user()->id == $item->user->id)
                    <div>
                        {{-- <a href="#" onclick="removeRow({{$item->id}},'comments/destroy')"
                        class="btn btn-primary btn-sm me-2">Edit</a> --}}
                        <a href="#" onclick="removeRow({{$item->id}},'{{$post->slug}}/comments/destroy')"
                        class="btn btn-danger btn-sm me-2">Delete</a>
                    </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endsection
