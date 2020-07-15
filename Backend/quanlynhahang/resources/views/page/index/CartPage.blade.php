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
    <link rel="stylesheet" href="{{asset('index/fontawesome/css/all.css')}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('index/style.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">

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
                            <a id="search-btn" href="{{route('giohang')}}"><i class="fas fa-shopping-cart" aria-hidden="true"> {{$countItem}} </i></a>
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
                        <h2>Giỏ Hàng</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Regular Page Area Start ***** -->
    <section class="caviar-regular-page section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11">
                    <div class="post-title">
                        <h2>Thông tin đặt hàng</h2>
                    </div>
                    <div class="card">
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
                                            <td></td>
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
                                            <td>{{$loop->index+1}}</td>
                                            <td>
                                                @if ($details['FOOD_IMG']==null)
                                                <img src="https://via.placeholder.com/80" width="80" height='80' alt="">
                                                @else
                                                <img src="{{$details['FOOD_IMG']}}" width="80" height='80' alt="">

                                                @endif

                                            </td>
                                            <td>{{$details['FOOD_NAME']}}</td>
                                            <td>
                                                <form action="{{route('updatecart',['id_session'=>$id_session])}}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-11 col-sm-8">
                                                            <input type="number" value="{{ $details['QUANTITY'] }}"
                                                                class="form-control form-control-sm " name='quantity' min='1' max='20' />

                                                        </div>
                                                        <div class="col-11 col-sm-3">
                                                            <button class="btn btn-warning btn-sm update-cart" type="submit"><i
                                                                class="fas fa-sync-alt"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{number_format($details['FOOD_PRICE'],0,',','.')}} đ</td>
                                            <td>{{number_format($details['FOOD_PRICE'] * $details['QUANTITY'],0,',','.')}} đ</td>
                                            <td>



                                                <form method="POST"
                                                    action="{{route('removefromcart',['id_session'=>$id_session])}}">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm remove-from-cart"
                                                        type="submit"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <span> Tổng đơn hàng: {{number_format($total,0,',','.')}} đ </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('xacnhandonhang')}}" class="btn btn-sm btn-success float-right">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
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
