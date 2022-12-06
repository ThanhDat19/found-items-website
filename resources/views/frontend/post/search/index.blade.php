@extends('frontend.post.partials.main')


@section('content')
    <section class="search first" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        <h2 class="aside-title">Tìm kiếm</h2>
                        <div class="aside-body">
                            <form class="search" autocomplete="off" action="{{ route('search') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm...">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="ion-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>

                    <aside>
                        <h2 class="aside-title">Bộ lọc</h2>
                        <div class="aside-body">
                            <form class="checkbox-group" action="{{ route('filter') }}">
                                @csrf
                                <div class="group-title">Danh mục</div>
                                @foreach ($categories as $category)
                                @php
                                    $checked = [];
                                    if(isset($_GET['category'])){
                                        $cheked = $_GET['category'];
                                    }
                                @endphp
                                    <div class="form-group">
                                        <label>
                                            <div class="icheckbox_square-red" style="position: relative;"><input
                                                    type="checkbox" name="category[]" value="{{ $category->id }}" style="position: absolute; opacity: 0;" @if(in_array($category->id, $checked)) checked @endif>

                                                    <ins class="iCheck-helper"
                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0; cursor: pointer;">
                                                </ins>
                                            </div> {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <button style="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-group">
                        <ul class="nav-tabs-list">
                            <li class="active"><a href="#">Tất cả</a></li>
                            <li><a href="/search-post/news">Mới nhất</a></li>
                            {{-- <li><a href="#">Popular</a></li>
                        <li><a href="#">Trending</a></li>
                        <li><a href="#">Videos</a></li> --}}
                        </ul>

                    </div>
                    @if (!empty($posts))
                        <div class="row">
                            @foreach ($posts as $post)
                                <article class="col-md-12 article-list">
                                    <div class="inner">
                                        <figure>
                                            <a href="/posts/{{ $post->category->slug }}/{{ $post->slug }}">
                                                <img src="{{ $post->image }}">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <div class="detail">
                                                <div class="category">
                                                    <a href="#">{{ $post->category->name }}</a>
                                                </div>
                                                <time class="ml-2">{{ $post->updated_at->format('d/m/Y') }}</time>
                                            </div>
                                            <h1><a
                                                    href="/posts/{{ $post->category->slug }}/{{ $post->slug }}">{{ $post->name }}</a>
                                            </h1>
                                            <p>
                                                {{ $post->description }}
                                            </p>
                                            <footer>
                                                {{-- Follow --}}
                                                @if (Auth::check())
                                                    @if (!$post->followByUser(Auth::user()->id, $post->id))
                                                        <a href="#"class="love active"><i
                                                                class="ion-android-favorite"></i>
                                                            <div>{{ $post->sumFollowPostByPost($post->id) }}</div>
                                                        </a>
                                                    @else
                                                        <a href="#"
                                                            onclick="followPost({{ Auth::user()->id }} ,{{ $post->id }},'/posts/follow')"
                                                            class="love"><i class="ion-android-favorite-outline"></i>
                                                            <div>{{ $post->sumFollowPostByPost($post->id) }}</div>
                                                        </a>
                                                    @endif
                                                @endif

                                                <a class="btn btn-primary more"
                                                    href="/posts/{{ $post->category->slug }}/{{ $post->slug }}">
                                                    <div>Xem chi tiết</div>
                                                    <div><i class="ion-ios-arrow-thin-right"></i></div>
                                                </a>
                                            </footer>
                                        </div>
                                    </div>
                                </article>
                            @endforeach


                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
