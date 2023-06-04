<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <!-- <i class="far fa-user"></i> -->
                <div class="user-panel d-flex">
                    <div class="image">
                        <img src="public/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                </div>
                <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="left: inherit; right: 0px;">
                <!-- <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a> -->
                <!-- <div class="dropdown-divider"></div> -->
                <a href="?mod=admin&act=logout" class="dropdown-item">
                    Đăng xuất
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="public/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Jobfinder</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Trang quản trị</li>
                <li class="nav-item">
                    <a href="?mod=admin&act=dashboard"
                        class="nav-link <?php if (str_contains($_SERVER['REQUEST_URI'], '?mod=admin&act=dashboard')) { ?><?= "active" ?><?php } ?>">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Dashboard
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?mod=admin&act=list"
                        class="nav-link <?php if (str_contains($_SERVER['REQUEST_URI'], '?mod=admin&act=list')) { ?><?= "active" ?><?php } ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Quản lý người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?mod=admin&act=jobs"
                        class="nav-link <?php if (str_contains($_SERVER['REQUEST_URI'], '?mod=admin&act=jobs')) { ?><?= "active" ?><?php } ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Quản lý tin tuyển dụng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Quản lý công ty
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>