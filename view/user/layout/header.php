<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="public/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Đăng nhập -->
<div class="modal" tabindex="-1" id="loginModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-loginUser" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="email-error">
                        <small id="email-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu *</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="password-error">
                        <small id="password-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <br>
                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Đăng ký -->
<div class="modal" tabindex="-1" id="registerModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng ký</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-registerUser" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name_regis">Họ và tên *</label>
                        <input type="text" class="form-control" id="name_regis" name="name_regis"
                            aria-describedby="name_regis-error">
                        <small id="name_regis-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <div class="form-group">
                        <label for="phone_regis">Số điện thoại *</label>
                        <input type="text" class="form-control" id="phone_regis" name="phone_regis"
                            aria-describedby="phone_regis-error">
                        <small id="phone_regis-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <div class="form-group">
                        <label for="email_regis">Email *</label>
                        <input type="text" class="form-control" id="email_regis" name="email_regis"
                            aria-describedby="email_regis-error">
                        <small id="email_regis-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <div class="form-group">
                        <label for="password_regis">Mật khẩu *</label>
                        <input type="password" class="form-control" id="password_regis" name="password_regis"
                            aria-describedby="password_regis-error">
                        <small id="password_regis-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <div class="form-group">
                        <label for="repassword_regis">Xác nhận mật khẩu *</label>
                        <input type="password" class="form-control" id="repassword_regis" name="repassword_regis"
                            aria-describedby="repassword_regis-error">
                        <small id="repassword_regis-error" class="form-text text-muted error invalid-feedback" style="color:#dc3545 !important"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
        </div>
    </div>
</div>

<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="?mod=home"><img src="public/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="?mod=job">Việc làm</a></li>
                                        <li><a href="about.html">Công ty</a></li>
                                        <!-- <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                <?php
                                if (isset($_SESSION['user']) && $_SESSION['isLogin'] = 1) {
                                    ?>
                                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <!-- <i class="far fa-user"></i> -->
                                        <div class="user-panel d-flex">
                                            <div class="image">
                                                <img src="public/dashboard/dist/img/user2-160x160.jpg"
                                                    class="img-circle elevation-2" alt="User Image"
                                                    style="width: 50px; border-radius: 50%">
                                            </div>
                                        </div>
                                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"
                                        style="left: inherit; right: 0px; width: 250px">
                                        <a href="?mod=user&act=logout" class="dropdown-item">
                                            Trang cá nhân
                                        </a>
                                        <a href="?mod=user&act=logout" class="dropdown-item">
                                            Đăng xuất
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <a class="btn head-btn1" data-toggle="modal" data-target="#registerModal">Đăng ký</a>
                                    <a class="btn head-btn2" data-toggle="modal" data-target="#loginModal">Đăng nhập</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>