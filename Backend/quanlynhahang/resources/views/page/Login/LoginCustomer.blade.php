<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{asset('LoginCustomer/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('LoginCustomer/css/style.css')}}">
</head>

<body>

    <div class="main">
        <div class="container">
            <form method="POST" action="dangnhap" class="appointment-form" id="appointment-form">
                @csrf
                <h2>ĐĂNG NHẬP</h2>
                <div class="form-group-1">

                    <input type="text" name="customer_phone" id="title" placeholder="Số điện thoại" />
                    @if ($errors->has('customer_phone'))
                    <div style="color: red">{{ $errors->first('customer_phone') }}</div>
                    @endif
                    <input type="password" name="customer_password" id="name" placeholder="Mật khẩu" />
                    @if ($errors->has('customer_password'))
                    <div style="color: red">{{ $errors->first('customer_password') }}</div>
                    @endif
                </div>
                <div class="form-check">
                    <label for="agree-term" class="label-agree-term"><span><span></span></span><a href="#"
                            class="term-service">Quên mật khẩu ?</a> </label>

                </div>
                <div class="form-check">
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>Bạn chưa có tài khoản ?
                        Nhấn vào <a href="{{route('dang-ky')}}" class="term-service">đây để đăng ký </a> tài
                        khoản</label>
                </div>
                @if ( Session::has('error') )
                <div style="color: red">{{  Session::get('error') }}</div>
                @endif
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Đăng nhập" />
                </div>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="{{asset('LoginCustomer/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('LoginCustomer/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
