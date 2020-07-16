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
    <link rel="icon" href="{{asset('index/img/core-img/favicon.ico')}}}">
    <link rel="stylesheet" href="{{asset('index/fontawesome/css/all.css')}}">
    <!-- Core Stylesheet -->
    <link href="{{asset('index/style.css')}}" rel="stylesheet">
    {{-- Bootstrap-4 --}}
    {{-- <link href="{{asset('index/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('index/css/others/animate.css')}}" rel="stylesheet">
    <link href="{{asset('index/css/others/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('index/css/others/owl.carousel.min.css')}}">
    <link href="{{asset('index/css/others/font-awesome.min.css')}}">
    <link href="{{asset('index/css/others/pe-icon-7-stroke.css')}}"> --}}
    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">

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

    <!-- ****** Welcome Area Start ****** -->
    <section class="caviar-hero-area" id="home">
        <!-- Welcome Social Info -->
        <div class="welcome-social-info">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
        <!-- Welcome Slides -->
        <div class="caviar-hero-slides owl-carousel">
            <!-- Single Slides -->
            <div class="single-hero-slides bg-img"
                style="background-image: url({{asset('index/img/bg-img/hero-1.jpg')}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>Giới thiệu</h2>
                                <p>Quán có vị trí đẹp, nằm ngay cửa ngõ vào thành phố Đà Lạt. Nằm trên một ngọn đồi, 4 hướng đều là không gian mở. Quán xây dựng là một biệt thự kiểu Pháp có phần hiện đại. Tận dụng mọi không gian rất trang nhã, nghệ thuật. Đồ ăn ngon. Hương vị kiểu Châu âu đúng chất và ít béo. Cách bày trí món ăn rất .
                                </p>
                                <a href="{{route('thucdon')}}" class="btn caviar-btn"><span></span> Xem thực đơn</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                <div class="hero-slides-nav bg-img"
                    style="background-image: url({{asset('index/img/bg-img/hero-2.jpg')}});"></div>
            </div>
            <!-- Single Slides -->
            <div class="single-hero-slides bg-img"
                style="background-image: url({{asset('index/img/bg-img/hero-2.jpg')}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>Giới thiệu</h2>
                                <p>Quán có vị trí đẹp, nằm ngay cửa ngõ vào thành phố Đà Lạt. Nằm trên một ngọn đồi, 4 hướng đều là không gian mở. Quán xây dựng là một biệt thự kiểu Pháp có phần hiện đại. Tận dụng mọi không gian rất trang nhã, nghệ thuật. Đồ ăn ngon. Hương vị kiểu Châu âu đúng chất và ít béo. Cách bày trí món ăn rất .
                                </p>
                            <a href="{{route('thucdon')}}" class="btn caviar-btn"><span></span>Xem thực đơn</a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                <div class="hero-slides-nav bg-img"
                    style="background-image: url({{asset('index/img/bg-img/hero-1.jpg')}});"></div>
            </div>
        </div>
    </section>
    <!-- ****** Welcome Area End ****** -->

    <!-- ****** About Us Area Start ****** -->
    <section class="caviar-about-us-area section-padding-150" id="about">
        <div class="container">
            <!-- About Us Single Area -->
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('index/img/bg-img/about-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-md-auto">
                    <div class="section-heading">
                        <h2>Về chúng tôi</h2>
                    </div>
                    <div class="about-us-content">
                        <span>restaurant style</span>
                        <p>Được thành lập từ tình yêu, niềm đam mê bất tận với các món ăn và nếp văn hóa của người dân Nam Bộ, Nhà hàng Phương Nam đã chính thức đi vào hoạt động tháng 12/2010 (tại địa chỉ số 2 ngõ 69 Chùa Láng – Hà Nội), mang một làn gió ẩm thực mới đến với người Hà Nội.Chỉ sau 2 năm hoạt động, với tiêu chí, luôn nỗ lực không ngừng để có những món ăn ngon, nhân viên phục vụ thân thiện và dịch vụ tốt làm hài lòng mọi quý khách hàng (ngay cả những thực khách khó tính nhất), Nhà hàng Phương Nam đã mở rộng quy mô hoạt động, thành lập cơ sở 2 tại 13 Mai Hắc Đế và cơ sở 3 tại 35 Dịch Vọng Hậu, giúp thỏa mãn “cơn nghiện” của nhiều tín đồ mê đồ ăn Nam Bộ hơn nữa.

</p>
                    </div>
                </div>
            </div>
            <!-- About Us Single Area -->
            <div class="about-us-second-part">
                <div class="row align-items-center pt-200">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="about-us-content">

                            <p>Đến với nhà hàng, khách sẽ thấy được không gian thoáng đãng, có những phòng riêng biệt dành cho hội họp hay sinh nhật với màu trầm và xanh lá chủ đạo. Sẽ gợi nhớ cho những người con xa quê cảm nhận được như mình đang trở về quê nhà.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ml-md-auto">
                        <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                            <img src="{{asset('index/img/bg-img/about-2.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** About Us Area End ****** -->

    <!-- ****** Dish Menu Area Start ****** -->
    <section class="caviar-dish-menu" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-heading">
                    <div class="section-heading text-center">
                        <h2>Đặt biệt</h2>
                    </div>
                    <!-- btn -->
                <a href="{{route('thucdon')}}" class="btn caviar-btn"><span></span> Xem Tất cả thực đơn</a>
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
    <!-- ****** Dish Menu Area End ****** -->

    <!-- ****** Awards Area Start ****** -->
    <section class="caviar-awards-area" id="awards">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 ml-md-auto">
                    <div class="caviar-awards d-sm-flex justify-content-between">
                        <img src="{{asset('index/img/awards-img/a-1.png')}}" alt="">
                        <img src="{{asset('index/img/awards-img/a-2.png')}}" alt="">
                        <img src="{{asset('index/img/awards-img/a-3.png')}}" alt="">
                        <img src="{{asset('index/img/awards-img/a-4.png')}}" alt="">
                        <img src="{{asset('img/awards-img/a-5.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Awards Area End ****** -->

    <!-- ****** Testimonials Area Start ****** -->
    <section class="caviar-testimonials-area" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-content">
                        <div class="section-heading text-center">
                            <h2>Hình Ảnh</h2>
                        </div>
                        <div class="caviar-testimonials-slides owl-carousel">
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <img src="{{asset('image/IMG_0398-scaled.jpg')}}" alt="">

                            </div>
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <img src="{{asset('image/IMG_0415-scaled.jpg')}}" alt="">
                            </div>
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <img src="{{asset('image/sesan2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Testimonials Area End ****** -->

    <!-- ****** Reservation Area Start ****** -->

    <!-- ****** Reservation Area End ****** -->

    <!-- ****** Footer Area Start ****** -->
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
    <!-- ****** Footer Area End ****** -->
    <script>!function(s,u,b,i,z){var r,m;s[i]||(s._sbzaccid=z,s[i]=function(){s[i].q.push(arguments)},s[i].q=[],s[i]("setAccount",z),r=function(e){return e<=6?5:r(e-1)+r(e-3)},(m=function(e){var t,n,c;5<e||s._subiz_init_2094850928430||(t="https://",t+=0===e?"widget."+i+".xyz":1===e?"storage.googleapis.com":"sbz-"+r(10+e)+".com",t+="/sbz/app.js?accid="+z,n=u.createElement(b),c=u.getElementsByTagName(b)[0],n.async=1,n.src=t,c.parentNode.insertBefore(n,c),setTimeout(m,2e3,e+1))})(0))}(window,document,"script","subiz","acqsmuingzvizsalqyuv");</script>
    <!-- Jquery-2.2.4 js -->
    <script src="{{asset('index/js/jquery/jquery-2.2.4.min.js')}}"></script>

    <!-- Popper js -->
    <script src="{{asset('index/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('index/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('index/js/others/plugins.js')}}"></script>
    <!-- Active JS -->
    <script src="{{asset('index/js/active.js')}}"></script>
</body>
