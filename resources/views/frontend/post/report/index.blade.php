@extends('frontend.post.partials.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <section class="category first" style="padding-top: 100px;">
        @include('admin.alert')
        <div class="container rounded bg-white mt-5 mb-5">
            <form action="{{ route('reportPost', ['post' => $post->id, 'category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="post">Lý do vi phạm</label>
                <div class="card-footer">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea name="description" id="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('footer')
@endsection
