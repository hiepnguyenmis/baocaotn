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
                        <a class="navbar-brand" href="index.html">caviar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#caviarNav"
                            aria-controls="caviarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="fa fa-bars"></span></button>
                        <div class="collapse navbar-collapse" id="caviarNav">
                            <ul class="navbar-nav ml-auto" id="caviarMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.html">Home</a>
                                        <a class="dropdown-item" href="menu.html">Menu</a>
                                        <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                                        <a class="dropdown-item" href="contact.html">Contact</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#menu">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#awards">Awards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#testimonial">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#reservation">Reservation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                            <!-- Search Btn -->
                            <div class="caviar-search-btn">
                                <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('index/img/bg-img/hero-5.jpg')}})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Menu</h2>
                        <a href="#menu" id="menubtn" class="btn caviar-btn"><span></span> Special</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Regular Page Area Start ***** -->
    <section class="caviar-regular-page section-padding-100">
        <div class="container">
            <div class="row">
                <h3>Xử lý đơn hàng</h3>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @foreach ($bilInfor as $item)
                            <h2>#{{$item->BILL_NO}}</h2>
                            <h6>{{date('d-m-Y', strtotime($item->BILL_DATE))}}</h6>
                            @endforeach


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">

                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin cá nhân</h3>


                                </div>
                                <!-- /.card-header -->
                                @foreach ($bilInfor as $item)
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mã khách hàng:</label>
                                                <p>{{$item->CUSTOMER_NO}}</p>

                                            </div>
                                            <div class="form-group">
                                                <label>Tên khách hàng:</label>
                                                <p>{{$item->CUSTOMER_NAME}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <p>{{$item->CUSTOMER_EMAIL}}</p>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ:</label>
                                                <p>{{$item->CUSTOMER_ADD}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại:</label>
                                                <p>{{$item->CUSTOMER_PHONE}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ nhận hàng:</label>
                                                <p>{{$item->BILL_DELIVERYADDRESS}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Chi chú:</label>
                                                <p>{{$item->BILL_NOTE}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                @endforeach
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Chi tiết hóa đơn</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                class="fas fa-remove"></i></button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Tên món ăn</th>
                                                        <th scope="col">Đơn vị</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Đơn giá</th>
                                                        <th scope="col">Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $total=null;
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($billdetail as $item )
                                                    @php
                                                    $intoMoney=$item->BILLDETAIL_AMOUNT * $item->BILLDETAIL_PRICE;
                                                    $total+=$intoMoney;
                                                    @endphp
                                                    <tr>
                                                        <th scope="row">{{$no++}}</th>
                                                        <td>{{$item->FOOD_NAME}}</td>
                                                        <td>{{$item->FOOD_UNIT}}</td>
                                                        <td>{{$item->BILLDETAIL_AMOUNT}}</td>
                                                        <td>{{number_format($item->BILLDETAIL_PRICE,0,',','.')}} đ</td>
                                                        <td>{{number_format($intoMoney,0,',','.')}} đ</td>
                                                    </tr>
                                                    @endforeach

                                                    @foreach ($bilInfor as $item )
                                                    <span class="text-danger mr-2">Tổng tiền hàng:
                                                        {{number_format($item->BILL_TOTAL,0,',','.')}}
                                                        đ</span>
                                                    <span class="text-danger mr-2">Khuyến mãi:
                                                        {{number_format($item->BILL_PROMOTION,0,',','.')}}
                                                        đ</span>
                                                    <span class="text-danger mr-2">Tổng hóa đơn:
                                                        {{number_format($item->BILL_TOTAL -$item->BILL_PROMOTION,0,',','.')}}
                                                        đ</span>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
