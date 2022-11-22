@extends('admin.main')
@section('head')
@endsection
@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th style="...">ID</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Email</th>
                            <th>Quyền Thành Viên</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role == 0)
                                        <span class="btn btn-primary btn-xs">USER</span>
                                    @elseif ($user->role == 1)
                                        <span class="btn btn-success btn-xs">ADMIN</span>
                                    @elseif ($user->role == 2)
                                        <span class="btn btn-success btn-xs">ADMIN</span>
                                        <span class="btn btn-danger btn-xs">BOSS</span>
                                    @endif
                                </td>
                                @if ($user->id != Auth::user()->id && $user->role != 2)
                                    <td>
                                        <a href="/admin/accounts/admins/edit/{{ $user->id }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        {{-- <a href="/admin/accounts/admins/edit/{{ $user->id }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a> --}}
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection
