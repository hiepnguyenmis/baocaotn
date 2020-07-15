<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Caviar - Premium Restaurant Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('index/img/core-img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset("admin/plugins/fontawesome-free/css/all.min.css")}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('index/style.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    @php

    $vnp_TmnCode = "2Q7GBFTX"; //Mã website tại VNPAY
    $vnp_HashSecret = "YEQBFAJZPJWDYRSIJTJWACWOGNURJVSE"; //Chuỗi bí mật
    $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/trang/thucdon";
    $vnp_SecureHash=null;
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
    $inputData[$key] = $value;
    }
    }
    unset($inputData['vnp_SecureHashType']);
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
    if ($i == 1) {
    $hashData = $hashData . '&' . $key . "=" . $value;
    } else {
    $hashData = $hashData . $key . "=" . $value;
    $i = 1;
    }
    }
    $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
    @endphp

    <!-- Preloader -->
    <div id="preloader">
        <div class="caviar-load"></div>
        <div class="preload-icons">
            <img class="preload-1" src="{{asset('index/img/core-img/preload-1.png')}}" alt="">
            <img class="preload-2" src="{{asset('index/img/core-img/preload-2.png')}}}" alt="">
            <img class="preload-3" src="{{asset('index/img/core-img/preload-3.png')}}" alt="">
        </div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="caviar-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search"
                            placeholder="Search Your Favourite Dish ...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg align-items-center">
                        <a class="navbar-brand" href="/">caviar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#caviarNav"
                            aria-controls="caviarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="fa fa-bars"></span></button>
                        <div class="collapse navbar-collapse" id="caviarNav">
                            <ul class="navbar-nav ml-auto" id="caviarMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home">Trang chủ <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">Về chúng tôi</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#awards">Các chứng nhận</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#menu">Thực đơn</a>
                                </li>


                            </ul>
                            <!-- Search Btn -->

                            @if ( Session::has('customer_name') )
                            <div class="dropdown show ml-5">
                                <a class="text-white dropdown-toggle" href="#" role="button" id="dropdownInforUser"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Session::get('customer_name')}}
                                </a>
                                @php
                                $customer_no=Session::get('customer_no');
                                @endphp
                                <div class="dropdown-menu" aria-labelledby="dropdownInforUser">
                                    <a class="dropdown-item" href="{{route('trangcanhan',['customers_no'=>$customer_no])}}">Thông
                                        tin khách hàng</a>

                                    <a class="dropdown-item" href="{{route('dangxuat')}}">Đăng xuất</a>
                                </div>
                            </div>
                            @endif
                            @if (!Session::has('customer_name') )
                            <div class="ml-5">
                                <a class="text-white " href="{{route('dang-nhap')}}">
                                    Đăng nhập
                                </a>
                            </div>
                            @endif
                            <div class="caviar-search-btn">
                                @php
                                $countItem=0;
                                if(Session::has('cart')){
                                $ArrayItem=Session::get('cart');
                                $countItem=count($ArrayItem);
                                }
                                @endphp
                                <a id="search-btn" href="{{route('giohang')}}"><i class="fas fa-shopping-cart"
                                        aria-hidden="true"> {{$countItem}} </i></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay"
        style="background-image: url({{asset('index/img/bg-img/hero-5.jpg')}})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Kết quả giao dịch</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Regular Page Area Start ***** -->
    <section class="caviar-regular-page section-padding-100">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="post-title">
                        <h2>Kiểm tra hóa đơn</h2>
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="alert alert-success" role="alert">
                                                <h4 class="alert-heading"><i class="fas fa-info text-warning"></i> Note:
                                                </h4>
                                                <?php
                                                    if ($secureHash == $vnp_SecureHash) {
                                                        if ($_GET['vnp_ResponseCode'] == '00') {
                                                            $status="Giao dịch thành công";
                                                        } else {
                                                            $status="Giao dịch không thành công";
                                                        }
                                                    } else {
                                                        $status="Chữ ký không hợp lệ";
                                                    }
                                                ?>
                                                <p>{{$status}}</p>
                                                <hr>
                                                <p class="mb-0">Khách hàng vui lòng kiểm tra lại đơn hàng</p>
                                            </div>
                                            <h5></h5>

                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="invoice p-3 mb-3">
                                                <!-- title row -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                            <i class="fas fa-globe"></i> Carvia Restaurant.
                                                            @foreach ($bills as $item)
                                                            <small class="float-right">Ngày:
                                                                {{date('d-m-Y', strtotime($item->BILL_DATE))}}</small>

                                                            @endforeach
                                                        </h4>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- info row -->
                                                @foreach ($bills as $item)
                                                <div class="row invoice-info">
                                                    <div class="col-sm-4 invoice-col">
                                                        Từ
                                                        <address>
                                                            <strong>Admin, Inc.</strong><br>
                                                            Số 6, Trần Văn ơn<br>
                                                            Phường Phú Hòa, TP.Thủ Dầu Một,Bình Dương<br>
                                                            Phone: (804) 123-5432<br>
                                                            Email: info@Caviar.com
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-sm-4 invoice-col">
                                                        Đến
                                                        <address>
                                                            <strong>{{$item->customers->CUSTOMER_NAME}}</strong><br>

                                                            Phone: {{$item->customers->CUSTOMER_PHONE}}<br>
                                                            Email: {{$item->customers->CUSTOMER_EMAIL}}
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        <b>Mã HĐ:</b> {{$item->BILL_NO}}<br>
                                                        <b>Ngày giao dịch:</b>
                                                        {{date('d-m-Y', strtotime($item->BILL_DATE))}}<br>
                                                        <b>Tài khoản:</b> {{$item->customers->CUSTOMER_PHONE}}
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- Table row -->
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Sản phẩm</th>
                                                                    <th>Số lượng</th>
                                                                    <th>Đơn giá</th>
                                                                    <th>Thành tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $subTotal=0;
                                                                @endphp
                                                                @foreach ($item->foods as $fooditem)
                                                                <tr>
                                                                    <td>{{$loop->index +1}}</td>
                                                                    <td>{{$fooditem->FOOD_NAME}}</td>
                                                                    <td>{{$fooditem->pivot->BILLDETAIL_AMOUNT}}</td>
                                                                    <td>{{number_format($fooditem->pivot->BILLDETAIL_PRICE,0,',','.')}}
                                                                        đ
                                                                    </td>
                                                                    <td>{{number_format($fooditem->pivot->BILLDETAIL_PRICE*$fooditem->pivot->BILLDETAIL_AMOUNT,0,',','.')}}đ
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                $subTotal=$subTotal+$fooditem->pivot->BILLDETAIL_PRICE*$fooditem->pivot->BILLDETAIL_AMOUNT;
                                                                @endphp
                                                                @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                @endforeach
                                                <div class="row">
                                                    <!-- accepted payments column -->
                                                    <div class="col-6">
                                                        <p class="lead">Phương thức thanh toán:</p>
                                                        <img src="{{asset('image/Text-QR-2.png')}}" alt="Visa">


                                                        <p class="text-muted well well-sm shadow-none"
                                                            style="margin-top: 10px;">
                                                            Đơn hàng được thanh toán trực tuyến qua cổng thanh toán
                                                            VNPAY
                                                            <h5>Công ty Cổ phần Giải pháp Thanh toán Việt Nam (VNPAY)
                                                            </h5>
                                                            <span>Email: info@vnpay.vn</span>
                                                            <span><a href="https://vnpay.vn/">Website:
                                                                    vnpay.vn</a></span>
                                                        </p>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-6">
                                                        @foreach ($bills as $item )
                                                        <p class="lead">Tổng đơn hàng
                                                            {{date('d-m-Y', strtotime($item->BILL_DATE))}}</p>

                                                        @endforeach


                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">Tổng hàng hóa:</th>
                                                                    <td>{{number_format($subTotal,0,',','.')}} đ</td>
                                                                </tr>
                                                                @foreach ($bills as $item )
                                                                <tr>
                                                                    <th>Khuyến mãi</th>
                                                                    <td>{{number_format($item->BILL_PROMOTION ,0,',','.')}}
                                                                        đ
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tổng đơn hàng:</th>
                                                                    <td>{{number_format($subTotal - $item->BILL_PROMOTION ,0,',','.')}}
                                                                        đ</td>
                                                                </tr>
                                                                @endforeach

                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- this row will not appear when printing -->
                                                <div class="row no-print">
                                                    <div class="col-12">

                                                        <a type="button" href='{{route('thucdon')}}'
                                                            class="btn btn-primary float-right"
                                                            style="margin-right: 5px;">
                                                            <i class="fas fa-external-link-square-alt"></i> Trở về trang
                                                            thực đơn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Regular Page Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="caviar-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-text">
                        <a href="#" class="navbar-brand">caviar</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('index/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('index/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('index/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('index/js/others/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('index/js/active.js')}}"></script>
</body>
