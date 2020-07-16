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

    <!-- Core Stylesheet -->
    <link href="{{asset('index/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('index/fontawesome/css/all.css')}}">
    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
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
                                    <a class="nav-link" href="{{route('/')}}#home">Trang chủ <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('/')}}#about">Về chúng tôi</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('/')}}#awards">Các chứng nhận</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('thucdon')}}">Thực đơn</a>
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
                                    <a class="dropdown-item" href="{{route('trangcanhan',['customers_no'=>$customer_no])}}">Thông tin khách hàng</a>

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
                            <a  href="{{route('giohang')}}"><i class="fas fa-shopping-cart" aria-hidden="true"> {{$countItem}} </i></a>
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
                        <h2>Xác nhận đơn hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Regular Page Area Start ***** -->
    <section class="caviar-regular-page  section-padding-100 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 ">
                    <div class="post-title mb-3">

                        <h2 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Thông tin đơn hàng</span>
                            <span class="badge badge-secondary badge-pill">1</span>
                        </h2>
                    </div>
                    <div class="card p-2">
                        <!-- /.card-header -->
                        <div class="card-body p-0 ">
                            <div class="table-responsive">
                                <table class="table table-bordered m-0">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên món ăn</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total=0;
                                        @endphp
                                        @if (session('cart'))
                                        @foreach (session('cart') as $id_session => $details)
                                        @php
                                        $total += $details['FOOD_PRICE'] * $details['QUANTITY'];
                                        @endphp
                                        <tr>
                                            <td>{{$loop->index +1}}</td>
                                            <td>
                                                @if ($details['FOOD_IMG']==null)
                                                <img src="https://via.placeholder.com/80" width="80" height='80' alt="">
                                                @else
                                                <img src="{{$details['FOOD_IMG']}}" width="80" height='80' alt="">

                                                @endif

                                            </td>
                                            <td>{{$details['FOOD_NAME']}}</td>
                                            <td>
                                                {{ $details['QUANTITY'] }}
                                            </td>
                                            <td>{{number_format($details['FOOD_PRICE'],0,',','.')}} đ</td>
                                            <td>{{number_format($details['FOOD_PRICE'] * $details['QUANTITY'],0,',','.')}}
                                                đ</td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-footer -->
                </div>


            </div>
            <div class="row">
                <main class="mt-4 container-fluid">

                    <div class="row post-title mb-3">

                        <h4 class="col-8 d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Thông tin khách hàng</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                    </div>
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-7 mb-4">

                            <!--Card-->
                            <div class="card">

                                <!--Card content-->
                                <form class="card-body" method="POST" action="xacnhandonhang">
                                    @csrf
                                    <input type="hidden" id="name-customer" name='CHECK_CUSTOMER_ID' value=' {{Session::get('customer_id')}}' class="form-control">

                                    <div class="md-form mb-2">
                                        <label for="name-customer" class="">Tên khách hàng</label>
                                        <input type="text" id="name-customer" value=' {{Session::get('customer_name')}}' name='CHECK_CUSTOMER_NAME'
                                            class="form-control" readonly>

                                    </div>

                                    <!--email-->
                                    <div class="md-form mb-2">
                                        <label for="email-customer" class="">Email</label>
                                        <input type="text" id="email-customer" name='CHECK_CUSTOMER_EMAIL'
                                    class="form-control" value=' {{Session::get('customer_email')}}' readonly>
                                    </div>
                                    <div class="md-form mb-2">
                                        <label for="phone-customer" class="">Số điện thoại</label>

                                        <input type="text" id="phone-customer" name='CHECK_CUSTOMER_PHONE'
                                            class="form-control" value=' {{Session::get('customer_phone')}}' readonly>
                                    </div>
                                    <div class="md-form mb-2">
                                        <label for="address-customer" class="">Địa chỉ</label>
                                        <input type="text" id="address-customer" name='CHECK_CUATOMER_ADDRESS'
                                            class="form-control">

                                    </div>
                                    @if ($errors->has('CHECK_CUATOMER_ADDRESS'))
                                    <div style="color: red">
                                        {{ $errors->first('CHECK_CUATOMER_ADDRESS') }}
                                    </div>
                                    @endif
                                    <div class="md-form mb-2">
                                        <label for="phonedelivery-customer" class="">Số điện thoại nhận hàng</label>
                                        <input type="text" id="phonedelivery-customer"
                                            name='CHECK_CUSTOMER_PHONEDELIVERY' class="form-control">
                                        <small for="phonedelivery-customer" class="text-success">Không nhập nếu sử dụng
                                            số điện thoại mặc định</small>
                                    </div>

                                    <div class="md-form mb-2">
                                        <label for="address-customer" class="">Ghi chú</label>
                                        <textarea rows="4" cols="50" type="text" id="address-customer" name='CHECK_NOTE'
                                            class="form-control"></textarea>

                                    </div>
                                    <!--address-2-->
                                    <hr>
                                    <div class="d-block my-3">
                                        <div class="custom-control ">
                                            <input type="radio" id="customRadioPayPal" name="CHECK_PAY" value="1">
                                            <label for="customRadioPayPal">Cổng thanh toán trực tuyến VNPay</label>
                                        </div>
                                        <div class="custom-control ">
                                            <input type="radio" id="customRadioCOD" name="CHECK_PAY" value="0">
                                            <label for="customRadioCOD">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('CHECK_PAY'))
                                    <div style="color: red">
                                        {{ $errors->first('CHECK_PAY') }}
                                    </div>
                                    @endif
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Tiếp tục</button>

                                </form>
                            </div>
                            <!--/.Card-->
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 mb-4">

                            <!-- Heading -->
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Thanh toán</span>
                                <span class="badge badge-secondary badge-pill">3</span>
                            </h4>

                            <!-- Cart -->
                            <ul class="list-group mb-3 z-depth-1">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Tổng đơn hàng</h6>

                                    </div>
                                    <span class="text-muted">{{number_format($total,0,',','.')}} đ</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div class="text-success">
                                        <h6 class="my-0">Khuyến mãi</h6>
                                        <small>Khách hàng thành viên </small>
                                        <br><small>Điểm tích lũy: {{$promotion}} </small>
                                        <br><small>Khuyến mãi đơn hàng: - {{$promotionPersent}} %</small>
                                    </div>
                                <span class="text-success">{{number_format($promotionforProtentialCustomer,0,',','.')}} đ</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tổng cộng (VNĐ)</span>
                                <strong class='text-danger'>{{number_format($total-$promotionforProtentialCustomer,0,',','.')}} đ</strong>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->
                </main>
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
    <script>!function(s,u,b,i,z){var r,m;s[i]||(s._sbzaccid=z,s[i]=function(){s[i].q.push(arguments)},s[i].q=[],s[i]("setAccount",z),r=function(e){return e<=6?5:r(e-1)+r(e-3)},(m=function(e){var t,n,c;5<e||s._subiz_init_2094850928430||(t="https://",t+=0===e?"widget."+i+".xyz":1===e?"storage.googleapis.com":"sbz-"+r(10+e)+".com",t+="/sbz/app.js?accid="+z,n=u.createElement(b),c=u.getElementsByTagName(b)[0],n.async=1,n.src=t,c.parentNode.insertBefore(n,c),setTimeout(m,2e3,e+1))})(0))}(window,document,"script","subiz","acqsmuingzvizsalqyuv");</script>
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
