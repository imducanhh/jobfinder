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
    <title>Jobfinder</title>

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
</head>

<body class="hold-transition sidebar-mini">
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
                            <h1 class="m-0">Quản lý tin tuyển dụng</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
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
                                <div class="card-header border-0">
                                    <!-- <h3 class="card-title">Công việc</h3> -->
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#modal-addJob">Thêm mới</button>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tin tuyển dụng</th>
                                                <th>Tên công ty</th>
                                                <th>Hạn ứng tuyển</th>
                                                <th>Số lượng tuyển</th>
                                                <th>Mức lương</th>
                                                <th>Hình thức làm việc</th>
                                                <th>Cấp bậc</th>
                                                <th>Giới tính</th>
                                                <th>Kinh nghiệm</th>
                                                <th>Địa điểm</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($dataJob as $row) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $i ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['company'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['job_dealine'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['quantity'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['salary'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['type'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['level'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['gender'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['experience'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['location'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['status'] ?>
                                                    </td>
                                                    <td>
                                                        <a type="button" target="_blank" class="btn btn-success"
                                                            href="?mod=job&act=detail&id=<?= $row['id'] ?>">Xem</a>
                                                        <button type="button" class="btn btn-warning btn-edit"
                                                            data-url="?mod=job&act=show&id=<?= $row['id'] ?>">Sửa</button>
                                                        <button type="button" class="btn btn-danger btn-delete"
                                                            data-id="<?= $row['id'] ?>">Xóa</button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
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
                <div class="modal fade" id="modal-addJob">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm mới tin tuyển dụng</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" role="form" enctype="multipart/form-data" id="form-add">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Tin tuyển dụng</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nhập tên công việc" aria-describedby="name-error">
                                        <span id="name-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Tên công ty</label>
                                        <input type="text" class="form-control" id="company" name="company"
                                            placeholder="Nhập tên công ty">
                                    </div>
                                    <div class="form-group">
                                        <label for="job_dealine">Hạn ứng tuyển</label>
                                        <input type="text" class="form-control" id="job_dealine" name="job_dealine"
                                            placeholder="Nhập hạn ứng tuyển">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Số lượng tuyển</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="Nhập số lượng tuyển">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Mức lương</label>
                                        <input type="text" class="form-control" id="salary" name="salary"
                                            placeholder="Nhập mức lương">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Hình thức làm việc</label>
                                        <input type="text" class="form-control" id="type" name="type"
                                            placeholder="Nhập mức lương">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Cấp bậc</label>
                                        <input type="text" class="form-control" id="level" name="level"
                                            placeholder="Nhập cấp bậc">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Giới tính</label>
                                        <input type="text" class="form-control" id="gender" name="gender"
                                            placeholder="Nhập giới tính">
                                    </div>
                                    <div class="form-group">
                                        <label for="experience">Kinh nghiệm</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            placeholder="Nhập kinh nghiệm">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả công việc</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Nhập mô tả công việc">
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Địa điểm</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            placeholder="Nhập địa điểm">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <input type="text" class="form-control" id="status" name="status"
                                            placeholder="Nhập trạng thái">
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
                <div class="modal fade" id="modal-editJob">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Sửa công việc</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="?mod=admin&act=insertJob" method="POST" role="form"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name_edit">Tên công việc</label>
                                        <input type="text" class="form-control" id="name_edit" name="name_edit"
                                            placeholder="Nhập tên công việc">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_edit">Tên công ty</label>
                                        <input type="text" class="form-control" id="company_edit" name="company_edit"
                                            placeholder="Nhập tên công ty">
                                    </div>
                                    <div class="form-group">
                                        <label for="job_dealine_edit">Hạn ứng tuyển</label>
                                        <input type="text" class="form-control" id="job_dealine_edit"
                                            name="job_dealine_edit" placeholder="Nhập hạn ứng tuyển">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity_edit">Số lượng tuyển</label>
                                        <input type="text" class="form-control" id="quantity_edit" name="quantity_edit"
                                            placeholder="Nhập số lượng tuyển">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary_edit">Mức lương</label>
                                        <input type="text" class="form-control" id="salary_edit" name="salary_edit"
                                            placeholder="Nhập mức lương">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_edit">Hình thức làm việc</label>
                                        <input type="text" class="form-control" id="type_edit" name="type_edit"
                                            placeholder="Nhập mức lương">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_edit">Cấp bậc</label>
                                        <input type="text" class="form-control" id="level_edit" name="level_edit"
                                            placeholder="Nhập cấp bậc">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender_edit">Giới tính</label>
                                        <input type="text" class="form-control" id="gender_edit" name="gender_edit"
                                            placeholder="Nhập giới tính">
                                    </div>
                                    <div class="form-group">
                                        <label for="experience_edit">Kinh nghiệm</label>
                                        <input type="text" class="form-control" id="experience_edit"
                                            name="experience_edit" placeholder="Nhập kinh nghiệm">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_edit">Mô tả công việc</label>
                                        <input type="text" class="form-control" id="description_edit"
                                            name="description_edit" placeholder="Nhập mô tả công việc">
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Địa điểm</label>
                                        <input type="text" class="form-control" id="location_edit" name="location_edit"
                                            placeholder="Nhập địa điểm">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_edit">Trạng thái</label>
                                        <input type="text" class="form-control" id="status_edit" name="status_edit"
                                            placeholder="Nhập trạng thái">
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

        <!-- Main Footer -->
        <?php
        include_once('./view/layout/footer.php');
        ?>
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

            function SetDefault(Text) {
                alert(Text);
            }

            $("#name").change(function () {
                let name = $("#name").val();
                console.log(name);
                if (name == "") {
                    $("#name").attr("class", "form-control is-invalid");
                    $("#name-error").html("Tên công việc không được để trống");
                } else {
                    $("#name").attr("class", "form-control");
                    $("#name-error").html("");
                }
            });

            $('#form-add').submit(function (e) {
                e.preventDefault();
                //lấy attribute data-url của form lưu vào biến url
                let dataForm = $(this).serialize();
                let check = true;
                let name = $("#name").val();
                if (name == "") {
                    $("#name").attr("class", "form-control is-invalid");
                    $("#name-error").html("Tên công việc không được để trống");
                    check = false;
                } else {
                    $("#name").attr("class", "form-control");
                    $("#name-error").html("");
                    check = true;
                }
                if (check) {
                    $.ajax({
                        //sử dụng phương thức post
                        type: 'POST',
                        url: '?mod=admin&act=insertJob',
                        data: dataForm,
                        success: function (response) {
                            // hiện thông báo thêm mới thành công bằng toastr
                            toastr.success('Thêm mới công việc thành công!');
                            //ẩn modal add đi
                            $('#modal-addJob').modal('hide');
                            setTimeout(function () {
                                window.location.href = "?mod=admin&act=jobs";
                            }, 2000);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //xử lý lỗi tại đây
                        }
                    })
                }
            })

            $('.btn-edit').click(function (e) {
                e.preventDefault();
                //lấy data-url của nút edit
                var url = $(this).attr('data-url');
                $.ajax({
                    //phương thức get
                    type: 'GET',
                    dataType: "json",
                    url: url,
                    success: function (response) {
                        //đưa dữ liệu controller gửi về điền vào input trong form edit.
                        $('#name_edit').val(response.name);

                    },
                    error: function (error) {

                    }
                })
            });

            $('.btn-delete').click(function (e) {
                e.preventDefault();
                var data_id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Bạn có muốn xóa không?',
                    text: "Sau khi xóa sẽ không thể khôi phục lại!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "?mod=job&act=delete",
                            method: "POST",
                            data: {
                                id: data_id
                            },
                            success: function (response) {
                                // Toast.fire({
                                //     icon: 'success',
                                //     title: 'Xóa thành công'
                                // })
                                toastr.success('Xóa công việc thành công!');
                                setTimeout(function () {
                                    window.location.href = "?mod=admin&act=jobs";
                                }, 2000);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                // Toast.fire({
                                //     icon: 'error',
                                //     title: 'Xóa không thành công'
                                // })
                                toastr.error('Xóa công việc không thành công!');
                            }
                        })
                    }
                })
            });

            $('.btn-edit').click(function (e) {
                //mở modal edit lên
                $('#modal-editJob').modal('show');
                e.preventDefault();
                //lấy data-url của nút edit
                var url = $(this).attr('data-url');
                $.ajax({
                    //phương thức get
                    type: 'GET',
                    dataType: "json",
                    url: url,
                    success: function (response) {
                        //đưa dữ liệu controller gửi về điền vào input trong form edit.
                        $('#name_edit').val(response.name);
                        $('#company_edit').val(response.company);
                        $('#job_dealine_edit').val(response.job_dealine);
                        $('#quantity_edit').val(response.quantity);
                        $('#salary_edit').val(response.salary);
                        $('#type_edit').val(response.type);
                        $('#level_edit').val(response.level);
                        $('#gender_edit').val(response.gender);
                        $('#experience_edit').val(response.experience);
                        $('#description_edit').val(response.description);
                        $('#location_edit').val(response.location);
                        $('#status_edit').val(response.status);
                    },
                    error: function (error) {

                    }
                })
            });
        });
    </script>
</body>

</html>