@extends('admin.main')
@section('contents')
    <div class="row mt-2">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                    <div class="stats-icon purple mb-2">
                      <i class="iconly-boldBookmark"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="text-muted font-semibold">
                      Bài Đăng
                    </h6>
                    <h6 class="font-extrabold mb-0">{{$posts}}</h6>
                  </div>
                </div>
                <a href="/admin/posts/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        <!-- ./col -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                    <div class="stats-icon purple mb-2">
                        <i class="fas fa-layer-group"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="text-muted font-semibold">
                        Loại Bài Đăng
                    </h6>
                    <h6 class="font-extrabold mb-0">{{$categories}}</h6>
                  </div>
                </div>
                <a href="/admin/categories/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        <!-- ./col -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                    <div class="stats-icon purple mb-2">
                        <i class="fas fa-users"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="text-muted font-semibold">
                        Thành Viên
                    </h6>
                    <h6 class="font-extrabold mb-0">{{$user}}</h6>
                  </div>
                </div>
                <a href="/admin/accounts/users/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        <!-- ./col -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                    <div class="stats-icon purple mb-2">
                        <i class="fas fa-users-cog"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="text-muted font-semibold">
                        Thành Viên Admin
                    </h6>
                    <h6 class="font-extrabold mb-0">{{$admin}}</h6>
                  </div>
                </div>
                <a href="/admin/accounts/admins/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        <!-- ./col -->
    </div>
@endsection
