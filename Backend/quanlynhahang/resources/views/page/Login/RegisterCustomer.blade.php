<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{asset('RegisterCustomer/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('RegisterCustomer/css/style.css')}}">
</head>

<body>

    <div class="main">

        <div class="container">
            <form method="POST" action="dangky" class="appointment-form" id="appointment-form">
                @csrf
                <h2>Đăng ký thành viên</h2>
                <div class="form-group-1">
                    <h3>Thông tin cá nhân</h3>
                    <input type="text" name="customer_name" id="name" placeholder="Họ tên" />
                    @if ($errors->has('customer_name'))
                    <div style="color: red">{{ $errors->first('customer_name') }}</div>
                    @endif
                    <input type="email" name="customer_email" id="email" placeholder="Địa chỉ email" />
                    @if ($errors->has('customer_email'))
                    <div style="color: red">{{ $errors->first('customer_email') }}</div>
                    @endif
                    <input type="number" name="customer_phone" id="phone_number" placeholder="Số điện thoại" />
                    @if ($errors->has('customer_phone'))
                    <div style="color: red">{{ $errors->first('customer_phone') }}</div>
                    @endif
                    <input type="text" name="customer_address" id="email" placeholder="Địa chỉ" />
                    @if ($errors->has('customer_address'))
                    <div style="color: red">{{ $errors->first('customer_address') }}</div>
                    @endif

                </div>
                <div class="form-group-2">
                    <h3>Thông tin tài khoản</h3>
                    <input type="password" name="customer_password" id="name" placeholder="mật khẩu" />
                    @if ($errors->has('customer_password'))
                    <div style="color: red">{{ $errors->first('customer_password') }}</div>
                    @endif
                    <input type="password" name="customer_confirm_password" id="email"
                        placeholder="Nhập lại mật khẩu" />
                    @if ($errors->has('customer_confirm_password'))
                    <div style="color: red">{{ $errors->first('customer_confirm_password') }}</div>
                    @endif
                    <div class="form-check">
                        <input type="checkbox" name="agree-term" id="agree-term" value="1" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Bằng cách nhấp vào
                            đây bạn đã chấp nhận các <a href="#" class="term-service">Điều khoản dịch vụ</a> của chúng
                            tôi</label>
                        @if ( Session::has('error') )
                        <div style="color: red">{{  Session::get('error') }}</div>
                        @endif
                    </div>
                    @if ( Session::has('success') )
                    <div style="color: red">{{  Session::get('success') }}<a href="{{route('dang-nhap')}}" class="term-service"> đăng nhập</a></div>
                    @endif
                    <div class="form-submit">
                        <input type="submit" name="submit" id="submit" class="submit" value="Đăng ký" />
                    </div>
            </form>
        </div>
    </div>
    <!-- JS -->
    <script src="{{asset('RegisterCustomer/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('RegisterCustomer/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
