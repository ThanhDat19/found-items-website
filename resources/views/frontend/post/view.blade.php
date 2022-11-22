@extends('frontend.post.partials.main')


@section('content')
    <section class="single first" style="padding-top: 218px;">
        <div class="container">
            @include('admin.alert')
            <div class="row">
                <div class="col-md-4 sidebar" id="sidebar">
                    <aside>
                        <h1 class="aside-title">Tin Mới</h1>
                        <div class="aside-body">
                            <div class="line"></div>
                            {{-- <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="single.html">
                                            <img src="images/news/img05.jpg">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate
                                                velit</a></h1>
                                        <div class="detail">
                                            <div class="category"><a href="category.html">Lifestyle</a></div>
                                            <div class="time">December 22, 2016</div>
                                        </div>
                                    </div>
                                </div>
                            </article> --}}
                        </div>
                    </aside>
                    <aside>
                        <div class="aside-body">
                            <form class="newsletter">
                                <div class="icon">
                                    <i class="ion-ios-email-outline"></i>
                                    <h1>Newsletter</h1>
                                </div>
                                <div class="input-group">
                                    <input type="email" class="form-control email" placeholder="Your mail">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
                                    </div>
                                </div>
                                <p>By subscribing you will receive new articles in your email.</p>
                            </form>
                        </div>
                    </aside>
                </div>
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Trang Chủ</a></li>
                        <li class="active">{{ $category->name }}</li>
                    </ol>
                    <h1>{{ $post->name }}</h1>
                    <article class="article main-article">
                        <header>
                            <div class="col">
                                <ul class="details">
                                    <li>{{ $post->created_at->format('d/m/Y') }}</li>
                                    <li><a>{{ $post->category->name }}</a></li>
                                    <li>Người Đăng: <a href="#">{{ $post->user->name }}</a></li>
                                </ul>
                            </div>

                            {{-- Follow --}}
                            @if (Auth::check())
                                @if (!$post->followByUser(Auth::user()->id, $post->id))
                                    <a href="#"class="love active"  style="margin-top: 0; float: right;">
                                        <i class="ion-android-favorite">
                                        </i>
                                        <div>{{ $post->sumFollowPostByPost($post->id) }}</div>
                                    </a>
                                @else
                                    <a href="#"
                                        onclick="followPost({{ Auth::user()->id }} ,{{ $post->id }},'/posts/follow')"
                                        class="love" style="margin-top: 0; float: right;"><i
                                            class="ion-android-favorite-outline"></i>
                                        <div>{{ $post->sumFollowPostByPost($post->id) }}</div>
                                    </a>
                                @endif
                            @endif


                        </header>
                        <div class="main">
                            <div class="featured">
                                <figure>
                                    <img src="{{ $post->image }}">
                                    <figcaption>Hình Ảnh</figcaption>
                                </figure>
                            </div>
                            @php
                                echo $post->content;
                            @endphp

                        </div>
                        <footer>

                        </footer>
                    </article>
                    <div class="line">
                        <div>Tác Giả</div>
                    </div>
                    <div class="author">
                        <figure>
                            <img src="{{ $post->user->avatar }}">
                        </figure>
                        <div class="details">
                            @if ($post->user->role == 1 || $post->user->role == 2)
                                <div class="job">Quản Trị</div>
                            @else
                                <div class="job">Thành Viên</div>
                            @endif
                            <h3 class="name">{{ $post->user->name }}</h3>
                            <p>Email:{{ $post->user->email }}</p>
                        </div>
                    </div>
                    <div class="line">
                        <div>Bài Đăng Liên Quan</div>
                    </div>
                    <div class="row">
                        {{-- <article class="article related col-md-6 col-sm-6 col-xs-12">
                            <div class="inner">
                                <figure>
                                    <a href="#">
                                        <img src="images/news/img08.jpg">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h2><a href="#">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
                                    <div class="detail">
                                        <div class="category"><a href="category.html">Lifestyle</a></div>
                                        <div class="time">December 26, 2016</div>
                                    </div>
                                </div>
                            </div>
                        </article> --}}
                    </div>
                    <div class="line thin"></div>
                    <div class="comments">
                        <h2 class="title">Bình Luận <a href="#">Viết bình luận</a></h2>
                        <form class="row" action="{{ url('comments') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                            <div class="form-group col-md-12">
                                <label for="message">Bình luận <span class="required"></span></label>
                                <textarea class="form-control" name="comment_body" id="content" rows="3" class="form-control"
                                    placeholder="Viết bình luận ..."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Bình Luận</button>
                            </div>
                        </form>

                        <div class="comment-list">

                            @foreach ($post->comments as $item)
                                <div class="item">
                                    <div class="user">
                                        <figure>
                                            <img src=" {!! $item->user->avatar !!}">
                                        </figure>
                                        <div class="details">
                                            <h5 class="name">{!! $item->user->name !!}</h5>
                                            <div class="time">Đăng vào: {!! $item->created_at->format('d/m/Y') !!}</div>
                                            <div class="description">
                                                {!! $item->comment_body !!}
                                            </div>
                                            {{-- <footer>
                                                <a href="#">Reply</a>
                                            </footer> --}}
                                            @auth
                                                @if (Auth::user()->id == $item->user->id)
                                                    <footer>
                                                        <a href="#"
                                                            onclick="removeRow({{ $item->id }},'{{ $post->slug }}/comments/destroy')"
                                                            class="btn btn-danger btn-sm me-2">Delete
                                                        </a>
                                                    </footer>
                                                @endif
                                            @else
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
