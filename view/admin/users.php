<?php
session_start();
if (!isset($_SESSION['admin']) && $_SESSION['isLogin'] != 1) {
    header("Location: ?mod=admin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobfinder | Quản lý công việc</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="public/dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dashboard/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="public/dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="public/dashboard/plugins/toastr/toastr.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php
        include_once('./view/layout/menu.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Quản lý người dùng</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#modal-addUser">Thêm mới</button>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-striped table-valign-middle" id="userTable"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <!-- /.modal -->
                <div class="modal fade" id="modal-addUser">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm mới người dùng</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" role="form" enctype="multipart/form-data" id="form-addUser"
                                autocomplete="off">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Họ và tên</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nhập họ và tên" aria-describedby="name-error"
                                            autocomplete="false">
                                        <span id="name-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Nhập số điện thoại" aria-describedby="phone-error"
                                            autocomplete="false">
                                        <span id="phone-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Nhập email" aria-describedby="email-error"
                                            autocomplete="false">
                                        <span id="email-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="form-control" id="status" name="status"
                                            aria-describedby="status-error">
                                            <option value="Active">Kích hoạt</option>
                                            <option value="Inactive">Không kích hoạt</option>
                                        </select>
                                        <span id="status-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Nhập mật khẩu" aria-describedby="password-error"
                                            autocomplete="false">
                                        <span id="password-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="repassword">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" id="repassword" name="repassword"
                                            placeholder="Nhập mật khẩu" aria-describedby="repassword-error"
                                            autocomplete="false">
                                        <span id="repassword-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <!-- /.modal -->
                <div class="modal fade" id="modal-editUser">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Chỉnh sửa người dùng</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="?mod=admin&act=" method="POST" role="form" enctype="multipart/form-data"
                                autocomplete="off">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name_edit">Họ và tên</label>
                                        <input type="text" class="form-control" id="name_edit" name="name_edit"
                                            placeholder="Nhập tên công việc" aria-describedby="name_edit-error"
                                            autocomplete="false">
                                        <span id="name_edit-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_edit">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone_edit" name="phone_edit"
                                            placeholder="Nhập tên công ty" aria-describedby="phone_edit-error"
                                            autocomplete="false">
                                        <span id="phone_edit-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_edit">Email</label>
                                        <input type="text" class="form-control" id="email_edit" name="email_edit"
                                            placeholder="Nhập email" aria-describedby="email_edit-error"
                                            autocomplete="false">
                                        <span id="email_edit-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_edit">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password_edit"
                                            name="password_edit" placeholder="Nhập mật khẩu"
                                            aria-describedby="password_edit-error" autocomplete="false">
                                        <span id="password_edit-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="repassword_edit">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" id="repassword_edit"
                                            name="repassword_edit" placeholder="Nhập lại mật khẩu"
                                            aria-describedby="repassword_edit-error" autocomplete="false">
                                        <span id="repassword_edit-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="public/dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="public/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="public/dashboard/dist/js/adminlte.js"></script>
    <!-- SweetAlert2 -->
    <script src="public/dashboard/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="public/dashboard/plugins/toastr/toastr.min.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="public/dashboard/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/dashboard/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="public/dashboard/dist/js/pages/dashboard3.js"></script>
    <!-- DatatTable -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            let table = $('#userTable').DataTable({
                ajax: '?mod=admin&act=listUserDatatable',
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'phone' },
                    { data: 'email' },
                    {
                        data: 'status', render: function (data, type, row, meta) {
                            return data == 'Active' ?
                                'Kích hoạt' : 'Không kích hoạt'
                                data;
                        }
                    },
                    {
                        data: 'id', render: function (data, type, row, meta) {
                            return type === 'display' ?
                                '<button type="button" class="btn btn-warning btn-edit" data-id="' + data + '">Sửa</button> <button type="button" class="btn btn-danger btn-delete" data-id="' + data + '">Xóa</button>' :
                                data;
                        }
                    },
                ],
                scrollX: false,
                responsive: true,
            });

            function isVietnamesePhoneNumberValid(number) {
                return /(((\+|)84)|0)(3|5|7|8|9)+([0-9]{8})\b/.test(number);
            }

            function isEmailValid(email) {
                return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1, 3}\.[0-9]{1, 3}\.[0-9]{1, 3}\.[0-9]{1, 3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
            }


            $('#modal-addUser').on('hidden.bs.modal', function (e) {
                $('#form-addUser')[0].reset();
                $("form input").attr("class", "form-control");
                $(".error").html("");
            })

            // Validate
            $("#name").change(function () {
                let name = $("#name").val();
                if (name == "") {
                    $("#name").attr("class", "form-control is-invalid");
                    $("#name-error").html("Họ và tên không được để trống!");
                } else if (name.length > 50) {
                    $("#name").attr("class", "form-control is-invalid");
                    $("#name-error").html("Họ và tên không được nhập quá 50 ký tự!");
                } else {
                    $("#name").attr("class", "form-control");
                    $("#name-error").html("");
                }
            });

            $("#phone").change(function () {
                let phone = $("#phone").val();
                if (phone == "") {
                    $("#phone").attr("class", "form-control is-invalid");
                    $("#phone-error").html("Số điện thoại không được để trống!");
                } else if (!isVietnamesePhoneNumberValid(phone)) {
                    $("#phone").attr("class", "form-control is-invalid");
                    $("#phone-error").html("Số điện thoại không đúng định dạng!");
                } else {
                    $("#phone").attr("class", "form-control");
                    $("#phone-error").html("");
                }
            });

            $("#email").change(function () {
                let email = $("#email").val();
                if (email == "") {
                    $("#email").attr("class", "form-control is-invalid");
                    $("#email-error").html("Số điện thoại không được để trống!");
                } else if (!isEmailValid(email)) {
                    $("#email").attr("class", "form-control is-invalid");
                    $("#email-error").html("Email không đúng định dạng!");
                } else {
                    $("#email").attr("class", "form-control");
                    $("#email-error").html("");
                }
            });

            $("#password").change(function () {
                let password = $("#password").val();
                if (password == "") {
                    $("#password").attr("class", "form-control is-invalid");
                    $("#password-error").html("Mật khẩu không được để trống!");
                } else if (password.length < 6) {
                    $("#password").attr("class", "form-control is-invalid");
                    $("#password-error").html("Mật khẩu của bạn quá ngắn!");
                } else if (password.length > 20) {
                    $("#password").attr("class", "form-control is-invalid");
                    $("#password-error").html("Mật khẩu của bạn quá dài!");
                } else {
                    $("#password").attr("class", "form-control");
                    $("#password-error").html("");
                }
            });

            $("#repassword").change(function () {
                let repassword = $("#repassword").val();
                let password = $("#password").val();
                if (repassword == "") {
                    $("#repassword").attr("class", "form-control is-invalid");
                    $("#repassword-error").html("Mật khẩu không được để trống!");
                } else if (repassword != password) {
                    $("#repassword").attr("class", "form-control is-invalid");
                    $("#repassword-error").html("Mật khẩu không trùng khớp!");
                } else {
                    $("#repassword").attr("class", "form-control");
                    $("#repassword-error").html("");
                }
            });

            $('#form-addUser').submit(function (e) {
                e.preventDefault();
                //lấy attribute data-url của form lưu vào biến url
                let dataForm = $(this).serialize();
                let check = false;

                let name = $("#name").val();
                if (name == "") {
                    $("#name").attr("class", "form-control is-invalid");
                    $("#name-error").html("Họ và tên không được để trống!");
                } else { check = true; }

                let phone = $("#phone").val();
                if (phone == "") {
                    $("#phone").attr("class", "form-control is-invalid");
                    $("#phone-error").html("Số điện thoại không được để trống!");
                    check = false;
                } else { check = true; }

                let email = $("#email").val();
                if (email == "") {
                    $("#email").attr("class", "form-control is-invalid");
                    $("#email-error").html("Email không được để trống!");
                    check = false;
                } else { check = true; }

                let status = $("#status").val();

                let password = $("#password").val();
                if (password == "") {
                    $("#password").attr("class", "form-control is-invalid");
                    $("#password-error").html("Mật khẩu không được để trống!");
                    check = false;
                } else { check = true; }

                let repassword = $("#repassword").val();
                if (repassword == "") {
                    $("#repassword").attr("class", "form-control is-invalid");
                    $("#repassword-error").html("Mật khẩu không được để trống!");
                    check = false;
                } else { check = true; }

                console.log("check:" + check);
                console.log("dataForm:" + dataForm);

                if (check) {
                    $.ajax({
                        //sử dụng phương thức post
                        type: 'POST',
                        url: '?mod=admin&act=insertUser',
                        data: {
                            name: name,
                            phone: phone,
                            email: email,
                            status: status,
                            password: password
                        },
                        success: function (response) {
                            // hiện thông báo thêm mới thành công bằng toastr
                            toastr.success('Thêm mới người dùng thành công!');
                            //ẩn modal add đi
                            $('#modal-addUser').modal('hide');
                            $('#userTable').DataTable().ajax.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //xử lý lỗi tại đây
                        }
                    })
                }
            })

            $(document).on('click', '.btn-edit', function (e) {
                //mở modal edit lên
                $('#modal-editUser').modal('show');
                e.preventDefault();
                //lấy data-id của nút edit
                var id = $(this).attr('data-id');
                $.ajax({
                    //phương thức get
                    type: 'GET',
                    dataType: "json",
                    url: "?mod=admin&act=showUser&id=" + id,
                    success: function (response) {
                        //đưa dữ liệu controller gửi về điền vào input trong form edit.
                        $('#name_edit').val(response.name);
                        $('#phone_edit').val(response.phone);
                        $('#email_edit').val(response.email);
                        $('#password_edit').val(response.password);
                        $('#repassword_edit').val(response.password);
                    },
                    error: function (error) {

                    }
                })
            });

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn có muốn xóa không?',
                    text: "Sau khi xóa sẽ không thể khôi phục lại!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            dataType: "json",
                            method: "GET",
                            url: "?mod=admin&act=deleteUser&id=" + id,
                            success: function (response) {
                                toastr.success('Xóa người dùng thành công!');
                                $('#userTable').DataTable().ajax.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                toastr.error('Xóa người dùng không thành công!');
                            }
                        })
                    }
                })
            });
        });
    </script>
</body>

</html>