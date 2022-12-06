@extends('frontend.post.partials.main')
@section('head')
@endsection
@section('content')
    <section class="category first" style="padding-top: 100px;">
        <div class="container rounded bg-white card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5 ">
                        <img class="rounded mt-2" src="{{ $user->avatar }}" height="200px"
                            style="width:200px; height: 200px; object-fit: cover;"><span
                            class="font-weight-bold">{{ $user->name }}</span><span
                            class="text-black-50">{{ $user->email }}</span><span>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thông tin cá nhân</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="">
                                <div class="mb-3">
                                    <label for="user">Họ tên</label>
                                    <p class="form-control">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="mb-3">
                                    <label for="user">Email</label>
                                    <p class="form-control">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="mb-3">
                                    <label for="user">SĐT</label>
                                    <p class="form-control">
                                        {{ $user->phone != null ? $user->phone : 'Chưa cung cấp số điện thoại' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-start align-items-center experience">
                            <span> <strong style="font-size: 24px">Bài đăng</strong></span>
                        </div>
                        <div class="d-flex justify-content-start align-items-center experience" style="flex-wrap: wrap;">

                            @if (!empty($posts))
                                @foreach ($posts as $post)
                                    <div class="card mr-2" style="width: 200px; height: 270px;">
                                        <img src="{{ $post->image }}" class="card-img-top" alt="..."
                                            style="width:200px; height:100px ; object-fit:cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->name }}</h5>
                                            <p class="card-text">{{ $post->description }}</p>

                                        </div>
                                        <div class="card-footer">
                                            <a href="/posts/{{ $post->category->slug }}/{{ $post->slug }}"
                                                class="btn btn-primary">Xem chi tiết</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
