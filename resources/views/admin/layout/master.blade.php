  <!DOCTYPE html>
  <html lang="en">
  <head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('style')
  </head>
  <body class="hold-transition sidebar-mini">
    
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      {{-- <a href="admin/index3.html" class="brand-link">
        <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a> --}}

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="admin/dashboard" class="d-block">{{ Session::get('admin_name') }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin/danh-sach-khach-hang" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                <p>
                  Danh sách khách hàng
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="admin/shop" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                <p>
                  Danh sách cửa hàng
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="admin/danh-sach-don-hang" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>
                  Danh sách đơn hàng
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Quản lý sản phẩm
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin/danh-sach-san-pham" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách sản phẩm</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="admin/add-product" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm sản phẩm</p>
                  </a>
                </li> --}}
              </ul>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                  <i class="nav-icon fas fa-ticket-alt"></i>
                <p>
                  Quản lý coupon
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin/danh-sach-coupon" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách coupon</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="admin/add-coupon" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm coupon</p>
                  </a>
                </li> --}}
              </ul>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Quản lý danh mục
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin/danh-sach-danh-muc" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách danh mục</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin/add-category" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm danh mục</p>
                  </a>
                </li>
                
              </ul>
            </li> --}}
            
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Quản lý tin tức
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin/danh-sach-tin-tuc" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách tin tức</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="admin/add-blog" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm tin tức</p>
                  </a>
                </li> --}}
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Quản lý poster
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin/posters" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách poster</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin/add-poster" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm poster</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shipping-fast"></i>
                <p>
                  Quản lý shipper
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin/danh-sach-shipper" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách shipper</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin/add-shipper" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm shipper</p>
                  </a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item">
              <a href="admin/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Đăng xuất
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
    @yield('body')
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0-rc
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  @yield('script')
  </body>
  </html>
