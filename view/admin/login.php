<!DOCTYPE html>
<html lang="en">

<head>
	<title>Jobfinder Admin - Login</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="icon" type="image/png" href="public/admin/images/icons/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="public/admin/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/vendor/animate/animate.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/vendor/css-hamburgers/hamburgers.min.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/vendor/animsition/css/animsition.min.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/vendor/select2/select2.min.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/vendor/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/css/util.css" />
	<link rel="stylesheet" type="text/css" href="public/admin/css/main.css" />
	<meta name="robots" content="noindex, follow" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="?mod=admin&act=login" method="POST" role="form" enctype="multipart/form-data">
					<span class="login100-form-title p-b-32"> Account Login </span>
					<span class="txt1 p-b-11">Email</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="Email is required">
						<input class="input100" type="email" id="email" name="email"/>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">Mật khẩu</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" id="password" name="password"/>
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" />
							<label class="label-checkbox100" for="ckb1">
								Ghi nhớ đăng nhập
							</label>
						</div>
						<div>
							<a href="#" class="txt3">Quên mật khẩu?</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="btnLogin" type="submit">Đăng nhập</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<script src="public/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="public/admin/vendor/animsition/js/animsition.min.js"></script>
	<script src="public/admin/vendor/bootstrap/js/popper.js"></script>
	<script src="public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="public/admin/vendor/select2/select2.min.js"></script>
	<script src="public/admin/vendor/daterangepicker/moment.min.js"></script>
	<script src="public/admin/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="public/admin/vendor/countdowntime/countdowntime.js"></script>
	<script src="public/admin/js/main.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<!-- <script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag("js", new Date());

		gtag("config", "UA-23581568-13");
	</script> -->
	<!-- <script defer src="beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7cd21291dd7a9fdf","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script> -->
	<script type="text/javascript">
		// $("#btnLogin").on("click", function() {
		// 	var username = $("#email").val();
		// 	var password = $("#password").val();

		// 	console.log(username);
		// 	console.log(password);
		// 	var error = $("#error");
		// 	var ok = $("#ok");

		// 	// resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
		// 	// error.html("");
		// 	// ok.html("");

		// 	// Kiểm tra nếu username rỗng thì báo lỗi
		// 	// if (username == "") {
		// 	// 	error.html("Tên đăng nhập không được để trống");
		// 	// 	return false;
		// 	// }
		// 	// Kiểm tra nếu password rỗng thì báo lỗi
		// 	// if (password == "") {
		// 	// 	error.html("Mật khẩu không được để trống");
		// 	// 	return false;
		// 	// }

		// 	// Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
		// 	// để kiểm tra thông tin đăng nhập hợp lệ hay chưa
		// 	$.ajax({
		// 		url: "?mod=admin&act=login",
		// 		method: "POST",
		// 		data: {
		// 			username: email,
		// 			password: password
		// 		},
		// 		success: function(response) {
		// 			if (response == "1") {
		// 				ok.html("Đăng nhập thành công");
		// 			} else {
		// 				error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
		// 			}
		// 		}
		// 	});

		// });
	</script>
</body>

</html>