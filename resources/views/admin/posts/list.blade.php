@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th style="...">ID</th>
                <th>Tên bài đăng</th>
                <th>Hình ảnh</th>
                <th>Loại bài đăng</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
                <th style="...">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td><img src="{{$post->image}}" alt="{{$post->name}}" style="width: 200px"></td>
                    <td>{{$post->category->name}}</td>
                    <td>
                        @if ($post->active == 0)
                            <span class="btn btn-danger btn-xs">NO</span>
                        @else
                            <span class="btn btn-success btn-xs">YES</span>
                        @endif
                    </td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a href="/admin/posts/edit/{{$post->id}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" onclick="removeRow({{$post->id}},'/admin/posts/destroy')"class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{$posts->links()}}
@endsection
