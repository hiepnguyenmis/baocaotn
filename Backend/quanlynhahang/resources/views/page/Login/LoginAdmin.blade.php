<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập nhân viên</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="{{asset('LLoginAdmin/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('LoginAdmin/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/vendor/animate/animate.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/vendor/css-hamburgers/hamburgers.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/vendor/animsition/css/animsition.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/vendor/select2/select2.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/vendor/daterangepicker/daterangepicker.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/css/util.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("LoginAdmin/css/main.css")}}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form method="POST" action="dangnhap" class="login100-form validate-form flex-sb flex-w">
                    @csrf
                    <span class="login100-form-title p-b-51">
						Đăng nhập nhân viên
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Tên đăng nhập là bắt buộc">
						<input class="input100" type="text" name="employee_username" placeholder="Tên đăng nhập">
						<span class="focus-input100"></span>
					</div>
                    @if ($errors->has('employee_username'))
                    <div style="color: red">
                        {{ $errors->first('employee_username') }}
                    </div>
                    @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Mật Khẩu là bắt buộc">
						<input class="input100" type="password" name="employee_password" placeholder="Mật Khẩu">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-24">


						<div>
							<a href="#" class="txt1">
								Quên mật khẩu ?
							</a>
						</div>
					</div>
                    @if ($errors->has('employee_password'))
                    <div style="color: red">
                        {{ $errors->first('employee_password') }}
                    </div>
                    @endif
					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn bg-primary">
							Đăng Nhập
						</button>
					</div>

                </form>
                @if ( Session::has('errorLogin') )
                <div class="alert alert-warning alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('errorLogin') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset("LoginAdmin/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{{asset("LoginAdmin/vendor/animsition/js/animsition.min.js")}}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("LoginAdmin/vendor/bootstrap/js/popper.js")}}"></script>
	<script src="{{asset("LoginAdmin/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("LoginAdmin/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("LoginAdmin/vendor/daterangepicker/moment.min.js")}}"></script>
	<script src="{{asset("LoginAdmin/vendor/daterangepicker/daterangepicker.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("LoginAdmin/vendor/countdowntime/countdowntime.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("LoginAdmin/js/main.js")}}"></script>

</body>
</html>
