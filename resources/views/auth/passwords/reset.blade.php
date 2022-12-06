@extends('layouts.app')

@section('content')
<section class="home first" style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.alert')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thay Đổi Mật Khẩu</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reset-password', ['user'=> $user->id, 'token'=> $user->token]) }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $user->token }}">

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <input id="email" type="email" hidden class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Mật Khẩu</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Xác Nhận Mật Khẩu</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Xác Nhận
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
