@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên loại bài đăng</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if ($category->active == 0)
                            <span class="btn btn-danger btn-xs">NO</span>
                        @else
                            <span class="btn btn-success btn-xs">YES</span>
                        @endif
                    </td>
                    <td> {{ $category->updated_at }}</td>
                    <td>
                        <a href="/admin/categories/edit/{{$category->id}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" onclick="removeRow({{$category->id}},'/admin/categories/destroy')" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@endsection
