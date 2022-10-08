@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
    <form action="" method="post">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="category">Tên loại bài đăng</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="category">Mô tả</label>
                <textarea name="description" class="form-control">{{$category->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="category">Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{$category->content}}</textarea>
            </div>

            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" name="active" id="active" value="1"
                    {{$category->active == 1? 'checked=""': ''}} id="active">
                    <label class="custom-control-label" for="active">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" name="active" id="non_active" value="0"
                    {{$category->active == 0? 'checked=""': ''}}>
                    <label class="custom-control-label"for="non_active">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật loại bài đăng</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
