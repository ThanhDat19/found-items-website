@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th style="...">ID</th>
                <th>Tên Đăng Nhập</th>
                <th>Email</th>
                <th>Quyền Thành Viên</th>
                <th style="...">Chỉnh Sửa Quyền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->role == 0)
                            <span class="btn btn-primary btn-xs">USER</span>
                        @else
                            <span class="btn btn-success btn-xs">ADMIN</span>
                        @endif
                    </td>
                    <td>
                        <a href="/admin/users/edit/{{$user->id}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{$users->links()}}
@endsection
