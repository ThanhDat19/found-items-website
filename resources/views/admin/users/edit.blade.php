@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
    <div class="card-body">

        <div class="mb-3">
            <label for="user">Tên thành viên</label>
            <p class="form-control">{{ $user->name }}</p>
        </div>
        <div class="mb-3">
            <label for="user">Email</label>
            <p class="form-control">{{ $user->email }}</p>
        </div>
        <div class="mb-3">
            <label for="user">Thời điểm tạo tài khoản</label>
            <p class="form-control">{{ $user->created_at->format('d/m/Y') }}</p>
        </div>
        <form action="{{url('admin/users/edit/' . $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user">Quyền tài khoản</label>
                <select class="form-control" name="role">
                    <option value="1"{{$user->role == '1'?'slected': ''}}>Admin</option>
                    <option value="0"{{$user->role == '0'?'slected': ''}}>User</option>
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật quyền thành viên</button>
                <a href="{{ url('admin/users/list') }}" class="btn btn-danger ">Trở Về</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
