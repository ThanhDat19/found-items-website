@extends('frontend.index')


@section('content')


<section class="category first" style="padding-top: 180px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 text-left">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb">
                <li><a href="/">Trang Chủ</a></li>
                <li class="active">{{ $category->name }}</li>
              </ol>
              <h1 class="page-title">{{ $category->name }}</h1>
              <p class="page-subtitle">Xem tất cả bài đăng có loại là <i>{{ $category->name }}</i></p>
            </div>
          </div>
          <div class="line"></div>
          <div class="row">
            @foreach ($posts as $post)
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="./{{ $category->slug }}/{{ $post->slug }}">
                      <img style="width: 100%; height: 100%;object-fit: cover;" src="{{ $post->image }}">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="./{{ $category->slug }}">{{ $category->name }}</a>
                    </div>
                    <div class="time">{{ $post->created_at->format('d/m/Y') }}</div>
                  </div>
                  <h1><a href="./{{ $category->slug }}/{{ $post->slug }}">{{ $post->name }}</a></h1>
                  <p>
                    {{ $post->description }}
                  </p>
                  <footer>
                    {{-- Follow --}}
                    @if(Auth::check())
                    @if(!$post->followByUser(Auth::user()->id, $post->id))
                    <a href="#"class="love active"><i class="ion-android-favorite"></i>
                        <div>{{ $post->sumFollowPostByPost($post->id) }}</div>
                    </a>
                    @else
                    <a href="#" onclick="followPost({{ Auth::user()->id }} ,{{ $post->id }},'/posts/follow')" class="love"><i class="ion-android-favorite-outline"></i>
                        <div>{{ $post->sumFollowPostByPost($post->id) }}</div>
                    </a>
                    @endif
                @endif
                    <a class="btn btn-primary more" href="./{{ $category->slug }}/{{ $post->slug }}">
                      <div>Xem chi tiết</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            @endforeach
            <div class="your-paginate">
                {{ $posts->links() }}
            </div>
          </div>
        </div>
        <div class="col-md-4 sidebar">
          <aside>
            <h1 class="aside-title mt-4">Tin Mới Nhất</h1>
            <div class="aside-body">
              <div class="line"></div>
            @foreach ($latest_posts as $post)
            <article class="article-mini">
              <div class="inner">
              <figure>
                  <a href="./{{ $post->category->slug }}/{{ $post->slug }}">
                    <img src="{{ $post->image }}">
                </a>
              </figure>
              <div class="padding">
                <h1><a href="./{{ $post->category->slug }}/{{ $post->slug }}">{{ $post->name }}</a></h1>
                <div class="detail">
                  <div class="category"><a href="./{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                  <div class="time">{{ $post->created_at->format('d/m/Y') }}</div>
                </div>
              </div>
              </div>
            </article>
            @endforeach
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
      </div>
    </div>
  </section>
@endsection
