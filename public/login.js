$(document).ready(function () {

    function isEmailValid(email) {
        return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1, 3}\.[0-9]{1, 3}\.[0-9]{1, 3}\.[0-9]{1, 3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }

    function isVietnamesePhoneNumberValid(number) {
        return /(((\+|)84)|0)(3|5|7|8|9)+([0-9]{8})\b/.test(number);
    }

    $('#loginModal').on('hidden.bs.modal', function (e) {
        $('#form-loginUser')[0].reset();
        $("form input").attr("class", "form-control");
        $(".error").html("");
    })

    $("#name").change(function () {
        let email = $("#name").val();
        if (email == "") {
            $("#name").attr("class", "form-control is-invalid");
            $("#name-error").html("Họ và tên không được để trống!");
        } else {
            $("#name").attr("class", "form-control");
            $("#name-error").html("");
        }
    });

    $("#email").change(function () {
        let email = $("#email").val();
        if (email == "") {
            $("#email").attr("class", "form-control is-invalid");
            $("#email-error").html("Email không được để trống!");
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

    // Đăng ký
    $("#name_regis").change(function () {
        let name_regis = $("#name_regis").val();
        if (name_regis == "") {
            $("#name_regis").attr("class", "form-control is-invalid");
            $("#name_regis-error").html("Họ và tên không được để trống!");
        } else if (name_regis.length < 6) {
            $("#name_regis").attr("class", "form-control is-invalid");
            $("#name_regis-error").html("Họ và tên của bạn quá ngắn!");
        } else if (name_regis.length > 20) {
            $("#name_regis").attr("class", "form-control is-invalid");
            $("#name_regis-error").html("Họ và tên của bạn quá dài!");
        } else {
            $("#name_regis").attr("class", "form-control");
            $("#name_regis-error").html("");
        }
    });

    $("#phone_regis").change(function () {
        let phone_regis = $("#phone_regis").val();
        if (phone_regis == "") {
            $("#phone_regis").attr("class", "form-control is-invalid");
            $("#phone_regis-error").html("Số điện thoại không được để trống!");
        } else if (!isVietnamesePhoneNumberValid(phone_regis)) {
            $("#phone_regis").attr("class", "form-control is-invalid");
            $("#phone_regis-error").html("Số điện thoại không đúng định dạng!");
        } else {
            $("#phone_regis").attr("class", "form-control");
            $("#phone_regis-error").html("");
        }
    });

    $("#email_regis").change(function () {
        let email_regis = $("#email_regis").val();
        if (email_regis == "") {
            $("#email_regis").attr("class", "form-control is-invalid");
            $("#email_regis-error").html("Số điện thoại không được để trống!");
        } else if (!isEmailValid(email_regis)) {
            $("#email_regis").attr("class", "form-control is-invalid");
            $("#email_regis-error").html("Email không đúng định dạng!");
        } else {
            $("#email_regis").attr("class", "form-control");
            $("#email_regis-error").html("");
        }
    });

    $("#password_regis").change(function () {
        let password_regis = $("#password_regis").val();
        if (password_regis == "") {
            $("#password_regis").attr("class", "form-control is-invalid");
            $("#password_regis-error").html("Mật khẩu không được để trống!");
        } else if (password_regis.length < 6) {
            $("#password_regis").attr("class", "form-control is-invalid");
            $("#password_regis-error").html("Mật khẩu của bạn quá ngắn!");
        } else if (password_regis.length > 20) {
            $("#password_regis").attr("class", "form-control is-invalid");
            $("#password_regis-error").html("Mật khẩu của bạn quá dài!");
        } else {
            $("#password_regis").attr("class", "form-control");
            $("#password_regis-error").html("");
        }
    });

    $("#repassword_regis").change(function () {
        let repassword_regis = $("#repassword_regis").val();
        let password_regis = $("#password_regis").val();
        if (repassword_regis == "") {
            $("#repassword_regis").attr("class", "form-control is-invalid");
            $("#repassword_regis-error").html("Mật khẩu không được để trống!");
        } else if (repassword_regis != password_regis) {
            $("#repassword_regis").attr("class", "form-control is-invalid");
            $("#repassword_regis-error").html("Mật khẩu không trùng khớp!");
        } else {
            $("#repassword_regis").attr("class", "form-control");
            $("#repassword_regis-error").html("");
        }
    });


    $('#registerModal').on('hidden.bs.modal', function (e) {
        $('#form-registerUser')[0].reset();
        $("form input").attr("class", "form-control");
        $(".error").html("");
    })

    $('#form-registerUser').submit(function (e) {
        e.preventDefault();
        let check = false;

        let name_regis = $("#name_regis").val();
        if (name_regis == "") {
            $("#name_regis").attr("class", "form-control is-invalid");
            $("#name_regis-error").html("Họ và tên không được để trống!");
            check = false;
        } else if (name_regis.length < 6) {
            $("#name_regis").attr("class", "form-control is-invalid");
            $("#name_regis-error").html("Họ và tên của bạn quá ngắn!");
            check = false;
        } else if (name_regis.length > 20) {
            $("#name_regis").attr("class", "form-control is-invalid");
            $("#name_regis-error").html("Họ và tên của bạn quá dài!");
            check = false;
        } else {
            $("#name_regis").attr("class", "form-control");
            $("#name_regis-error").html("");
            check = true;
        }

        let phone_regis = $("#phone_regis").val();
        if (phone_regis == "") {
            $("#phone_regis").attr("class", "form-control is-invalid");
            $("#phone_regis-error").html("Số điện thoại không được để trống!");
            check = false;
        } else if (!isVietnamesePhoneNumberValid(phone_regis)) {
            $("#phone_regis").attr("class", "form-control is-invalid");
            $("#phone_regis-error").html("Số điện thoại không đúng định dạng!");
            check = false;
        } else {
            $("#phone_regis").attr("class", "form-control");
            $("#phone_regis-error").html("");
            check = true;
        }

        let email_regis = $("#email_regis").val();
        if (email_regis == "") {
            $("#email_regis").attr("class", "form-control is-invalid");
            $("#email_regis-error").html("Số điện thoại không được để trống!");
            check = false;
        } else if (!isEmailValid(email_regis)) {
            $("#email_regis").attr("class", "form-control is-invalid");
            $("#email_regis-error").html("Email không đúng định dạng!");
            check = false;
        } else {
            $("#email_regis").attr("class", "form-control");
            $("#email_regis-error").html("");
            check = true;
        }

        let password_regis = $("#password_regis").val();
        if (password_regis == "") {
            $("#password_regis").attr("class", "form-control is-invalid");
            $("#password_regis-error").html("Mật khẩu không được để trống!");
            check = false;
        } else if (password_regis.length < 6) {
            $("#password_regis").attr("class", "form-control is-invalid");
            $("#password_regis-error").html("Mật khẩu của bạn quá ngắn!");
            check = false;
        } else if (password_regis.length > 20) {
            $("#password_regis").attr("class", "form-control is-invalid");
            $("#password_regis-error").html("Mật khẩu của bạn quá dài!");
            check = false;
        } else {
            $("#password_regis").attr("class", "form-control");
            $("#password_regis-error").html("");
            check = true;
        }

        let repassword_regis = $("#repassword_regis").val();
        if (repassword_regis == "") {
            $("#repassword_regis").attr("class", "form-control is-invalid");
            $("#repassword_regis-error").html("Mật khẩu không được để trống!");
            check = false;
        } else if (repassword_regis != password_regis) {
            $("#repassword_regis").attr("class", "form-control is-invalid");
            $("#repassword_regis-error").html("Mật khẩu không trùng khớp!");
            check = false;
        } else {
            $("#repassword_regis").attr("class", "form-control");
            $("#repassword_regis-error").html("");
            check = true;
        }

        let status_regis = 1;

        if (check) {
            $.ajax({
                //sử dụng phương thức post
                type: 'POST',
                url: '?mod=user&act=register',
                data: {
                    name: name_regis,
                    phone: phone_regis,
                    email: email_regis,
                    status: status_regis,
                    password: password_regis
                },
                success: function (response) {
                    // hiện thông báo thêm mới thành công bằng toastr
                    toastr.success('Đăng ký thành công!');
                    //ẩn modal add đi
                    $('#registerModal').modal('hide');
                    // setTimeout(function () {
                    //     window.location.href = "?mod=home";
                    // }, 2000);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.success('Đăng ký thất bại!');
                    //xử lý lỗi tại đây
                }
            })
        }
    });

    $('#form-loginUser').submit(function (e) {
        e.preventDefault();
        let check = false;
        let email = $("#email").val();
        if (email == "") {
            $("#email").attr("class", "form-control is-invalid");
            $("#email-error").html("Email không được để trống!");
            check = false;
        } else { check = true; }

        let password = $("#password").val();
        if (password == "") {
            $("#password").attr("class", "form-control is-invalid");
            $("#password-error").html("Mật khẩu không được để trống!");
            check = false;
        } else { check = true; }

        if (check) {
            $.ajax({
                //sử dụng phương thức post
                type: 'POST',
                url: '?mod=user&act=login',
                data: {
                    email: email,
                    password: password
                },
                success: function (response) {
                    // hiện thông báo thêm mới thành công bằng toastr
                    toastr.success('Đăng nhập thành công!');
                    //ẩn modal add đi
                    $('#loginModal').modal('hide');
                    setTimeout(function () {
                        window.location.href = "?mod=home";
                    }, 2000);
                    // $('#userTable').DataTable().ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.success('Đăng nhập thất bại!');
                    //xử lý lỗi tại đây
                }
            })
        }
    });
});