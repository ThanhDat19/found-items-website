<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="/admin/main" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  {{-- CATEGORY --}}
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              Loại Bài Đăng
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/admin/categories/add" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Thêm Loại Bài Đăng</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/admin/categories/list" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh Sách Loại Bài Đăng</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- POST --}}
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-mail-bulk"></i>
                          <p>
                              Bài Đăng
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/admin/posts/add" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Thêm Bài Đăng</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/admin/posts/list" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh Sách Bài Đăng</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- USER --}}
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Quản Lý Thành Viên
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/admin/users/list" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh Sách Thành Viên</p>
                              </a>
                          </li>
                          {{-- <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Thành Viên Quản Lý</p>
                            </a>
                        </li> --}}
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
