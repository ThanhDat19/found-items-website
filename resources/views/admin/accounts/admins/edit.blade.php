@extends('admin.main')
@section('head')
@endsection
@section('contents')
    <div class="card-body">
        <div class="mb-3">
            <label for="user">Email</label>
            <p class="form-control">{{ $user->email }}</p>
        </div>
        <div class="mb-3">
            <label for="user">Thời điểm tạo tài khoản</label>
            <p class="form-control">{{ $user->created_at->format('d/m/Y') }}</p>
        </div>
        <div class="mb-3">
            <label for="user">Quyền tài khoản</label>
            <select class="form-control" name="role" disabled>
                <option value="1"{{$user->role == 1?'selected': ''}}>Admin</option>
                <option value="0"{{$user->role == 0?'selected': ''}}>User</option>
            </select>
        </div>
        <form action="{{url('admin/accounts/admins/edit/' . $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user">Tên thành viên</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
            </div>
            <div class="mb-3">
                <label for="user">SĐT</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}"/>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ url('admin/accounts/admins/list') }}" class="btn btn-danger ">Trở Về</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
@endsection
@section('footer')

@endsection
