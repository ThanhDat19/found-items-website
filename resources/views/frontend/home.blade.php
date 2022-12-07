@extends('frontend.index')

@section('content')
    <section class="home first" style="padding-top: 100px;">
        @include('admin.alert')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="line">
                        <div>Tin Mới Nhất</div>
                    </div>
                    <div class="row">
                        @foreach ($latest_posts as $items)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <article class="article col-md-12">
                                        <div class="inner">
                                            <figure>
                                                <a href="/posts/{{ $items->category->slug }}/{{ $items->slug }}">
                                                    <img src="{{ $items->image }}" alt="Sample Article"
                                                        style="object-fit: cover;
                                                    width: 100%;
                                                    height: 300px;">
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <div class="detail">
                                                    <div class="time">{{ $items->updated_at->format('d/m/Y') }}</div>
                                                    <div class="category"><a
                                                            href="category.html">{{ $items->category->name }}</a></div>
                                                </div>
                                                <h2><a
                                                        href="/posts/{{ $items->category->slug }}/{{ $items->slug }}">{{ $items->name }}</a>
                                                </h2>
                                                <p>{{ $items->description }}</p>
                                                <footer>

                                                    {{-- Follow --}}
                                                    @if (Auth::check())
                                                        @if (!$items->followByUser(Auth::user()->id, $items->id))
                                                            <a href="#"class="love active"><i
                                                                    class="ion-android-favorite"></i>
                                                                <div>{{ $items->sumFollowPostByPost($items->id) }}</div>
                                                            </a>
                                                        @else
                                                            <a href="#"
                                                                onclick="followPost({{ Auth::user()->id }} ,{{ $items->id }},'/posts/follow')"
                                                                class="love"><i class="ion-android-favorite-outline"></i>
                                                                <div>{{ $items->sumFollowPostByPost($items->id) }}</div>
                                                            </a>
                                                        @endif
                                                    @endif


                                                    <a class="btn btn-primary more"
                                                        href="/posts/{{ $items->category->slug }}/{{ $items->slug }}">
                                                        <div>Xem chi tiết</div>
                                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                                    </a>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                            </div>
                        @endforeach
                        <div class="your-paginate">
                            {{ $latest_posts->links() }}
                        </div>
                    </div>


                </div>
                <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                    <div class="sidebar-title for-tablet">Sidebar</div>
                    <aside>
                        <div class="aside-body">
                            @if (!empty($findUser))
                                <div class="featured-author">
                                    <div class="featured-author-inner">
                                        <div class="featured-author-cover">
                                            <div class="badges">
                                                <div class="badge-item"><i class="ion-star"></i> Tác giả tiêu biểu</div>
                                            </div>
                                            <div class="featured-author-center">
                                                <figure class="featured-author-picture">
                                                    <img src="{{ $findUser->avatar }}" alt="Sample Article">
                                                </figure>
                                                <div class="featured-author-info">
                                                    <h2 class="name">{{ $findUser->name }}</h2>
                                                    <div class="desc">{{ $findUser->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="featured-author-body">
                                            <div class="featured-author-count">
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="name">Số Bài Đăng</div>
                                                        <div class="value">{{ $maxPost }}</div>
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="name">Theo Dõi</div>
                                                        <div class="value">{{ $sumFollowPost }}</div>
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="/author/{{ $findUser->id }}">
                                                        <div class="icon">
                                                            <div>Xem thêm</div>
                                                            <i class="ion-chevron-right"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </aside>

                    <aside>
                        <h1 class="aside-title">Tin Nổi Bật</h1>
                        <div class="aside-body">
                            @foreach ($postsHot as $post)
                                <article class="article-mini">
                                    <div class="inner">
                                        <figure>
                                            <a href="/posts/{{ $post->category->slug }}/{{ $post->slug }}">
                                                <img src="{{ $post->image }}"
                                                    style="width:100px; height:50px;object-fit: cover" alt="">
                                            </a>
                                        </figure>
                                        <div class="padding">
                                            <h1><a
                                                    href="/posts/{{ $post->category->slug }}/{{ $post->slug }}">{{ $post->description }}</a>
                                            </h1>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
