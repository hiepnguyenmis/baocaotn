<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Caviar - Premium Restaurant Template | Menu</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('index/img/core-img/favicon.ico')}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('index/style.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('index/fontawesome/css/all.css')}}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="caviar-load"></div>
        <div class="preload-icons">
            <img class="preload-1" src="{{asset('index/img/core-img/preload-1.png')}}" alt="">
            <img class="preload-2" src="{{asset('index/img/core-img/preload-2.png')}}" alt="">
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
                                    <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
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
                                    <a class="dropdown-item"
                                        href="{{route('trangcanhan',['customers_no'=>$customer_no])}}">Thông
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
                                <a id="" href="{{route('giohang')}}"><i class="fas fa-shopping-cart" aria-hidden="true">
                                        {{$countItem}} </i></a>
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
        style="background-image: url({{asset('index/img/bg-img/hero-2.jpg')}})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Thực đơn</h2>
                        <a href="#menu" id="menubtn" class="btn caviar-btn"><span></span> Đặt biệt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Menu Area Start ***** -->
    <div class="caviar-food-menu section-padding-150 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="food-menu-title">
                        <h2>Menu</h2>
                    </div>
                </div>
                <div class="col-10">
                    <div class="caviar-projects-menu">
                        <div class="text-center portfolio-menu">
                            <button class="active" data-filter="*">Tất cả</button>
                            <button data-filter=".breakfast">Điểm tâm sáng</button>
                            <button data-filter=".lunch">Bữa trưa</button>
                            <button data-filter=".dinner">Bữa tối</button>
                        </div>
                    </div>
                    <div class="caviar-menu-slides owl-carousel clearfix">
                        @foreach ( $foods->chunk(5) as $chunk)
                        <div class="caviar-portfolio clearfix">
                            <!-- Single Gallery Item -->
                            @foreach ($chunk as $item)
                            @php
                            $type =null;
                            if($item->FOOD_TYPE ==1){
                            $type='breakfast';
                            }else if($item->FOOD_TYPE ==2){
                            $type='lunch';
                            }else if($item->FOOD_TYPE ==3){
                            $type='dinner';
                            }
                            @endphp
                            <div class="single_menu_item {{$type}} wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb  " style="width: 50em !important; height: 50 !important;">
                                        <img height="90" width="90" mx-auto d-block" src="{{$item->FOOD_IMG}}" alt="">
                                    </div>
                                    <div class="dish-description ml-2">
                                        <h3>{{$item->FOOD_NAME}} </h3>
                                        <p>{{$item->FOOD_DESCRIPTION}}</p>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p><a href="{{route('themgiohang',['id_food'=>$item->FOOD_ID])}}"
                                                            class="btn btn-sm btn-warning">Thêm vào giỏ</a>

                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <div class="dish-value ">
                                                        <h5 class="font-weight-bold">
                                                            {{number_format($item->FOOD_PRICE,0,',','.')}} đ</h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Menu Area End ***** -->

    <!-- ***** Special Menu Area Start ***** -->
    <section class="caviar-dish-menu clearfix" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-heading">
                    <div class="section-heading text-center">
                        <h2>Special</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($foodspecial->chunk(3) as $chunk)
                @foreach ($chunk as $item)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('index/img/menu-img/dish-1.png')}}" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">{{$item->FOOD_NAME}}</h6>
                            <p class="dish-price">{{($item->FOOD_PRICE/1000)."K"}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Special Menu Area End ***** -->

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
    <!-- ***** Footer Area Start ***** -->

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

    <script>
        !function(s,u,b,i,z){var r,m;s[i]||(s._sbzaccid=z,s[i]=function(){s[i].q.push(arguments)},s[i].q=[],s[i]("setAccount",z),r=function(e){return e<=6?5:r(e-1)+r(e-3)},(m=function(e){var t,n,c;5<e||s._subiz_init_2094850928430||(t="https://",t+=0===e?"widget."+i+".xyz":1===e?"storage.googleapis.com":"sbz-"+r(10+e)+".com",t+="/sbz/app.js?accid="+z,n=u.createElement(b),c=u.getElementsByTagName(b)[0],n.async=1,n.src=t,c.parentNode.insertBefore(n,c),setTimeout(m,2e3,e+1))})(0))}(window,document,"script","subiz","acqsmuingzvizsalqyuv");
    </script>
</body>
